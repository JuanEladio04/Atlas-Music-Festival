<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Publication extends Component
{
    public $publication;
    private $singer;
    public $showModal = false;

    public function render()
    {
        $this->singer = User::find($this->publication->uid);
        return view('livewire.publication', [
            'publication' => $this->publication,
            'singer' => $this->singer
        ]);
    }

    public function toggleModal(){
        $this->showModal =!$this->showModal;
    }

    public function realizeDelete(){
        $this->publication->delete();
        $this->dispatch('singerContentCrud');
    }
}
