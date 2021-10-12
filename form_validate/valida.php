<?php

    // Recebimento dos valores através da superglobal POST
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $coment = isset($_POST['coment']) ? $_POST['coment'] : '';

    // Verificação de erros juntamente com os filtros
    if (!$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS)) {
        echo "Digite seu nome corretamente <br>";

    } else if (!$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)) {
        echo "Digite seu email corretamente <br>";

    } else if (!$coment = filter_input(INPUT_POST, 'coment', FILTER_SANITIZE_SPECIAL_CHARS)) {
        echo "Digite seu comentário corretamente";  
    }

    echo $nome . "<br>" . $email . "<br>" . $coment;