<h1>Mudar Senha</h1>

<form action="" method="post">
    <h1>Insira o código</h1>
    <input type="text" name="code" id="code" placeholder="Código">
    <button type="submit">Submit</button>
</form>
<?php
include('confirm.php');

$code = $_POST['code'];

if ($mysqli->connect_errno) {
    echo "Falha ao conectar: " . $mysqli->connect_error;
    exit();
}
$Valid = $mysqli->query("SELECT * FROM confirmations WHERE code = '$code'");
if ($Valid->num_rows > 0) {
    // O código é válido
    echo "Código válido!";
    
    header("Location:update.php");
} else {
    // O código é inválido
    echo "Código inválido!";
}
?>