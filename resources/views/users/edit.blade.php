<html>

@include('../layouts.errors')
@include('../layouts.head')

<body>

    <h1>Editar usuario <img src="{{ asset('img/icon.png') }}" width="150"></h1>
    <div class="container">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre:</label><br>
                <input type="text" class="form-control" name="nombre" id="nombre" minlength="2" maxlength="20"
                    value="{{ $user->name }}" placeholder="nombre">
            </div>
            <div class="col-md-4">
                <label for="apellidos" class="form-label">Apellidos:</label><br>
                <input type="text" class="form-control"name="apellidos" id="apellidos" minlength="2" maxlength="40"
                    value="{{ $user->surnames }}" placeholder="apellidos">
            </div>

            <div class="col-md-4">
                <label for="dni" class="form-label">Dni:</label><br>
                <input type="text" class="form-control"name="dni" id="dni" minlength="9" maxlength="9"
                    value="{{ $user->dni }}" placeholder="dni">
            </div>

            <div class="col-md-4">
                <label for="email" class="form-label">Email:</label><br>
                <input type="email" class="form-control"name="email" id="email" value="{{ $user->email }}"
                    placeholder="email@email.com">
            </div>

            <div class="col-md-4">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" class="form-control"name="telefono" id="telefono" minlength="9" maxlength="12"
                    pattern="[+]{1}[0-9]{11}" value="{{ $user->phone }}" placeholder="teléfono">
            </div>

            <div class="col-md-4">
                <label for="pais" class="form-label">País:</label>
                <input type="text" class="form-control"name="pais" id="pais" minlength="3"
                    value="{{ $user->country }}" placeholder="país">
            </div>

            <div class="col-md-8">
                <label for="iban" class="form-label">Número cuenta bancaria (IBAN):</label>
                <input type="text" class="form-control"name="iban" id="iban" required
                    value="{{ $user->iban }}" placeholder="IBAN">
            </div>

            <div class="col-md-10">
                <label for="sobreTi">Sobre ti:</label>
                <input class="form-control" name="sobreTi" id="sobreTi" minlength="20" maxlength="250"
                    value="{{ $user->over_you }}" placeholder="Sobre ti">
            </div>
            <br>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('users.index') }}">
                    <input type="button" class="btn btn-secondary" value="Volver">
                </a>
            </div>

        </form>
    </div>

    @include('../layouts.footer')
</body>

</html>
