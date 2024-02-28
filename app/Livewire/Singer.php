<?php

namespace App\Livewire;

use Livewire\Component;

class Singer extends Component
{
    public $singer;

    public function render()
    {
        return view('livewire.singer');
    }
}
