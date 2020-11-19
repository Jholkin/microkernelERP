@extends('layouts.layout')

@section('nav-bar')
    @if(!empty($plugins))
        @foreach($plugins as $plugin)
            @if($plugin->status)
                <li><a href="{{ route(strtolower($plugin->name).'.index') }}">{{ __($plugin->name) }}</a></li>
            @endif
        @endforeach
    @endif
@endsection

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('customer.name') !!}
    </p>

    @if(empty($customers))
        <p>No hay Clientes registrados</p>
    @else
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Fecha nacimiento</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
        @foreach($customers as $customer)

                <tbody>
                    <tr>
                        <td> {{ $customer->name }} </td>
                        <td> {{ $customer->lastname }} </td>
                        <td> {{ $customer->email }} </td>
                        <td> {{ $customer->phone }} </td>
                        <td> {{ $customer->birthday }} </td>
                        <td> {{ $customer->address }} </td>
                        <td> 
                            <a href="{{ route('customer.edit', $customer->id) }}">Editar</a>
                            <a href="{{ route('customer.destroy', $customer->id) }}">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
        @endforeach
            </table>
    @endif

    <a href="{{ route('customer.create') }}">
        <button class="btn waves-effect waves-light" type="submit" name="action">Nuevo Cliente
            <i class="material-icons right">send</i>
        </button>
    </a>
@endsection
