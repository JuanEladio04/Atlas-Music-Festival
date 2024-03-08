<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 403 - Acceso prohibido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body class="font-sans">
    <div class="container mx-auto px-4 py-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Entrada para el Festival</h1>
            <p class="text-lg text-gray-600">¡Bienvenido al Festival!</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <p class="text-gray-700"><span class="font-bold">Nombre:</span> {{ Auth::user()->name }} </p>
            </div>
            <div class="mb-4">
                <p class="text-gray-700"><span class="font-bold">Correo Electrónico:</span> {{ Auth::user()->email }} </p>
            </div>
            <div class="mb-4">
                <p class="text-gray-700"><span class="font-bold">Tipo de Entrada:</span> {{ $pass->name }}</p>
            </div>
        </div>
        <p class="text-center text-gray-600 mt-4">Gracias por asistir al Festival. Disfruta del evento.</p>
    </div>
</body>

</html>
