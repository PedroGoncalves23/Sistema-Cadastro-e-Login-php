<?php 


// COMANDO SELECT NA TABELA DE DADOS
include_once('conexao.php');
$consulta = "SELECT * FROM dados"; 
    $con = $conexao->query($consulta) or die($mysqli->error);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tutorial</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid">
        <main class="pb-5">
            <h2 style="margin-top: 15px;">DADOS</h2>



            <table class="table mt-4">
                <thead class="thead bg-white">
                    <tr>
                        <th>Temperatura</th>
                        <th>Luminosidade</th>
                        <th>Co²</th>

                    </tr>
                </thead>
                <tbody>

                     <!-- FORM PARA PEGAR O DADO QUE USUARIO DIGITAR-->
                    <form method="post" action="dados.php">
                        Digite a temperatura <input type="text" id="intemp" name="intemp">
                        <input type="submit" value="enviar">
                    </form> 
                    
                    <!-- EXIBIR OS DADOS BANCO -->
                    <?php while($dado = $con->fetch_array()) { ?>
                    <?php
                        // IF PARA COMPARAR SE A TEMEPATURA É MAIOR QUE O VALOR QUE USUARIO DIGITOU
                        if($dado['temp'] >= $_POST['intemp']){ // $_POST['intemp'] PEGA O VALOR QUE USUARIO DIGITOU E COMPARA NO IF
                            echo "<tr>
                            <td> " . $dado['temp'] . "</td>             
                            <td > " . $dado['temp'] . "</td>
                            <td > " . $dado['co2'] . "</td>
                    </tr>";
                        }
                        ?>

                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>