<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;
use League\CommonMark\CommonMarkConverter;

class markdown extends Component
{
    public $markdownContent;

    public function __construct()
    {
        // Fetch the Markdown content when the component is constructed.
        $response = Http::get('https://raw.githubusercontent.com/cardano-foundation/CIPs/master/CIP-1694/README.md');
        $markdownContent = $response->body();

        // Create a CommonMark Converter instance and parse the Markdown content.
        $commonMarkConverter = new CommonMarkConverter();
        $this->markdownContent = $commonMarkConverter->convertToHtml($markdownContent);
    }

    public function render(): View|Closure|string
    {
        return view('components.markdown');
    }
}
