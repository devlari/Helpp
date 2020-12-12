<?php
date_default_timezone_set('America/Sao_Paulo');

require("../config/config.php");
require("../models/Usuario.class.php");
require("../models/UsuarioDAO.class.php");

$usuarios = new UsuarioDAO();
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../../system/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../../../system/css/style.css">
</head>
<body>
    <h1>Configurações</h1>
    <label>Nome:</label>
    <input></input>
</body>

</html>