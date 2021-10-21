<?php 
    require_once './conexao.php';

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    $erro = '';
    $success = '';

    if (count($_POST) > 0) {
        if (empty($name)) {
            $erro = 'Por favor, digite o seu nome.';
        } else if (empty($email)) {
            $erro = "Por favor, digite seu email";
        } else if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            $erro = "Verifique se o email foi digitado corretamente";
        } else if (empty($senha)) {
            $erro = "Por favor, digite sua senha";
        } else {
            $sql_code = "INSERT INTO usuario(nome, email, senha) VALUES('$name', '$email', '$senha')";
            $sql_query = $mysqli -> query($sql_code) or die('Falha na conexão com banco de dados');

            if ($sql_query) {
                $success = "Dados cadastrados com sucesso";
                header('Location: index.php');
            } else {
                $erro = "Erro ao cadastrar os dados, tente novamente.";
            }
        }
    }
?>

<?php require_once './header.php' ?>

<body>
    
    <div class="container mt-4">
        <div>
            <p class="text-danget"><?= $erro ?></p>
            <p class="text-success"><?= $success ?></p>
        </div>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label fs-5">Nome: </label>
                <input type="text" name="name" id="name" class="form-control w-25">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fs-5">E-mail: </label>
                <input type="email" name="email" id="email" class="form-control w-25">
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label fs-5">Senha: </label>
                <input type="password" name="senha" id="senha" class="form-control w-25">
            </div>

            <div>
                <button type="submit" class="btn btn-primary fs-5 px-4">Cadastrar</button>
            </div>
        </form>
    </div>


<?php require_once './footer.php' ?>