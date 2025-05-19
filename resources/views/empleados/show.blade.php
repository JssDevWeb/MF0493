@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="p-6 border-b">
        <h1 class="text-2xl font-semibold text-gray-800">Detalle del Empleado</h1>
    </div>
    
    <div class="p-6 space-y-4">
        <div class="space-y-2">
            <label class="text-sm font-medium text-gray-600">Nombre:</label>
            <p class="text-gray-900">{{ $empleado->nombre }}</p>
        </div>
        
        <div class="space-y-2">
            <label class="text-sm font-medium text-gray-600">Email:</label>
            <p class="text-gray-900">{{ $empleado->email }}</p>
        </div>
        
        <div class="space-y-2">
            <label class="text-sm font-medium text-gray-600">DNI:</label>
            <p class="text-gray-900">{{ $empleado->dni }}</p>
        </div>
        
        <div class="space-y-2">
            <label class="text-sm font-medium text-gray-600">Departamento:</label>
            <p class="text-gray-900">
                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">
                    {{ $empleado->departamento->nombre ?? '-' }}
                </span>
            </p>
        </div>
    </div>

    <div class="p-6 border-t flex space-x-4">
        <a href="{{ route('empleados.index') }}" 
           class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition-colors">
            Volver al listado
        </a>
        <a href="{{ route('empleados.edit', $empleado) }}" 
           class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 transition-colors">
            Editar
        </a>
        <form action="{{ route('empleados.destroy', $empleado) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors"
                    onclick="return confirm('¿Seguro que deseas eliminar este empleado?')">
                Eliminar
            </button>
        </form>
    </div>
</div>
@endsection