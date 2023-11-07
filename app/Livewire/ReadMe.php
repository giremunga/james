<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Parsedown;








class ReadMe extends Component
{

    public $markdownContent;

    public function mount()
    {
        $response = Http::get('https://raw.githubusercontent.com/cardano-foundation/CIPs/master/CIP-1694/README.md');

        $markdownContent = $response->body();

        $parser = new Parsedown();
        $parsedMarkdownContent = $parser->parse($markdownContent);

        // Remove the data that you want to remove from the parsed markdown content.
        $parsedMarkdownContent = str_replace('---', '', $parsedMarkdownContent);
        $parsedMarkdownContent = str_replace('CIP: 1694', '', $parsedMarkdownContent);
        $parsedMarkdownContent = str_replace('Title: A First Step Towards On-Chain Decentralized Governance', '', $parsedMarkdownContent);
        $parsedMarkdownContent = str_replace('Status: Proposed', '', $parsedMarkdownContent);
        $parsedMarkdownContent = str_replace('Category: Ledger', '', $parsedMarkdownContent);
        $parsedMarkdownContent = str_replace('Authors:', '', $parsedMarkdownContent);
        $parsedMarkdownContent = str_replace('Created:', '', $parsedMarkdownContent);
      
        

       
        

        $this->markdownContent = $parsedMarkdownContent;
    }

    public function render()
    {
        return view('livewire.read-me');
    }
    public function removeAuthorsAndDiscussions($markdownContent)
    {
        // Remove the "Authors" and "Discussions" sections
        $outputText = preg_replace('/Authors:(.*?)Discussions:/s', '', $markdownContent);

        // Remove leading and trailing whitespace
        $outputText = trim($outputText);

        return $outputText;
    }
}
