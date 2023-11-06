<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Fluent;
use Livewire\Component;

class Comment extends Component
{
    public function render()
    {
        $url = 'https://api.github.com/repos/cardano-foundation/CIPs/pulls/380/comments';

        $response = Http::get($url);
        
        $comments = collect($response->json());
        
        // Define the $commentsFluent array before using it
        $commentsFluent = [];

        foreach ($comments as $comment) {
            $commentsFluent[] = new Fluent($comment);
            
        }

        return view('livewire.comment', ['comments' => $commentsFluent]);
    }
}
