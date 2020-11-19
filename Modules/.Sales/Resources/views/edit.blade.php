@extends('layouts.layout')

@section('nav-bar')
    @include('layouts._nav')
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('sales.update', $sale->id) }}">
            @csrf
            <input type="number" class="validate" name="product_id" value="{{ $sale->products[0]->id }}" hidden>
            <div class="row">
                <div class="input-field col s6">
                <input id="product" type="text" class="validate" name="product" value="{{ $sale->products[0]->name }}" disabled>
                <label for="product">Producto</label>
                </div>
                <div class="input-field col s6">
                <input id="customer" type="text" class="validate" name="customer" value="{{ $sale->customer->name }}" disabled>
                <label for="customer">Cliente</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                <input id="amount" type="number" class="validate" name="amount" value="{{ $sale->products[0]->pivot->amount }}">
                <label for="amount">Cantidad</label>
                </div>
                <div class="input-field col s6">
                <input id="price" type="number" class="validate" name="price" value="{{ $sale->products[0]->pivot->price }}" disabled>
                <input id="price" type="number" class="validate" name="price" value="{{ $sale->products[0]->pivot->price }}" hidden>
                <label for="price">Precio</label>
                </div>
                <div class="input-field col s6">
                <input id="fecha" type="date" class="validate" name="fecha" value="{{ $sale->fecha }}" disabled>
                <label for="fecha">Fecha</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                <i class="material-icons right">send</i>
            </button>
            <a class="btn waves-effect waves-light" href="{{ route('sales.index') }}"><i class="material-icons right">keyboard_arrow_left</i>Regresar</a>
        </form>
    </div>
@endsection