@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="p-6 border-b bg-green-50">
        <h1 class="text-2xl font-semibold text-green-800">Detalle del Departamento</h1>
    </div>
    
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-4">
            <div class="space-y-2">
                <label class="text-sm font-medium text-green-700">Nombre:</label>
                <p class="text-lg font-semibold text-gray-900">{{ $departamento->nombre }}</p>
            </div>
            
            <div class="space-y-2">
                <label class="text-sm font-medium text-green-700">Ubicación:</label>
                <p class="text-gray-900">
                    <i class="fas fa-map-marker-alt mr-2 text-green-600"></i>
                    {{ $departamento->ubicacion }}
                </p>
            </div>
        </div>

        <div class="border rounded-lg p-4">
            <h3 class="text-sm font-semibold text-green-700 mb-2">Estructura Organizacional</h3>
            <div class="flex items-center space-x-3">
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900">Gerente de Departamento</p>
                    <p class="text-sm text-gray-500">(Puesto jerárquico superior)</p>
                </div>
                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">
                    Posición 01
                </span>
            </div>
            <div class="mt-3 border-t pt-3">
                <p class="text-xs text-gray-500">Diagrama jerárquico interactivo aquí</p>
            </div>
        </div>
    </div>

    <div class="p-6 border-t flex space-x-4">
        <a href="{{ route('departamentos.index') }}" 
           class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition-colors">
            Volver al listado
        </a>
        <a href="{{ route('departamentos.edit', $departamento) }}" 
           class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition-colors">
            Editar
        </a>
        <form action="{{ route('departamentos.destroy', $departamento) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors"
                    onclick="return confirm('¿Seguro que deseas eliminar este departamento?')">
                Eliminar
            </button>
        </form>
    </div>
</div>
@endsection