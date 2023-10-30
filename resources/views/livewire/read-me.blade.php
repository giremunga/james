<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Markdown Styling</title>
    <link rel="stylesheet" href="{{ asset('css/markdown.css') }}">
</head>
<body>
    <div id='markdown'>
        <x-markdown flavor="github">
            {!! $markdownContent !!}
        </x-markdown>
    </div>
</body>
</html>
