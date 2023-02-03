<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\History;
use App\Models\Place;
use App\Models\Thing;
use App\Models\User;
use App\Models\Using;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ThingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $things = Thing::latest()->paginate(8);
        return view('things.index', ['things' => $things]);
    }

    /**
     * Display a listing of the account resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function my()
    {
        $user = auth()->user();
        $things = $user->getThings()->latest()->paginate(8);
        return view('things.index', ['things' => $things]);
    }

    /**
     * Display a listing of the account resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function repairing()
    {
        $user = auth()->user();
        $things_IDs = $user->getRepairingThings();
        $things = Thing::whereIn('id', $things_IDs)->latest()->paginate(8);

        return view('things.repairing', ['things' => $things]);
    }

    /**
     * Display a listing of the account resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function transfered()
    {
        $things = History::where([
            ['model', '=', 'thing'],
            ['old_value', '=', Auth::user()->id],
            ['new_value', '!=', null]
        ])->pluck('primary_key');

        $things = Thing::whereIn('id', $things)->latest()->paginate(8);

        return view('things.transfered', ['things' => $things]);
    }

    /**
     * Display a listing of the account resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $things = Thing::where('owner_id', '=', $user_id)->orWhere('author_id', '=', $user_id)->latest()->paginate(8);

        return view('users.show', ['things' => $things, 'user' => $user]);
    }

    /**
     * Display a listing of the account resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function free()
    {
        $things = Thing::whereNull('owner_id')->latest()->paginate(8);
        return view('things.index', ['things' => $things]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();

        return view('things.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'wrst' => 'required'
        ]);

        $thing = new Thing();
        $thing->fill($validated);
        $thing->description = $request['description'];
        $thing->owner_id = Auth::id();
        $thing->author_id = Auth::id();
        $thing->save();

        $history = new History();

        $history->model = 'thing';
        $history->field = 'owner_id';
        $history->primary_key = $thing->id;
        $history->new_value = Auth::user()->id;
        $history->author_id = Auth::user()->id;
        $history->save();

        $history = new History();

        $history->model = 'thing';
        $history->field = 'description';
        $history->primary_key = $thing->id;
        $history->new_value = $request['description'];
        $history->author_id = Auth::user()->id;
        $history->save();

        return redirect('/things/' .  $thing->id);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $thing_id)
    {
        $thing = Thing::findOrFail($thing_id);

        $history = $thing->getHistory();

        for ($i = 0; $i < $history->count(); $i++) {
            if ($history[$i]->field == 'owner_id') {
                $history[$i]->old_value = User::find($history[$i]->old_value);
                $history[$i]->new_value = User::find($history[$i]->new_value);
            }

            $history[$i]->author = User::find($history[$i]->author_id);
        }

        return view('things.show', ['thing' => $thing, 'history' => $history]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $thing_id)
    {
        $thing = Thing::findOrFail($thing_id);

        Gate::authorize('update-thing', $thing);

        $users = User::where('id', '!=', $thing->owner_id)->get();

        return view('things.edit', ['thing' => $thing, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_move(int $thing_id)
    {
        $thing = Thing::findOrFail($thing_id);

        Gate::authorize('update-thing', $thing);

        $place = $thing->place();
        $places = Place::all();

        return view('things.move', ['thing' => $thing, 'place' => $place, 'places' => $places]);
    }

    public function move(Request $request, int $thing_id)
    {
        $thing = Thing::findOrFail($thing_id);

        Gate::authorize('update-thing', $thing);

        $place = $thing->place();


        if ($place && $request['place_id'] != $place->id) {
            $history = new History();

            $history->model = 'thing';
            $history->field = 'place_id';
            $history->primary_key = $thing->id;
            $history->old_value = $place->id;
            $history->new_value = $request['place_id'];
            $history->author_id = Auth::user()->id;

            $history->save();
        }

        $using = Using::where('thing_id', '=', $thing_id);
        $using->delete();

        if ($request['place_id'] != -1) {
            $using = new Using();

            $using->amount = $request['amount'];
            $using->place_id = $request['place_id'];
            $using->thing_id = $thing_id;

            $using->save();
        }

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $thing_id)
    {
        $thing = Thing::findOrFail($thing_id);

        Gate::authorize('update-thing', $thing);


        $request->validate([
            'name' => 'required',
            'wrst' => 'required'
        ]);

        if ($request['description'] != $thing->description) {
            $history = new History();

            $history->model = 'thing';
            $history->field = 'description';
            $history->primary_key = $thing->id;
            $history->old_value = $thing->description;
            $history->new_value = $request['description'];
            $history->author_id = Auth::user()->id;

            $history->save();
        }

        if ($request['owner_id'] != $thing->owner_id) {
            $history = new History();

            $history->model = 'thing';
            $history->field = 'owner_id';
            $history->primary_key = $thing->id;
            $history->old_value = $thing->owner_id;
            $history->new_value = $request['owner_id'];
            $history->author_id = Auth::user()->id;

            $history->save();
        }

        $thing->name = request('name');
        $thing->description = request('description');
        $thing->wrst = request('wrst');

        $thing->owner_id = request('owner_id');

        $thing->save();

        return redirect()->back();
    }



    /**
     * Use the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function take(int $thing_id)
    {
        $thing = Thing::findOrFail($thing_id);
        if ($thing->owner) return redirect()->back()->with(['message' => 'Данная вещь уже занята.']);

        $history = new History();
        $history->model = 'thing';
        $history->primary_key = $thing->id;
        $history->field = 'owner_id';
        $history->new_value = Auth::user()->id;
        $history->author_id = Auth::user()->id;
        $history->save();

        $thing->owner()->associate(Auth::user());
        $thing->save();

        return redirect('/things/' . $thing->id)->with(['thing' => $thing, 'message' => 'Вещь успешно восстановлена.']);
    }

    /**
     * Use the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function abort(int $thing_id)
    {
        $thing = Thing::findOrFail($thing_id);

        Gate::authorize('update-thing', $thing);

        if (!$thing->owner) return redirect()->back()->with(['message' => 'Данная вещь уже свободна.']);

        $history = new History();
        $history->model = 'thing';
        $history->primary_key = $thing->id;
        $history->field = 'owner_id';
        $history->old_value = $thing->owner_id;
        $history->author_id = Auth::user()->id;
        $history->save();



        $thing->owner_id = null;
        $thing->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($thing_id)
    {
        $thing = Thing::findOrFail($thing_id);

        Gate::authorize('update-thing', $thing);

        $archive = new Archive();
        $archive->name = $thing->name;
        $archive->description = $thing->description;
        $archive->wrst = $thing->wrst;
        $archive->author_id = $thing->author_id;
        $archive->save();

        $thing->delete();

        return redirect('/things');
    }
}
