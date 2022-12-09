<?php
    session_start();
    if(isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['senha']))
    {
        include_once('conexao.php');
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE login = '$login' and senha = '$senha'";
        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['login'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: home.php');
        }
    }
    else
    {
        header('Location: login.php');
    }
?>