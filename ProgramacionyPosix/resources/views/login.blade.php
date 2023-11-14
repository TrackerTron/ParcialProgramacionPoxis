<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
</head>
<body>
<h1>Inicio de Sesión</h1>

<form action="{{ route('login') }}" method="post">
      @csrf

    <input type="email" name="email" placeholder="Correo electrónico" required>
    <input type="password" name="password" placeholder="Contraseña">
    
    <input type="submit" value="Iniciar sesión">
</form>

</body>
</html>
