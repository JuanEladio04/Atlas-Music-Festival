<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Publication extends Component
{
    public $publication;
    private $singer;

    public function render()
    {
        $this->singer = User::find($this->publication->uid);
        return view('livewire.publication', [
            'publication' => $this->publication,
            'singer' => $this->singer
        ]);
    }
}
