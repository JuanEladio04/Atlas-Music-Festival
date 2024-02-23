<?php

namespace App\Livewire;

use App\Models\Pass;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateTicketForm extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $photo_path;
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
            'photo_path' => 'image|mimes:jpg,jpeg,png|max:2048', 
        ];

        $this->validate($rules);

        $ticketData = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'photo_path' => $this->photo_path ? $this->photo_path->store('photos') : null,
        ];

        Pass::create($ticketData);
        $this->dispatch('passChangesRealized');
        $this->showForm = false;
    }
}
