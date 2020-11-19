@extends('layouts.layout')

@section('nav-bar')
    @include('layouts._nav')
@endsection

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('sale.name') !!}
    </p>

    @if(empty($sales))
        <p>No hay Ventas registrados</p>
    @else
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
        @foreach($sales as $sale)
            @foreach($sale->products as $product)
                <tbody>
                    <tr>
                        <td> {{ $sale->id }} </td>
                        <td> {{ $sale->customer->name }} </td>
                        <td> {{ $sale->customer->lastname }} </td>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->pivot->amount }} </td>
                        <td> {{ $product->pivot->price }} </td>
                        <td> {{ $product->pivot->price * $product->pivot->amount }} </td>
                        <td> 
                            <a href="{{ route('sales.edit', $sale->id) }}">Editar</a>
                            <a href="{{ route('sales.destroy', $sale->id) }}">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        @endforeach
            </table>
    @endif

    <a href="{{ route('sales.create') }}">
        <button class="btn waves-effect waves-light" type="submit" name="action">Nueva venta
            <i class="material-icons right">send</i>
        </button>
    </a>
@endsection