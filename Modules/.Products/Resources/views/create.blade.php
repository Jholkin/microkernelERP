@extends('layouts.layout')

@section('nav-bar')
    @include('layouts._nav')
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                <input placeholder="Placeholder" id="name" type="text" class="validate" name="name">
                <label for="name">Nombre</label>
                </div>
                <div class="input-field col s6">
                <input id="brand" type="text" class="validate" name="brand">
                <label for="brand">Marca</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="unit_price" type="number" class="validate" name="unit_price">
                <label for="unit_price">Precio Unitario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input id="stock" type="number" class="validate" name="stock">
                    <label for="stock">Stock</label>
                </div>
                <div class="input-field col s4">
                    <input id="provider" type="text" class="validate" name="provider">
                    <label for="provider">Proveedor</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Crear
                <i class="material-icons right">send</i>
            </button>
            <a class="btn waves-effect waves-light" href="{{ route('products.index') }}"><i class="material-icons right">keyboard_arrow_left</i>Regresar</a>
        </form>
    </div>
@endsection