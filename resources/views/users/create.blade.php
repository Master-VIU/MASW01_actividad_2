@section('title')
    REGISTRO
@endsection
@include('../layouts.head')
@if ($errors->any())
    <div class="alert alert-danger">
        <h4>Por favor corregir los errores:</h4>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>Registro de usuarios <img src="{{ asset('img/icon.png')}}" width="150"></h1>

    <div class="container">
        <form action="{{ route('users.store') }}" method="post">
            @csrf           
            <div class="col-md-4">
                <label for="Nombre" class="form-label">Nombre:</label><br>
                <input type="text" class="form-control" name="nombre" id="nombre" minlength="2" maxlength="20"
                    value="{{ old('nombre') }}">
            </div>
            <div class="col-md-4">
                <label for="Apellidos" class="form-label">Apellidos:</label><br>
                <input type="text" class="form-control"name="apellidos" id="apellidos" minlength="2" maxlength="40"
                    value="{{ old('apellidos') }}">
            </div>

            <div class="col-md-4">
                <label for="Dni" class="form-label">Dni:</label><br>
                <input type="text" class="form-control"name="dni" id="dni" minlength="9" maxlength="9"
                    value="{{ old('dni') }}">
            </div>

            <div class="col-md-4">
                <label for="email" class="form-label">Email:</label><br>
                <input type="email" class="form-control"name="email" id="email" value="{{ old('email') }}">
            </div>

            <div class="col-md-4">
                <label for="Password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control"name="contraseña" id="contraseña" required>
            </div>

            <div class="col-md-4">
                <label for="Password" class="form-label">Confirmar contraseña:</label>
                <input type="password" class="form-control"name="confirmarContraseña" id="confirmarContraseña" required>
            </div>

            <div class="col-md-4">
                <label for="Telefono" class="form-label">Teléfono:</label>
                <input type="tel" class="form-control"name="telefono" id="telefono" minlength="9" maxlength="12"
                    pattern="[+]{1}[0-9]{11}" value="{{ old('telefono') }}">
            </div>

            <div class="col-md-4">
                <label for="Pais" class="form-label">País:</label>
                <input type="text" class="form-control"name="pais" id="pais" minlength="9"
                    value="{{ old('pais') }}">
            </div>

            <div class="col-md-8">
                <label for="iban" class="form-label">Número cuenta bancaria (IBAN):</label>
                <input type="text" class="form-control"name="iban" id="iban" required
                    value="{{ old('iban') }}">
            </div>

            <div class="col-md-10">
                <label for="sobreTi">Sobre ti:</label>
                <textarea class="form-control" name="sobreTi" id="sobreTi" minlength="20" maxlength="250"></textarea>
            </div>
            <br>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="">
                    <input type="button" class="btn btn-secondary" value="Volver al login">
                </a>
            </div>

        </form>
    </div>

    @include('../layouts.footer')
