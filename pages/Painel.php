<?php
    include('../protect.php')
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UGB Format</title>
</head>

<body>
    <header>
        <h1>Painel</h1>
    </header>
    <main>
        <div>
            <span>conteudo do format</span>
            <p>Bem vindo ao Format, <?php echo $_SESSION['nome']; ?> </p>
            <a href="logout.php">Sair</a>
        </div>
    </main>
    <footer>
        <p>Desenvolvido por <a href="https://github.com/r90ur7" />
            Rallenson Silva
        </p>
    </footer>
</body>

</html>