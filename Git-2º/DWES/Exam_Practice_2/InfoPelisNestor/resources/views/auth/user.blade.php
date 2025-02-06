{{-- Práctica 8 --}}
<h1>Hola {{ Auth::user()->nickname }}</h1>

<p>Esta es tu información:</p>
<p><strong>Nombre: </strong>{{ Auth::user()->name }}
<p><strong>Apellido: </strong>{{ Auth::user()->surname }}
<p><strong>Nick: </strong>{{ Auth::user()->nickname }}
<p><strong>Correo: </strong>{{ Auth::user()->email }}
<p><strong>Rol: </strong>{{ Auth::user()->rol}}

@if(Auth::viaRemember())
    <p><strong>Has iniciado sesión con la opción "Recuérdame".</strong></p>
@endif

<br><br>

<a href="{{ route('logout') }}">Cerrar sesión.</a>
<br><br>
<a href="{{ route('index') }}">Volver al inicio.</a>
