<h1>REGISTRO</h1>
<form action="{{route('users.store')}}" method="post">
    @csrf
    <label for="Nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" minlength="2" maxlength="20" required>
    <br>
    <label for="Apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos" minlength="2" maxlength="40" required>
    <br>
    <label for="Dni">Dni:</label>
    <input type="text" name="dni" id="dni" minlength="9" maxlength="9" pattern="[0-9]{8}[A-Za-z]{1}" required> 
    <br>
    <label for="Email">Email:</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="Password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <label for="Password">Repetir password:</label>
    <input type="password" name="passwordR" id="passwordR" required>
    <br>
    <label for="Telefono">Telefono:</label>
    <input type="tel" name="telefono" id="telefono" minlength="9" maxlength="12" pattern="[+]{1}[0-9]{11}">
    <br>
    <label for="Pais">País:</label>
    <input type="text" name="pais" id="pais">
    <br>
    <label for="Iban">Número de cuenta bancaria (IBAN):</label>
    <input type="text" name="iban" id="iban" required>
    <br>
    <label for="SobreTi">Sobre ti:</label>
    <input type="text" name="sobreti" id="sobreti" minlength="20" maxlength="250">
    <br>
    <input type="submit" value="Registrar">
</form>