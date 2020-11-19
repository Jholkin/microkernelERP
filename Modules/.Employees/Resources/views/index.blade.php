@extends('layouts.layout')

@section('nav-bar')
    @include('layouts._nav')
@endsection

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('employee.name') !!}
    </p>

    @if(empty($employees))
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
        @foreach($employees as $employee)

                <tbody>
                    <tr>
                        <td> {{ $employee->name }} </td>
                        <td> {{ $employee->lastname }} </td>
                        <td> {{ $employee->email }} </td>
                        <td> {{ $employee->phone }} </td>
                        <td> {{ $employee->birthday }} </td>
                        <td> {{ $employee->address }} </td>
                        <td> 
                            <a href="{{ route('employees.edit', $employee->id) }}">Editar</a>
                            <a href="{{ route('employees.destroy', $employee->id) }}">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
        @endforeach
            </table>
    @endif

    <a href="{{ route('employees.create') }}">
        <button class="btn waves-effect waves-light" type="submit" name="action">Nuevo Empleado
            <i class="material-icons right">send</i>
        </button>
    </a>
@endsection
