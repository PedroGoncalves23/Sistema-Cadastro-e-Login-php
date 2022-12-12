<?php
    session_start();
    
        include_once('conexao.php');
        
        $consulta = "SELECT * FROM pesq  order by id desc"; 
          $con = $conexao->query($consulta) or die($mysqli->error);

   
?>