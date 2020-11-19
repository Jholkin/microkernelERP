@extends('layouts.layout')

@section('title', 'Instalar plugin')

@section('nav-bar')
    @include('layouts._nav')
@endsection

@section('content')
<div class="row">
    <form class="col s12" method="POST" action="{{route('save')}}">
        @csrf
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">insert_link</i>
          <input id="icon_prefix" type="text" name="url" class="validate">
          <label for="icon_prefix">Link GitHub</label>
          <input type="submit" value="Instalar" class="waves-effect waves-light btn">
        </div>
      </div>
      <a class="waves-effect waves-light btn" href="{{ route('modules') }}">Regresar</a>
    </form>
  </div>
@endsection