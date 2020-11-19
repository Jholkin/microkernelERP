@extends('layouts.layout')

@section('nav-bar')
    @include('layouts._nav')
@endsection

@section('content')
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('employees.store') }}">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="name">
                <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s6">
                <input id="last_name" type="text" class="validate" name="lastname">
                <label for="last_name">Apellido</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email">
                <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input id="phone" type="tel" class="validate" name="phone">
                    <label for="phone">Celular</label>
                </div>
                <div class="input-field col s4">
                    <input id="address" type="text" class="validate" name="address">
                    <label for="address">Dirección</label>
                </div>
                <div class="input-field col s4">
                    <input id="birthday" type="date" class="validate" name="birthday">
                    <label for="birthday">Nacimiento</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Crear
                <i class="material-icons right">send</i>
            </button>
            <a class="btn waves-effect waves-light" href="{{ route('employees.index') }}"><i class="material-icons right">keyboard_arrow_left</i>Regresar</a>
        </form>
    </div>
@endsection