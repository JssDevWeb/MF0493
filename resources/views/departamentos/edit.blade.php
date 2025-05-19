@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm overflow-hidden max-w-3xl mx-auto">
    <div class="p-6 border-b bg-green-50">
        <h1 class="text-2xl font-semibold text-green-800">Editar Departamento</h1>
    </div>
    
    <form action="{{ route('departamentos.update', $departamento) }}" method="POST" class="p-6 space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label for="nombre" class="block text-sm font-medium text-green-700">Nombre del Departamento</label>
            <input type="text" name="nombre" id="nombre" 
                   class="mt-1 block w-full rounded-md border-green-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                   value="{{ old('nombre', $departamento->nombre) }}">
            @error('nombre')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        
        <div>
            <label for="ubicacion" class="block text-sm font-medium text-green-700">Ubicación Física</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input type="text" name="ubicacion" id="ubicacion" 
                       class="block w-full pr-10 rounded-md border-green-300 focus:border-green-500 focus:ring-green-500" 
                       placeholder="Ej: Planta 3, Edificio B"
                       value="{{ old('ubicacion', $departamento->ubicacion) }}">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <i class="fas fa-map-marker-alt text-green-400"></i>
                </div>
            </div>
            @error('ubicacion')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('departamentos.index') }}" 
               class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition-colors">
                Cancelar
            </a>
            <button type="submit" 
                    class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors">
                <i class="fas fa-save mr-2"></i>
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection