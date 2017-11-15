<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- Icones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<header>
    <nav class="grey darken-4">
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">Auditório</a>
                <a href="#" data-activates="mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="/">Home</a></li>
                    <li><a href="/auditorios">Auditórios</a></li>
                    <li><a href="/agendamentos">Agendamentos</a></li>
                    @if(Auth::guest())
                    <li><a class="waves-effect waves-light btn modal-trigger yellow accent-3 black-text" href="#modal-login">Login</a></li>
                  @else
                    <li><a href="{{ route('logout') }}">{{Auth::user()->name}}</a></li>
                  @endif
                   
                </ul>
                <ul class="side-nav" id="mobile">
                    <li><a class="waves-effect waves-light btn modal-trigger yellow accent-3 black-text" href="#modal-login">Login</a></li>
                    <li><a href="/">Home</a></li>
                    <li><a href="/auditorios">Auditórios</a></li>
                    <li><a href="/agendamentos">Agendamentos</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
