<?php
//Login em php
include('../login.php');
//se existe e-mail ou senha
if(isset($_POST['email']) || isset($_Post['senha'])){
    if(strlen($_POST['email']) == 0){
        echo "Digite seu email";
        }
        else if(strlen($_POST['senha']) == 0){
            echo "Digite sua senha";
        }
        else{
            $email = $mysqli ->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha Na Execução Do Código SQL:".$mysqli->error);

            $result = $sql_query ->num_rows;

            if($result == 1){
                echo "Login efetuado com sucesso";
                $username = $sql_query ->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] = $username['id'];
                $_SESSION['nome'] = $username['nome'];

                header("Location: painel.php");
            }
            else{
                echo "Email ou senha incorretos";
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
    <title>UGB Format</title>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form action="" method="post">
            <section>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Digite seu email" required>
                <br />
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
            </section>
            <input type="submit" value="Entrar">
        </form>
    </main>
    <footer>
        <p>Desenvolvido por <a href="https://github.com/r90ur7" />
            Rallenson Silva
        </p>
    </footer>
</body>
</html>