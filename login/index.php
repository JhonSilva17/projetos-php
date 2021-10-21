<?php require_once './conexao.php' ;

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    
    $erro = '';
    $sucess = '';

    echo $email . "<br>" . $senha;

    if (isset($_POST['email']) && isset($_POST['senha']) ) {
        if (empty($email)) {
        $erro = "Preencha o campo email, ele é obrigatório.";
        } else if (filter_input(INPUT_POST, $email, FILTER_VALIDATE_EMAIL, )) { 
            $erro = "Verifique se o seu email foi digitado corretamente";
        } else if (empty($senha)) {
            $erro = "Preencha o campo senha, ele é obrigatório.";
        } else if (empty($email) && empty($senha)) {
            $erro = "Preencha os dois campos, eles são obrigatórios.";
        } else {
            $erro = "";

            $query_select = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli -> query($query_select) or die('Falha na conexão com banco de dados');

            $quantidade = $sql_query -> num_rows;

            if ($quantidade == 1) {
                 $usuario = $sql_query -> fetch_assoc();
                 print_r($usuario);

                 if (!isset($_SESSION)) {
                    session_start();
                 }

                 $_SESSION['user'] = $usuario['id'];
                 $_SESSION['name'] = $usuario['nome'];

                 header('Location: ./painel.php');

            } else {
                $erro = "Email e senhas estão incorretas";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-4">
        <div>
            <p class="text-danger"><?= $erro ?></p>
            <p class="text-success"><?= $sucess ?></p>
        </div>
        <form action="" method='POST'>
            <div class="mb-3">
                <label for="email" class="form-label fs-4">E-mail</label>
                <input type="email" name="email" class="form-control w-25" id="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label fs-4">Senha</label>
                <input type="password" name="senha" class="form-control w-25" id="senha" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary fs-5 px-5">Enviar</button>
            </div>
        </form>
        <a href="./cadastro.php">Cadastre-se</a>
    </div>

</body>
</html>