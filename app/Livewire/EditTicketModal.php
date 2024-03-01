<?php

namespace App\Livewire;

use App\Models\Pass;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditTicketModal extends Component
{
    use WithFileUploads;

    public Pass $ticket;
    public $name;
    public $description;
    public $price;
    public $photo;
    public $showModal = false;
    public $showDeleteModal = false;

    public function render()
    {
        $this->name = $this->ticket->name;
        $this->description = $this->ticket->description;
        $this->price = $this->ticket->price;
        $this->photo_path = $this->ticket->photo_path;
        return view('livewire.edit-ticket-modal');
    }

    #[On('openEditModalPressed.{ticket.id}')]
    public function toggleShowModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function toggleShowDeleteModal()
    {
        $this->showDeleteModal = !$this->showDeleteModal;
    }

    public function realizeDelete()
    {
        $this->ticket->delete();
        $this->dispatch('passChangesRealized');
        $this->showModal = false;
    }

    public function realizeUpdate()
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

        $this->ticket->name = $this->name;
        $this->ticket->description = $this->description;
        $this->ticket->price = $this->price;

        if ($this->photo) {
            if ($this->ticket->photo_path) {
                Storage::delete('/public' . $this->ticket->photo_path);
            }

            $photoFileName = time() . "-" . $this->photo->getClientOriginalName();
            $this->ticket->photo_path = 'storage/img/pass/' . $photoFileName;

            $this->photo->storeAs('/public/img/pass/', $photoFileName);
        }

        $this->ticket->update();
        $this->showModal = false;
        $this->dispatch('uptadeRealized');
    }

}
