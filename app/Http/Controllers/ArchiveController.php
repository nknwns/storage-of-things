<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Thing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archive = Archive::latest()->paginate(8);
        return view('archive.index', ['archive' => $archive]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $archive_id)
    {
        $archive = Archive::findOrFail($archive_id);

        return view('archive.show', ['archive' => $archive]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recover(int $thing_id)
    {
        $archive = Archive::findOrFail($thing_id);

        if ($archive->recovered) return redirect()->back()->with(['message' => 'Вещь уже восстановлена.']);

        $thing = new Thing();
        $thing->name = $archive->name;
        $thing->description = $archive->description;
        $thing->wrst = $archive->wrst;
        $thing->author_id = $archive->author_id;
        $thing->owner_id = Auth::user()->id;

        $thing->save();

        $archive->recovered = true;
        $archive->save();

        return redirect('/things/' . $thing->id)->with(['thing' => $thing, 'message' => 'Вещь успешно восстановлена.']);
    }
}
