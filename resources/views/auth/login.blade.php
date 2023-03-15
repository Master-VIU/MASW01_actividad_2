<html>
@include('../layouts.head')


@if ($errors->any())
<div class="alert alert-danger">
    <strong>Por favor corregir los errores:</strong>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<body>
    <h1>Iniciar sesión <img src="{{ asset('img/icon.png') }}" width="150"></h1>
    <div class="container-form">
        <form action="{{ route('users.authenticate') }}" method="post">
            @csrf
            <div class="col-md-5">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" autofocus required placeholder="Ingrese su email">
            </div>

            <div class="col-md-5">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Ingrese su contraseña" required>
            </div>
            <br>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('users.create') }}">
                    <button type="button" class="btn btn-secondary">Registrar</button>
                </a>
            </div>
        </form>
    </div>
    @include('../layouts.footer')
</body>

</html>
