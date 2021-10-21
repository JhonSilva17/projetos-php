<?php 

    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['user'])) {
        die('Você precisa estar logado para acessar. <a href="logout.php"> Sair </a>');
    }
