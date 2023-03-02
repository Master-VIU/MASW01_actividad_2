@section('title')
    REGISTRO
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <h1>Registro usuarios</h1>
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" class="form-control" name="name" id="name" >
            </div>
            <div class="form-group">
                <label for="Apellidos">Apellidos:</label>
                <input type="text" name="surnames" id="surnames" minlength="2" maxlength="40" required>
            </div>
            <div class="form-group">
                <label for="Dni">Dni:</label>
                <input type="text" name="dni" id="dni" minlength="9" maxlength="9"
                    pattern="[0-9]{8}[A-Za-z]{1}" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="Password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="Password">Confirmar contraseña:</label>
                <input type="password" name="confirmPassword" id="confirmPassword" required>
            </div>
            <div class="form-group">
                <label for="Telefono">Telefono:</label>
                <input type="tel" name="phone" id="phone" minlength="9" maxlength="12"
                    pattern="[+]{1}[0-9]{11}">
            </div>
            <div class="form-group">
                <label for="Pais">País:</label>
                <input type="text" name="country" id="country">
            </div>
            <div class="form-group">
                <label for="Iban">Número de cuenta bancaria (IBAN):</label>
                <input type="text" name="iban" id="iban" required>
            </div>
            <div class="form-group">
                <label for="SobreTi">Sobre ti:</label>
                <input type="text" name="overYou" id="overYou" minlength="20" maxlength="250">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>


    </div>

