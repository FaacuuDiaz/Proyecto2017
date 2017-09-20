<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/styles/css/footer.css">
  <link rel="stylesheet" type="text/css" href="../assets/styles/css/menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/css/header.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <title>
            Iniciar Session
        </title>
    </head>
    <body>

<header><h1>Hospital DR. Ricardo Gutierrez</h1></header>
    <nav class="menu">
        <ul>
            <li><a href="../index.php">Inicio</a></li>
        </ul>
    </nav>
    <p>Iniciar Session</p>
    <div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form class="form-group" action="./usuarioAdmin.php">
        <label for="usuario">Usuario:</label>
        <input name="user" class="form-control"  pattern="[a-zA-Z]{4,15}$" placeholder="Ingrese el usuario" data-error="Ingresar usuario valido." type="text" required><BR/>
        <label for="pass">Contraseña:</label>
        <input name="pass" class="form-control" placeholder="Ingrese la contraseña" pattern="[a-z0-9A-Z]{6,12}$" data-error="Ingresar contraseña valida." type="password" required><BR/>
        <input name="submit" class="btn btn-success" type="submit" value="Aceptar">
    </form>
    </div>
    <div class="col-sm-4"></div>
    </div>
    <footer class="footer">Proyecto de Software 2017 - Hospital Dr. Ricardo Gutierrez</footer>

</body>
</html>
