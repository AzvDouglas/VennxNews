<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Noticia;

class Main extends Component
{
    public $editNews = false;
    public $noticiaId;
    public Noticia $noticia;

    public function mount()
    {
        $noticia = new Noticia();
        $this->noticia = $noticia;
    }

    public function render()
    {

        return view('livewire.main');
    }


}
