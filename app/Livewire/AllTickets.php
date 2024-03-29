<?php

namespace App\Livewire;

use Closure;
use App\Models\Pass;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;

class AllTickets extends Component
{
    public $tickets;

    #[On('passChangesRealized')]
    public function render(): View|Closure|string
    {
        $this->tickets = Pass::all();
        return view('livewire.all-tickets')->with('tickets', $this->tickets);
    }
}
