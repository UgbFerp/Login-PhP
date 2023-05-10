<h1>Esqueci minha senha</h1>

<button>
    <a href="confirm.php" target="_blank" rel="noopener noreferrer"> vou fingir que esse botão é o que se clica no email</a>
</button>
<br>
<br>
<form action="reset_password.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="Digite seu email" required>

    <label for="action">Choose an action:</label>
    <select id="action" name="action" required>
        <option value="reset_password">Reset Password</option>
        <option value="change_email">Change Email</option>
    </select>

    <button type="submit">Submit</button>
</form>

<?php
include('login.php');
ini_set('sendmail_from', 'gustavogoncalves@ugb.edu.br');

if ($mysqli->error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->error);
};

// Get the user's email and action from the form
if (isset($_POST) && !empty($_POST)) {
    $id = 0;
    $email = $_POST['email'];
    $action = $_POST['action'];

} else {
    $email = null;
    $action = null;
}
// Validate the input
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email address');
}

// Generate a unique confirmation code
$code = md5(uniqid());
// **********************

$sql = "SELECT * FROM users ";
$sqlToken = "SELECT * FROM confirmations ";
$result = $mysqli->query($sql);
$resultToken = $mysqli->query($sqlToken);

echo "$email";
echo "<br>";
echo "$action";
echo "<br>";
echo "$code";
echo "<br>";
echo "<br>";

// Display the user data on the page
echo "<table>";
echo "<tr><th>Usário</th><th>Email</th><th>Senha</th></tr>";
while ($row = $result->fetch_assoc()) {
    if (is_null($email)) {
        echo "A variável $email está nula";
    } else {
        echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["email"] . "</td><td>" . $row["senha"] . "</td></tr>";
    }
}

echo "<table>";
echo "<tr><th>Id</th><th>Usário</th><th>Email</th><th>Senha</th></tr>";

// Token
while ($row = $resultToken->fetch_assoc()) {
    $total =count($row["id"])
    //     for($index = 0;$index < count($row["id"]);$index++){
    //     echo "<br>";
    //     echo $arr[$index];
    // }
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["email"] . "</td><td>" . $row["code"] . "</td><td>" . $row["action"] . "</td></tr>";
}
// ************************
// Insert the confirmation code into the database

mysqli_query($mysqli, "INSERT INTO confirmations (`id`, `email`, `code`, `action`) VALUES ('$id','$email', '$code', '$action')");

// // Send the confirmation email
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// $to = $email;
// $from = 'gustavogoncalves@ugb.edu.br';
// $subject = 'Confirm your account changes';
// $message = "Please click the following link to confirm your $action: http://loginphp/pages/confirm.php?code=$code";
// $headers = "From: $from" . "\r\n" .
//     "Reply-To: $email" . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();
// mail($to, $subject, $message, $headers);
// echo "The email message was sent.";

?>