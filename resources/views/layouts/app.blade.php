<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navbar Modernizado -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <div class="hidden md:flex items-center ml-6 space-x-4">
                        <a href="{{ route('departamentos.index') }}" 
                           class="px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 transition-colors flex items-center">
                            <i class="fas fa-building mr-2 text-blue-600"></i>
                            Departamentos
                        </a>
                        <a href="{{ route('empleados.index') }}" 
                           class="px-3 py-2 rounded-md text-gray-700 hover:bg-gray-100 transition-colors flex items-center">
                            <i class="fas fa-users mr-2 text-blue-600"></i>
                            Empleados
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.5/cdn.js"></script>
</body>
</html>