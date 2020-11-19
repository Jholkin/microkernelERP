@extends('layouts.layout')

@section('nav-bar')
    @include('layouts._nav')
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                <input id="name" type="text" class="validate" name="name" value="{{ $product->name }}">
                <label for="name">Nombre</label>
                </div>
                <div class="input-field col s6">
                <input id="brand" type="text" class="validate" name="brand" value="{{ $product->brand }}">
                <label for="brand">Marca</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="unit_price" type="number" class="validate" name="unit_price" value="{{ $product->unit_price }}">
                <label for="unit_price">Precio unitario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input id="stock" type="number" class="validate" name="stock" value="{{ $product->stock }}">
                    <label for="stock">Stock</label>
                </div>
                <div class="input-field col s4">
                    <input id="provider" type="text" class="validate" name="provider" value="{{ $product->provider }}">
                    <label for="provider">Proveedor</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                <i class="material-icons right">send</i>
            </button>
            <a class="waves-effect waves-light btn" href="{{ route('products.index') }}"><i class="material-icons left">keyboard_arrow_left</i>Regresar</a>
        </form>
    </div>
@endsection