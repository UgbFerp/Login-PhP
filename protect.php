<?php
    if(!isset($_SESSION)){
        session_start();
    };

    if(!isset($_SESSION['id'])){
        header("Location: index.php");
        die("você não pode acessar essa página porque não está logado");
    }
?>