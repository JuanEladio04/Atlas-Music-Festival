<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersTable extends Component
{
    public $search;
    public $orderField = "id";
    public $order = "asc";

    public function render()
    {
        $users = User::where('id', 'like', '%' . $this->search . '%')
        ->orWhere('name', 'like', '%' . $this->search . '%')
        ->orWhere('last_name', 'like', '%' . $this->search . '%')
        ->orWhere('email', 'like', '%' . $this->search . '%')
        ->orWhere('n_telf', 'like', '%' . $this->search . '%')
        ->orWhere('type', 'like', '%' . $this->search . '%')
        ->orderBy($this->orderField, $this->order)
        ->paginate(15);
        return view('livewire.users-table')->with('users', $users);
    }

        public function orderBy($col)
    {
        if ($this->orderField == $col) {
            if ($this->order == "asc") {
                $this->order = "desc";
            } else {
                $this->order = "asc";
            }
        } else {
            $this->orderField = $col;
            $this->order = "asc";
        }
    }
}
