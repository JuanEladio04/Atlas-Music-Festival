<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Publication;
use Livewire\Attributes\On;

class SingerProfileContent extends Component
{
    public $singer;
    private $section = 'publications';
    public $publications;
    public $songs;

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->loadData();

        return view('livewire.singer-profile-content', [
            'singer' => $this->singer,
            'section' => $this->section,
            'publications' => $this->publications,
            'songs' => $this->songs
        ]);
    }   

    
    #[On('singerContentCrud')]
    public function loadData(){
        $this->publications = Publication::where('uid', $this->singer->id)->orderBy('created_at', 'desc')->get();
        $this->songs = $this->singer->songs()->get();
    }

    /**
     * Change the current section
     *
     * @param string $cSection
     * @return void
     */
    public function changeSection(string $cSection): void
    {
        $this->section = $cSection;
    }

}
