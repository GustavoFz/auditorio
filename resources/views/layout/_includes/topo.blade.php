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

    <style type="text/css">
        .btn-small {
            height: 24px;
            line-height: 24px;
            padding: 0 0.5rem;
        }
    </style>
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

                    @if(Auth::guest())
                        <li><a class="btn modal-trigger yellow accent-3 black-text"
                               href="#modal-login">Login</a></li>
                    @else
                        <li><a href="/auditorios">Auditórios</a></li>
                        <li><a href="/agendamentos">Agendamentos</a></li>
                        @can('edit', \App\User::class)
                            <li><a href="/usuarios">Usuarios</a></li>
                        @endcan
                        <!-- Dropdown Trigger -->
                        <a class='dropdown-button btn yellow accent-3 black-text' href='#' data-activates='drop'>{{str_limit(Auth::user()->name, 16)}}</a>

                        <!-- Dropdown Structure -->
                        <ul id='drop' class='dropdown-content'>
                            <li>    <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form></li>
                        </ul>
                    @endif

                </ul>
                <ul class="side-nav" id="mobile">

                    <li><a href="/">Home</a></li>

                    @if(Auth::guest())
                        <li><a class="btn modal-trigger yellow accent-3 black-text"
                               href="#modal-login">Login</a></li>
                    @else
                        <li><a href="/auditorios">Auditórios</a></li>
                        <li><a href="/agendamentos">Agendamentos</a></li>
                        <!-- Dropdown Trigger -->
                        <a class='dropdown-button btn yellow accent-3 black-text' href='#' data-activates='dropdown1'>{{str_limit(Auth::user()->name, 16)}}</a>

                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li><a href="{{ route('logout') }}">Sair</a></li>
                        </ul>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
