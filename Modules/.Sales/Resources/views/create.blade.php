@extends('layouts.layout')

@section('nav-bar')
    @include('layouts._nav')
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('sales.store') }}">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                <input placeholder="Placeholder" id="product" type="number" class="validate" name="product">
                <label for="product">Producto</label>
                </div>
                <div class="input-field col s6">
                <input id="customer" type="number" class="validate" name="customer">
                <label for="customer">Cliente</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input id="amount" type="number" class="validate" name="amount">
                <label for="amount">Cantidad</label>
                </div>
                <div class="input-field col s6">
                <input id="fecha" type="date" class="validate" name="fecha">
                <label for="fecha">Fecha</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Vender
                <i class="material-icons right">send</i>
            </button>
            <a class="btn waves-effect waves-light" href="{{ route('sales.index') }}"><i class="material-icons right">keyboard_arrow_left</i>Regresar</a>
        </form>
    </div>

    <div class="row">
        <table class="col s6">
            <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Precio unitario</th>
                        <th>Stock</th>
                    </tr>
                </thead>
            @foreach($products as $product)
                <tbody>
                    <tr>
                        <td> {{ $product->id }} </td>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->brand }} </td>
                        <td> {{ $product->unit_price }} </td>
                        <td> {{ $product->stock }} </td>
                    </tr>
                </tbody>
            @endforeach
        </table>

        <table class="col s6">
            <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Celular</th>
                        <th>Fecha nacimiento</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
            @foreach($customers as $customer)
                <tbody>
                    <tr>
                        <td> {{ $customer->id }} </td>
                        <td> {{ $customer->name }} </td>
                        <td> {{ $customer->lastname }} </td>
                        <td> {{ $customer->phone }} </td>
                        <td> {{ $customer->birthday }} </td>
                        <td> {{ $customer->address }} </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection