<?php
    include('../pages/login.php');
    $sqlToken = "SELECT * FROM confirmations ";
    $resultToken = $mysqli->query($sqlToken);
    $arrid = 0;
    // Display the user data on the page
    echo "<table>";
    echo "<tr><th>id</th><th>Email</th><th>code</th></tr>";
    while ($row = $resultToken->fetch_assoc()) {
        foreach ($row as $chave => $valor) {
            if ($chave == "id") {
                $arrid +=  1;
            }
        }

        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["email"] . "</td><td>" . $row["code"] . "</td><td>" . $row["action"] . "</td></tr>";
    }

?>