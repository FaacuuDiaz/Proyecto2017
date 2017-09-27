<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <link href="../css/table.css" rel="stylesheet" type="text/css">
    <link href="../css/menu.css" rel="stylesheet" type="text/css">
    <link href="../css/header.css" rel="stylesheet" type="text/css">
    <link href="../css/footer.css" rel="stylesheet" type="text/css">
    <head>
        <title>Listar Pacientes</title>
    </head>
    <body>
    <header><h1>Hospital Gutierrez</h1></header>
    <nav class="menu">
        <ul>
            <li><a href="./usuarioAdmin.php">Inicio</a></li>
            <li class="submenu"><a>Pacientes</a>
                <ul>
                    <li><a href="./pacienteRegistrar.php">Alta Paciente</a></li>
                    <li><a href="./pacienteListar.php">Listar Paciente</a></li>
                </ul>
            </li>
<form id="searchform" action="./busquedaPaciente.php">
<input type="text" placeholder="Buscar..."/><button type="submit">Ir</button>
</form>
    </ul>
    </nav>
    <p>Resultado de busqueda Paciente</p>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Documento</th>
            <th>telefono</th>
            <th>Direccion</th>
            <th>Obra Social</th>
        </tr>
        <tr>
            <td>Maria</td>
            <td>Cercato</td>
            <td>37684596</td>
            <td>4524212</td>
            <td>22 y 38</td>
            <td>Osde</td>
            <td><a href="pacienteModificar.php"><img src="../img/mas.png" alt="Listar" height="40" width="40"></a></td>
            <td><a href="pacienteEliminar.php"><img src="../img/eliminar.png" alt="eliminar" height="40" width="40"></a></td>
        </tr>
        <tr>
            <td>Nicolas</td>
            <td>Ruffolo</td>
            <td>38313821</td>
            <td>4211232</td>
            <td>140 y 49</td>
            <td>Ughtra</td>
            <td><a href="pacienteModificar.php"><img src="../img/mas.png" alt="Listar" height="40" width="40"></a></td>
            <td><a href="pacienteEliminar.php"><img src="../img/eliminar.png" alt="eliminar" height="40" width="40"></a></td>
        </tr>
    </table>

    <footer>Pilis+Plomero@2017all Rights Reserved</footer>
</body>
</html>
