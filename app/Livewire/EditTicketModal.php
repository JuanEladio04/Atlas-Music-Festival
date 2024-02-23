<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Http\Request;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditTicketModal extends Component
{
    use WithFileUploads;

    public $ticket;
    public $name;
    public $description;
    public $price;
    public $photo_path;
    public $showModal = false;

    public function render()
    {
        $this->name = $this->ticket->name;
        $this->description = $this->ticket->description;
        $this->price = $this->ticket->price;
        $this->photo_path = $this->ticket->photo_path;
        return view('livewire.edit-ticket-modal');
    }

    #[On('openEditModalPressed')]
    public function toggleShowModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function realizeDelete(){
        $this->ticket->delete();
        $this->dispatch('passChangesRealized');
        $this->showModal = false;
    }

    public function realizeUpdate(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'photo_path' => 'image|mimes:jpg,jpeg,png|max:2048', 
        ];
    
        if (!$request->hasFile('photo_path')) {
            unset($rules['photo_path']);
        }
    
        $this->validate($rules);
    
        $photoFileName = $this->ticket->photo_path;
    
        if ($request->hasFile('photo_path')) {
            $photo = $request->file('photo_path');
            $photoFileName = 'storage/img/pass/' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/img/pass', $photoFileName);
        }
    
        $this->ticket->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'photo_path' => $photoFileName,
        ]);
    
        $this->showModal = false;
        $this->dispatch('uptadeRealized');
    }    

}
