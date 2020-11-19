<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Customer</title>

       {{-- Laravel Mix - CSS File --}}
       {{-- <link rel="stylesheet" href="{{ mix('css/customer.css') }}"> --}}
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body>

        <header>        
            <nav>
                <div class="nav-wrapper">
                    <a href="{{ route('home') }}" class="brand-logo">Logo</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="{{ route('ventas') }}" class="{{request()->routeIs('ventas') ? 'active' : ''}}">Ventas</a></li>
                        <li><a href="{{ route('insert') }}" class="{{request()->routeIs('insert') ? 'active' : ''}}">Agregar plugin</a></li>
                        <li><a href="{{ route('modules') }}" class="{{request()->routeIs('modules') ? 'active' : ''}}">Plugins</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Page Layout here -->
        <div class="row">

            <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
            <!-- Grey navigation panel

                    This content will be:
                3-columns-wide on large screens,
                4-columns-wide on medium screens,
                12-columns-wide on small screens  -->
                

            </div>

            <div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
            <!-- Teal page content

                    This content will be:
                9-columns-wide on large screens,
                8-columns-wide on medium screens,
                12-columns-wide on small screens  -->
                @yield('content')

            </div>

        </div>

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/customer.js') }}"></script> --}}
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>
