{{-- Práctica 8 --}}
<form action="{{ route('signup') }}" method="POST">
    @csrf

    <h1>Registro de usuarios</h1><br>

    <label for="name">Nombre:</label><br>
    <input type="text" name="name" id="name" value="{{ old('name') }}"><br>

    <label for="surname">Apelllido:</label><br>
    <input type="text" name="surname" id="surname" value="{{ old('surname') }}"><br>

    <label for="nickname">Nick:</label><br>
    <input type="text" name="nickname" id="nickname" value="{{ old('nickname') }}"><br>

    <label for="email">Correo: </label><br>
    <input type="text" name="email" id="email" value="{{ old('email') }}"><br>

    <label for="password">Contraseña: </label><br>
    <input type="password" name="password" id="password"><br>

    <label for="password_confirmation">Repite la contraseña: </label><br>
    <input type="password" name="password_confirmation" id="password_confirmation"><br>
    <br>

    <input type="submit" value="Enviar">
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
