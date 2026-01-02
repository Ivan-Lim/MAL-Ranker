<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MAL Ranker</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @php
        // Dynamically load built assets from manifest.json
        $manifestPath = public_path('build/manifest.json');
        if (file_exists($manifestPath)) {
            $manifest = json_decode(file_get_contents($manifestPath), true);
            $mainEntry = $manifest['resources/src/main.jsx'] ?? null;
            if ($mainEntry) {
                $jsFile = $mainEntry['file'];
                $cssFile = $mainEntry['css'][0] ?? null;
            }
        }
    @endphp

    @if(isset($jsFile))
        <script type="module" crossorigin src="/build/{{ $jsFile }}"></script>
    @endif
    @if(isset($cssFile))
        <link rel="stylesheet" crossorigin href="/build/{{ $cssFile }}">
    @endif
</head>
<body>
    <div id="root"></div>
</body>
</html>
