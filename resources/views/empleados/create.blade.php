@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm overflow-hidden max-w-3xl mx-auto">
    <div class="p-6 border-b">
        <h1 class="text-2xl font-semibold text-gray-800">Crear Nuevo Empleado</h1>
    </div>
    
    <form action="{{ route('empleados.store') }}" method="POST" class="p-6 space-y-6">
        @csrf
        
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" id="nombre" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   value="{{ old('nombre') }}">
            @error('nombre')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   value="{{ old('email') }}">
            @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        
        <div>
            <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
            <input type="text" name="dni" id="dni" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   value="{{ old('dni') }}">
            @error('dni')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        
        <div>
            <label for="departamento_id" class="block text-sm font-medium text-gray-700">Departamento</label>
            <select name="departamento_id" id="departamento_id" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Seleccione un departamento</option>
                @foreach($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->nombre }}
                    </option>
                @endforeach
            </select>
            @error('departamento_id')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
        </div>
        
        <div class="flex justify-end space-x-4">
            <a href="{{ route('empleados.index') }}" 
               class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition-colors">
                Cancelar
            </a>
            <button type="submit" 
                    class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors">
                Crear Empleado
            </button>
        </div>
    </form>
</div>
@endsection