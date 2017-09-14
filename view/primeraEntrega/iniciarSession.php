<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no ,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="../css/menu.css" rel="stylesheet" type="text/css">
    <link href="../css/header.css" rel="stylesheet" type="text/css">
    <link href="../css/formularios.css" rel="stylesheet" type="text/css">
    <link href="../css/footer.css" rel="stylesheet" type="text/css">


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
    <form action="./usuarioAdmin.php">
        Usuario:
        <input name="user" pattern="[a-zA-Z]{4,15}$" placeholder="Ingrese el usuario" data-error="Ingresar usuario valido."
        type="text" required>
        Contraseña:
        <input name="pass" placeholder="Ingrese la contraseña" pattern="[a-z0-9A-Z]{6,12}$" data-error="Ingresar contraseña valida."
        type="password" required>
        <input name="submit" type="submit" value="Aceptar">
    </form>

    <footer class="footer" >Proyecto de Software 2017 - Hospital Dr. Ricardo Gutierrez</footer>
</body>
</html>
