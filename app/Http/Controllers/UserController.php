<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    use WithFileUploads;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        ///
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'dni' => ['required', 'string', 'min:9', 'max:9', Rule::unique(User::class)->ignore($id)],
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($id)],
                'f_nac' => ['nullable', 'date'],
                'n_telf' => ['nullable', 'numeric', Rule::unique(User::class)->ignore($id)],
                'type' => ['required', 'string', Rule::in(['admin', 'user', 'singer'])],
                'pass' => ['nullable', 'string'],
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $photoFileName = time() . "-" . $image->getClientOriginalName();
                $image->storeAs('public/img/user', $photoFileName);
                $user->photo_path = '/storage/img/user/' . $photoFileName;
            }

            if ($user->email != $validatedData['email']) {
                $user->email_verified_at = null;
                $user->email = $validatedData['email'];
            }

            $user->dni = $validatedData['dni'];
            $user->name = $validatedData['name'];
            $user->last_name = $validatedData['last_name'];
            $user->f_nac = $validatedData['f_nac'];
            $user->n_telf = $validatedData['n_telf'];
            $user->pass = $validatedData['pass'];
            $user->type = $validatedData['type'];

            $user->save();

            return redirect()->route('user.index')->with('status', 'Usuario ' . $user->name . ' actualizado correctamente');
        } catch (QueryException $e) {
            return redirect()->route('user.index')->with('status', 'No ha sido posible actualizar usuario: ' . $user->name . ': ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index')->with('status', 'Usuario ' . $user->name . ' borrado correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('status', 'No ha sido posible eliminar usuario ' . $user->name . ': ' . $th->getMessage());
        }
    }
}
