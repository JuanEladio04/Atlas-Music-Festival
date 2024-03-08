<?php

namespace App\Livewire;

use App\Models\Pass;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PassController;

class Ticket extends Component
{
    public $ticket;

    #[On('uptadeRealized')]
    public function render()
    {
        return view('livewire.ticket');
    }

    public function getTicket(){
        Auth::user()->pass = $this->ticket->id;
        Auth::user()->save();
        $this->dispatch('uptadeRealized');
        return redirect()->route('passPDF.generatePDF');
    }

    public function openEditModal(){
        $this->dispatch('openEditModalPressed.'. $this->ticket->id);
    }  

}
