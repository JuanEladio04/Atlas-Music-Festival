<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use App\Http\Requests\SongRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Livewire\WithFileUploads;

class SongController extends Controller
{
    use WithFileUploads;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('song.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SongRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $newSong = new Song();
            $newSong->name = $validatedData['name'];
            $newSong->duration = $validatedData['duration'];
            $newSong->gender = $validatedData['gender'];

            if ($request->hasFile('image')) {
                $imageName = time() . "-" . $request->file('image')->getClientOriginalName();
                $newSong->photo_path = '/storage/img/songs/' . $imageName;

                $request->file('image')->storeAs('/public/img/songs/', $imageName);
            }

            $newSong->save();
            Auth::user()->songs()->attach($newSong);

            return redirect()->route('singer.show', ['singer' => Auth::user()])->with('status', 'Canción añadida correctamente');
        } catch (QueryException $e) {
            return redirect()->route('singer.show', ['singer' => Auth::user()])->with('status', 'Error al añadir canción: ' . $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        ///
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        return view('song.edit')->with('song', $song);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'duration' => ['required', 'numeric', 'min:0'],
                'gender' => ['required', 'string', 'max:255'],
                'image' => ['nullable', 'image', 'max:2048'],
            ]);
            $song = Song::findOrFail($id);
            $song->name = $validatedData['name'];
            $song->duration = $validatedData['duration'];
            $song->gender = $validatedData['gender'];

            if ($request->hasFile('image')) {
                $imageName = time() . "-" . $request->file('image')->getClientOriginalName();
                $song->photo_path = '/storage/img/songs/' . $imageName;

                $request->file('image')->storeAs('/public/img/songs/', $imageName);
            }

            $song->save();

            return redirect()->route('singer.show', ['singer' => Auth::user()])->with('status', 'Canción actualizada correctamente');
        } catch (QueryException $e) {
            return redirect()->route('singer.show', ['singer' => Auth::user()])->with('status', 'Canción no encontrada');
        } catch (QueryException $e) {
            return redirect()->route('singer.show', ['singer' => Auth::user()])->with('status', 'Error al actualizar la canción: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        //
    }
}
