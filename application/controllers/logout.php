<?php
    session_start();

    
    unset($_SESSION['usuario']);
    unset($_SESSION['filtro']);
    unset($_SESSION['pesquisa']);
    session_destroy();

    header('location:../');

