<?php

namespace App\Livewire;

use App\Models\Song;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class AddColaboratorModal extends Component
{
    public $song;
    public $showModal;
    public $singers = [];
    public $singerEmail;

    public function render()
    {
        $this->singers = $this->song->users;
        return view('livewire.add-colaborator-modal');
    }

    #[On('showColaboratorsModalPressed{song.id}')]
    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function addColaborator()
    {
        try {
            $singer = User::where('email', $this->singerEmail)->first(); 

            if ($singer != null && $singer->type == 'singer') {
                if (!$this->song->users()->where('users.id', $singer->id)->exists()) {
                    $this->song->users()->attach($singer->id); 
                    $this->render(); 
                    session()->flash('status', 'Colaborador añadido correctamente');
                } else {
                    session()->flash('status', 'El colaborador ya está asociado con esta canción');
                }
            } else {
                session()->flash('status', 'No es posible añadir un colaborador con este correo');
            }
        } catch (\Throwable $th) {
            session()->flash('status', 'Error al añadir colaborador:'. $singer . $th->getMessage());
        }
    }

    public function removeColaborator($id){
        $this->song->users()->detach($id);
        $this->render();
        session()->flash('status', 'Colaborador eliminado correctamente');
    }


}
