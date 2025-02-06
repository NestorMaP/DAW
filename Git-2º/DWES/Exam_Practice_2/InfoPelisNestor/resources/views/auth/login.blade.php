{{-- Práctica 8 --}}
<form action="{{ route('login') }}" method="POST">
    @csrf

    <h1>Login</h1>

    <label for="email">Correo: </label><br>
    <input type="text" name="email" id="email" value="{{ old('email') }}"><br>

    <label for="password">Contraseña: </label><br>
    <input type="password" name="password" id="password"><br>

    <label>
        <input type="checkbox" name="remember">Recuérdame
    </label>
    <br><br>

    <input type="submit" value="Enviar">
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
