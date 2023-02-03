<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Place;
use App\Models\Thing;
use App\Models\User;
use App\Models\Using;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::latest()->paginate(8);
        return view('place.index', ['places' => $places]);
    }

    /**
     * Display a listing of the account resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function my()
    {
        $user = auth()->user();
        $places = $user->getPlaces()->latest()->paginate(8);
        return view('place.index', ['places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();

        return view('place.create', ['users' => $users]);
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
            'author_id' => 'required'
        ]);

        $place = new Place();
        $place->fill($validated);
        $place->author_id = $request['author_id'];
        if ($request['description']) $place->description = $request['description'];

        if ($request['status'] == 'working') $place->work = true;
        elseif ($request['status'] == 'repairing') $place->repair = true;

        $place->save();

        $history = new History();

        $history->model = 'place';
        $history->field = 'description';
        $history->primary_key = $place->id;
        $history->new_value = $place->description;
        $history->author_id = $request['author_id'];
        $history->save();

        return redirect('/places/' . $place->id);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $place_id)
    {
        $place = Place::findOrFail($place_id);
        $things = $place->getThings()->paginate(8);

        for ($i = 0; $i < $things->count(); $i++) {
            $things[$i]->thing = Thing::findOrFail($things[$i]->thing_id);
        }

        $history = $place->getHistory();

        for ($i = 0; $i < $history->count(); $i++) {
            if ($history[$i]->field == 'author_id') {
                $history[$i]->old_value = User::find($history[$i]->old_value);
                $history[$i]->new_value = User::find($history[$i]->new_value);
            }

            $history[$i]->author = User::find($history[$i]->author_id);
        }

        return view('place.show', ['place' => $place, 'things' => $things, 'history' => $history]);
    }

    public function things(int $place_id)
    {
        $place = Place::findOrFail($place_id);

        Gate::authorize('update-place', $place);

        $things_ids = $place->getThings()->pluck('id');

        $things = Thing::where('id', '!=', $things_ids)->get();

        return view('place.things', ['place' => $place, 'things' => $things]);
    }

    public function add(Request $request, int $place_id)
    {
        $place = Place::findOrFail($place_id);

        Gate::authorize('update-place', $place);

        $thing = Thing::findOrFail($request['thing_id']);
        $old_place = $thing->place();

        $history = new History();

        $history->model = 'thing';
        $history->field = 'place_id';
        $history->primary_key = $thing->id;

        if ($old_place) {
            $history->old_value = $old_place->id;
        }

        $history->new_value = $place_id;
        $history->author_id = Auth::user()->id;

        $history->save();

        $using = Using::where('thing_id', '=', $thing->id);
        $using->delete();

        $using = new Using();

        $using->amount = $request['amount'];
        $using->thing_id = $request['thing_id'];
        $using->place_id = $place_id;

        $using->save();

        return redirect('/places/' . $place_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $place_id)
    {
        $place = Place::findOrFail($place_id);
        $users = User::where('id', '!=', $place->author_id)->get();

        Gate::authorize('update-place', $place);

        return view('place.edit', ['place' => $place, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $place_id)
    {
        $place = Place::findOrFail($place_id);

        $validated = $request->validate([
            'name' => 'required',
            'author_id' => 'required'
        ]);

        if ($request['description'] != $place->description) {
            $history = new History();

            $history->model = 'place';
            $history->field = 'description';
            $history->primary_key = $place->id;
            $history->old_value = $place->description;
            $history->new_value = $request['description'];
            $history->author_id = Auth::user()->id;
            $history->save();
        }

        if ($request['author_id'] != $place->author_id) {
            $history = new History();

            $history->model = 'place';
            $history->field = 'author_id';
            $history->primary_key = $place->id;
            $history->old_value = $place->author_id;
            $history->new_value = $request['author_id'];
            $history->author_id = Auth::user()->id;
            $history->save();
        }

        if ((($request['status'] == 'working') != $place->work) || ($request['status'] == 'repairing') != $place->repair) {
            $history = new History();

            $history->model = 'place';
            $history->field = 'status';
            $history->primary_key = $place->id;
            $history->old_value = $place->work ? 'working' : ($place->repair ? 'repairing' : 'idle');
            $history->new_value = $request['status'];
            $history->author_id = Auth::user()->id;
            $history->save();
        }

        $place->name = $request['name'];
        if ($request['description']) $place->description = $request['description'];
        $place->author_id = $request['author_id'];

        if ($request['status'] == 'working') {
            $place->repair = false;
            $place->work = true;
        }
        elseif ($request['status'] == 'repairing') {
            $place->repair = true;
            $place->work = false;
        } else {
            $place->repair = false;
            $place->work = false;
        }

        $place->save();

        return redirect('/places/' . $place->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $place_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $place_id)
    {
        $place = Place::findOrFail($place_id);

        Gate::authorize('update-place', $place);

        $place->delete();

        return redirect('/places');
    }
}
