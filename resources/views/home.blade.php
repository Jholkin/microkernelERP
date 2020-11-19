@extends('layouts.layout')

@section('title', 'Home')

@section('nav-bar')
    @include('layouts._nav')
@endsection
    
@section('column')
    @if(!empty($plugins))
        @foreach($plugins as $plugin)
            @if($plugin->status)
                <li><a href="{{ route(strtolower($plugin->name).'.index') }}">{{ __($plugin->name) }}</a></li>
            @endif
        @endforeach
    @endif
@endsection

@section('content')
    <h1>Bienvenido al sistema de Ventas</h1>
@endsection