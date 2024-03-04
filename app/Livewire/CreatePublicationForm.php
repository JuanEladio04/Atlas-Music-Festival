<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Publication;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreatePublicationForm extends Component
{
    use WithFileUploads;

    public $pTitle;
    public $pSubtitle;
    public $pContent;
    public $pImage;

    public function render()
    {
        return view('livewire.create-publication-form');
    }

    public function savePublication()
    {
        try {
            $rules = [
                'pTitle' => 'required|string|max:255',
                'pSubtitle' => 'string|max:255',
                'pContent' => 'required|string',
                'pImage' => 'image|mimes:jpg,jpeg,png',
            ];

            if (!$this->pImage) {
                unset($rules['pImage']);
            }

            $this->validate($rules);

            $newPublication = new Publication;
            $newPublication->title = $this->pTitle;
            $newPublication->subtitle = $this->pSubtitle;
            $newPublication->content = $this->pContent;
            $newPublication->uid = Auth::user()->id;

            if ($this->pImage) {
                $photoFileName = time() . "-" . $this->pImage->getClientOriginalName();
                $newPublication->image_path = '/storage/img/publications/' . $photoFileName;

                $this->pImage->storeAs('/public/img/publications/', $photoFileName);
            }

            $newPublication->save();
            $this->dispatch('singerContentCrud');
            session()->flash('status', 'Publicación creada exitosamente');
        } catch (\Throwable $th) {
            session()->flash('status', 'No ha sido posible crear la publicación');
        }
    }

}
