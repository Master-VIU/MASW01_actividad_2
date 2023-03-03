@section('title')
    REGISTRO
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <h1>Registro usuarios</h1>
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}">
            </div>
            <div class="form-group">
                <label for="Apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" minlength="2" maxlength="40"
                    value="{{ old('apellidos') }}">
            </div>
            <div class="form-group">
                <label for="Dni">Dni:</label>
                <input type="text" name="dni" id="dni" minlength="9" maxlength="9"
                    pattern="[0-9]{8}[A-Za-z]{1}" required value="{{ old('dni') }}">
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="Password">Contraseña:</label>
                <input type="password" name="contraseña" id="contraseña" required>
            </div>
            <div class="form-group">
                <label for="Password">Confirmar contraseña:</label>
                <input type="password" name="confirmarContraseña" id="confirmarContraseña" required>
            </div>
            <div class="form-group">
                <label for="Telefono">Telefono:</label>
                <input type="tel" name="telefono" id="telefono" minlength="9" maxlength="12" pattern="[+]{1}[0-9]{11}"
                    value="{{ old('telefono') }}">
            </div>
            <div class="form-group">
                <label for="Pais">País:</label>
                <input type="text" name="pais" id="pais" value="{{ old('pais') }}">
            </div>
            <div class="form-group">
                <label for="Iban">Número de cuenta bancaria (IBAN):</label>
                <input type="text" name="iban" id="iban" required value="{{ old('iban') }}">
            </div>
            <div class="form-group">
                <label for="SobreTi">Sobre ti:</label>
                <input type="text" name="sobreTi" id="over_you" minlength="20" maxlength="250">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>

        <p>
            <a href="">Volver al login</a>
        </p>
    </div>
