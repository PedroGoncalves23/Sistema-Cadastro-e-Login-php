<?php
    session_start();
    
        include_once('conexao.php');
        

        $sql = "SELECT * FROM dados";
        $result = $conexao->query($sql);

   
?>