<?php




?>
<h1>Mudar Senha</h1>

<form action="reset_password.php" method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" placeholder="Digite seu email" required>

    <label for="action">Choose an action:</label>
    <select id="action" name="action" required>
        <option value="reset_password">Reset Password</option>
        <option value="change_email">Change Email</option>
    </select>

    <button type="submit">Submit</button>
</form>