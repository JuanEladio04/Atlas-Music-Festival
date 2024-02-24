<?php

namespace App\Livewire;

use App\Models\Pass;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreateTicketForm extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $photo;
    public $showForm = false;

    public function render()
    {
        return view('livewire.create-ticket-form');
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function insertTicket()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048',
        ];

        if (!$this->photo) {
            unset($rules['photo']);
        }

        $this->validate($rules);

        $newTicket = new Pass();

        $newTicket->name = $this->name;
        $newTicket->description = $this->description;
        $newTicket->price = $this->price;

        if ($this->photo) {
            $photoFileName = time() . "-" . $this->photo->getClientOriginalName();
            $newTicket->photo_path = 'storage/img/pass/' . $photoFileName;

            $this->photo->storeAs('/public/img/pass/', $photoFileName);
        }

        $newTicket->save();
        $this->showForm = false;
        $this->dispatch('passChangesRealized');
    }
}
