@extends('layouts.layout')

@section('nav-bar')
    @include('layouts._nav')
@endsection

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('product.name') !!}
    </p>

    @if(empty($products))
        <p>No hay Productos registrados</p>
    @else
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Precio unitario</th>
                        <th>Stock</th>
                        <th>Proveedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
        @foreach($products as $product)

                <tbody>
                    <tr>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->brand }} </td>
                        <td> {{ $product->unit_price }} </td>
                        <td> {{ $product->stock }} </td>
                        <td> {{ $product->provider }} </td>
                        <td> 
                            <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                            <a href="{{ route('products.destroy', $product->id) }}">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
        @endforeach
            </table>
    @endif

    <a href="{{ route('products.create') }}">
        <button class="btn waves-effect waves-light" type="submit" name="action">Nuevo Producto
            <i class="material-icons right">send</i>
        </button>
    </a>
@endsection