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
        $newTarefa = isset($_POST['nome']) ? $_POST['nome'] : '';
        if (empty($newTarefa)) {
            $erro = "Digite o nome da tarefa e tente novamente.";
        } else {
            $conexao = $banco -> conectar();

            if ($conexao) {
                $update = $banco -> querySQL("UPDATE tarefas SET nome = '$newTarefa' WHERE id = '$idTarefa'");
                
                if ($update) {
                    $success = "Dados atualizados com sucesso";
                }
            }
        }
    }
?>

    <div class="bg-dark py-5">
        <h1 class="text-center text-white display-4">Editando tarefas</h1>
    </div>

    <div class="mt-5 container w-50">
        <form action="" method="POST">
            <div>
                <p class="text-danger"><?= $erro ?></p>
                <p class="text-success"><?= $success ?></p>
            </div>
            <label for="nome" class="form-label fw-bold fs-5">Nome da tarefa: </label>
            <input type="text" id="nome" name="nome" value="<?= $tarefa['nome'] ?>" class="form-control fs-5" placeholder="Ex: Fazer caminhada" required>

            <button type="submit" class="btn btn-primary fs-5 px-4 mt-4">Atualizar</button>
        </form>
        <a href="./index.php" class="fs-5 d-inline-block mt-4">&leftarrow; Voltar</a>
    </div>

<?php require_once './footer.php' ?>