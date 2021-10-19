<?php 

    require_once './classes.php';
    
    $conexao = new Banco('localhost', 'root', '', 'todo_list');
    $connection = $conexao -> conectar();

    if (count($_POST) > 0) {
        $tarefa = isset($_POST['tarefa']) ? $_POST['tarefa'] : '';

        if (empty($tarefa)) {
            echo "O campo de tarefas não pode ficar vazio";
        } else {
            $sql_insert = "INSERT INTO tarefas(nome) VALUES ('$tarefa')";
            $insert = $conexao -> querySQL($sql_insert);
            
        }
    }

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List - Use e abuse</title>
    <!--LINK DO BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <div class="bg-dark py-5">
        <h1 class="text-white display-4 text-center mb-4">Todo List com PHP</h1>
        <div class="w-50 mx-auto">
            <form action="index.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="tarefa" id="tarefa" placeholder="name@example.com" required>
                    <label for="tarefa">Digite sua tarefa</label>
                </div>

                <div class="d-flex justify-center">
                    <button type="submit" class="btn btn-primary text-white fw-bold fs-5 px-5">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <main>
        <div class="container w-75">
            <table class="table table-hover mt-5">
                <thead>
                    <tr class="text-center">
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if ($connection) {
                            $busca = $conexao -> querySQL("SELECT * FROM tarefas");
                            
                            while ($tarefaItem = $busca -> fetch_assoc()) { ?>
                                <tr  class="text-center">
                                    <td class="fs-4"><?= $tarefaItem['nome'] ?></td>
                                    <td class="d-flex gap-3 fs-4 justify-content-center">
                                        <a href="./editar.php?id=<?= $tarefaItem['id'] ?>">Editar</a>
                                        <a href="./deletar.php?id=<?= $tarefaItem['id'] ?>">Deletar</a>
                                    </td>
                                </tr>
                            <?php }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <!--SCRIPT DO BOOTSTRAP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>