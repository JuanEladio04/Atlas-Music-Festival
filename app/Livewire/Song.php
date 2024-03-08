<?php

namespace App\Livewire;

use Livewire\Component;

class Song extends Component
{
    public $song;
    public $showDeleteModal = false;
    public function render()
    {
        return view('livewire.song');
    }
    public function toggleDeleteModal()
    {
        $this->showDeleteModal = !$this->showDeleteModal;
    }

    public function realizeDelete()
    {
        $this->song->users()->detach();
        $this->song->delete();
        $this->showDeleteModal = false;
        $this->dispatch('singerContentCrud');
    }

    public function showColaboratorsModal()
    {
        $this->dispatch('showColaboratorsModalPressed');
    }
}
