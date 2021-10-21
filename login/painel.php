<?php 

    require_once './protect.php';

?>

<?php require_once './header.php' ?>
    
    <div class="container">
        <h1>Bem vindo ao painel, <?php echo $_SESSION['name'] ?></h1>
        <a href="./logout.php">Sair</a>
    </div>

<?php require_once './footer.php' ?>