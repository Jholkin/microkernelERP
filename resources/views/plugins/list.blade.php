@extends('layouts.layout')

@section('title', 'plugins')

@section('nav-bar')
    @include('layouts._nav')
@endsection

@section('content')
    @if(empty($plugins))
        <h1>No hay módulos instalados</h1>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Autor</th>
                    <th>Version</th>
                    <th>Acciones</th>
                </tr>
            </thead>
                        @foreach($plugins as $plugin)
            <tbody>
                    <tr>
                            <td>{{ $plugin->name }}</td>
                            <td>{{ $plugin->description }}</td>
                            <td>{{ $plugin->author }}</td>
                            <td>{{ $plugin->version }}</td>
                            <td>
                                <a class="waves-effect waves-light btn-small" href="{{ route('status', [$plugin->id, $plugin->status ? 'Desactivar' : 'Activar']) }}">{{ $plugin->status ? 'Desactivar' : 'Activar' }}</a>
                                <a class="waves-effect waves-light btn-small" href="{{ route('delete', [$plugin->id, $plugin->name]) }}">Eliminar</a>
                            </td>
                    </tr>
            </tbody>
                        @endforeach
        </table>
        
    @endif

    <a class="waves-effect waves-light btn" href="{{ route('insert') }}">Instalar plugin</a>
    <a class="waves-effect waves-light btn" href="{{ route('actualizar') }}">Actualizar</a>
@endsection