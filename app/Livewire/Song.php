<?php

namespace App\Livewire;

use Livewire\Component;

class Song extends Component
{
    public $songs;
    public function render()
    {
        return view('livewire.song');
    }
}
