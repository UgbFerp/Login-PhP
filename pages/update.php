    <h1>Mudar Senha</h1>

    <form action="" method="post">
        <h1>Insira sua nova senha</h1>
        <input type="text" name="pass" id="pass" placeholder="Nova Senha">
        <button type="submit">Alterar</button>
    </form>

    <?php
    include('confirm.php');
    $code = "dd62d12646047733170fe4a879dc1875";
    if (isset($_POST) && !empty($_POST)) {
        $pass = $_POST['pass'];
    }
    // $recovery = $mysqli->query("SELECT act FROM confirmations WHERE code = '$code'");
    // $recovery_list = $recovery->fetch_assoc();
    // print_r($recovery_list);
        $recovery = $mysqli->query("SELECT email FROM confirmations WHERE code = '$code'");
        $recovery_list = $recovery->fetch_assoc();
        $email = $recovery_list['email'];
        
        $Update = $mysqli->query("SELECT email FROM users WHERE email = '$email' ");
        $Update_list =  $Update->fetch_assoc();
        $useremail = $Update_list['email'];
        echo $pass;
        echo $useremail;
        echo $email;
        // $newpass = $mysqli->query("UPDATE `users` SET `senha` = '$pass' WHERE `users`.`email` = '$useremail' LIMIT 1");
        mysqli_query($mysqli, "UPDATE `users` SET `senha` = '$pass' WHERE `users`.`email` = '$useremail'")

?>