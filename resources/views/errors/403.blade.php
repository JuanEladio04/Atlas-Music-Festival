<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 403 - Acceso prohibido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-cBackground">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-lg w-full p-8 bg-cPrimary shadow-md rounded-md text-center">
            <h1 class="text-4xl font-bold color-cAccent mb-4">Error 403</h1>
            <p class="text-xl text-white mb-8">Lo sentimos, no tienes permiso para acceder a esta página.</p>
            <a href="{{ url('/') }}" class="color-cAccent hover:text-yellow-100">Volver a la página de inicio</a>
        </div>
    </div>
</body>
</html>
