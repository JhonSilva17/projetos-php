<?php 

    require_once './header.php'; 
    require_once './classes.php';

    $erro = '';
    $success = '';
    $idTarefa = isset($_GET['id']) ? $_GET['id'] : '';

    $banco = new Banco('localhost', 'root', '', 'todo_list');
    $busca = $banco -> querySQL("SELECT * FROM tarefas WHERE id = '$idTarefa'");
    $tarefa = $busca->fetch_assoc();

    if (count($_POST) > 0) {
        $conexao = $banco -> conectar();

        if ($conexao) {
            $delete = $banco -> querySQL("DELETE FROM tarefas WHERE id = '$idTarefa'");
            
            if ($delete) {
                $success = "Dados removidos com sucesso";
                header('Location: index.php');
            }
        }
    }
?>

    <div class="bg-dark py-5">
        <h1 class="text-center text-white display-4">Deletando tarefas</h1>
    </div>

    <div class="mt-5 container w-50">
        <h2 class="fs-4 text-dark">Tem certeza de que quer remover a tarefa <span class="fw-bold">'<?= $tarefa['nome'] ?>'</span>?</h2>
        <div>
            <p class="text-danger"><?= $erro ?></p>
            <p class="text-success"><?= $success ?></p>
        </div>
        <form action="" method="POST">
            <button class="btn btn-primary fs-5 d-inline-block" type="submit" name="submit">Sim, quero deletar</button>
            <a href="./index.php" class="fs-5 d-inline-block mt-4 px-5">&leftarrow; Não, quero cancelar</a>
        </form>
    </div>

<?php require_once './footer.php' ?>