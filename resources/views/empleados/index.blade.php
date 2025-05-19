@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="p-6 border-b flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
        <h1 class="text-2xl font-semibold text-gray-800">Empleados</h1>
        <a href="{{ route('empleados.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Nuevo Empleado
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 m-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DNI</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departamento</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($empleados as $empleado)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $empleado->dni }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">
                            {{ $empleado->departamento->nombre ?? '-' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                        <a href="{{ route('empleados.show', $empleado) }}" 
                           class="text-blue-600 hover:text-blue-900">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('empleados.edit', $empleado) }}" 
                           class="text-yellow-600 hover:text-yellow-900">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('¿Seguro que deseas eliminar este empleado?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection