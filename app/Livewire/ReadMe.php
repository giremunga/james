<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
//use Parsedown;

class ReadMe extends Component
{

    public $markdownContent;

    public function mount()
    {
        $response = Http::get('https://raw.githubusercontent.com/cardano-foundation/CIPs/master/CIP-1694/README.md');
        $this->markdownContent = $response->body();

         //$parsedown = new Parsedown();
         //$this->markdownContent = $parsedown->text($this->markdownContent);
    }
    public function render()
    {
        return view('livewire.read-me');
    }
}
