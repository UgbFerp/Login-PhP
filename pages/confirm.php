<?php
include('../pages/login.php');
$sql = "SELECT * FROM users ";
$result = $mysqli->query($sql);
$email = $_POST['email'];
$action = $_POST['action'];
$code = md5(uniqid());
echo "$email";
echo "<br>";
echo "$action";
echo "<br>";
echo "$code";
echo "<br>";

// Display the user data on the page
echo "<table>";
echo "<tr><th>Usário</th><th>Email</th><th>Senha</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["email"] . "</td><td>" . $row["senha"] . "</td></tr>";
}



?>
<h1>Mudar Senha</h1>

<form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="Digite seu email" required>

    <label for="action">Choose an action:</label>
    <select id="action" name="action" required>
        <option value="reset_password">Reset Password</option>
        <option value="change_email">Change Email</option>
    </select>
    <button type="submit">Submit</button>
</form>