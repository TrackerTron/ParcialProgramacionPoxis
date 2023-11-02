<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
</head>
<body>
  <h1>Registro</h1>

  <form action="{{ route('register') }}" method="post">
    @csrf

    <input type="text" name="name" placeholder="Nombre de usuario">
    <input type="email" name="email" placeholder="Correo electrónico">
    <input type="password" name="password" placeholder="Contraseña">

    <input type="submit" value="Registrar">
  </form>
</body>
</html>
