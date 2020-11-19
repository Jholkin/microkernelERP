@extends('layouts.layout')

@section('link-nav')
    <li><a href="{{ route('customer.index') }}">Clientes</a></li>
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('customer.update', $customer->id) }}">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                <input id="first_name" type="text" class="validate" name="name" value="{{ $customer->name }}">
                <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s6">
                <input id="last_name" type="text" class="validate" name="lastname" value="{{ $customer->lastname }}">
                <label for="last_name">Apellido</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email" value="{{ $customer->email }}">
                <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input id="phone" type="tel" class="validate" name="phone" value="{{ $customer->phone }}">
                    <label for="phone">Celular</label>
                </div>
                <div class="input-field col s4">
                    <input id="address" type="text" class="validate" name="address" value="{{ $customer->address }}">
                    <label for="address">Dirección</label>
                </div>
                <div class="input-field col s4">
                    <input id="birthday" type="date" class="validate" name="birthday" value="{{ $customer->birthday }}">
                    <label for="birthday">Nacimiento</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
@endsection