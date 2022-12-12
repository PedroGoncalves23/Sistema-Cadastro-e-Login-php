<?php

    session_start();
    error_reporting(0);
    include_once('conexao.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }

    include_once('conexao.php');
    $consulta = "SELECT * FROM dados order by id desc"; 
    $con = $conexao->query($consulta) or die($mysqli->error);

    $consulta3 = "SELECT * FROM dados order by id desc"; 
    $con3 = $conexao->query($consulta3) or die($mysqli->error);

    
    $consulta2 = "SELECT * FROM pesq  order by id desc"; 
    $con2 = $conexao->query($consulta2) or die($mysqli->error);

    $consulta4 = "SELECT * FROM pesq  order by id desc"; 
    $con4 = $conexao->query($consulta4) or die($mysqli->error);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="60">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Estufa Smart</title>
</head>

<body class="body_home">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Estufa Smart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>

    <div class="container-fluid">
        <main class="pb-5">
            <h2 style="margin-top: 15px;">Criar notificação</h2>
            <table class="table mt-4">
                <thead class="thead bg-white">
                    <tr>
                        <th>Temperatura sensor</th>
                        <th>Luminosidade sensor</th>
                        <th>Co² sensor</th>

                    </tr>
                    
                </thead>
                <tbody>

                    <!-- FORM PARA PEGAR O DADO QUE USUARIO DIGITAR-->

                    <form method="post" action="teste2.php">
                        Digite a temperatura <input type="calendario" id="temp" name="temp" value=""> <hr>
                        Digite a Luminosidade <input type="calendario" id="luminosidade" name="luminosidade" value=""> <hr>
                        Digite o nível de CO² <input type="calendario" id="co2" name="co2" value=""> <hr>
                        <button><input type="submit" value="enviar" id="submit" name="submit"></button>
                    </form>

                    <?php
                        $dado = $con->fetch_array();
                        $dado2 = $con2->fetch_array();

                        if($dado['temp'] >= $dado2['temp'] && $dado['lumi'] >= $dado2['luminosidade'] && $dado['co2'] >= $dado2['co2'] ){
                            $para = "mcpelok@gmail.com";
                            $assunto = "ATENÇÃO TEMPERATURA ALTA!!!";
                            $corpo = "Ultimas temperaturas" . $dado['temp'];
                            $headers = "From:p.goncalves@aluno.ifsp.edu.br";
                      if (mail($para, $assunto, $corpo, $headers))
                      {
                          echo "Aviso enviado!!!";
                      }
                         }
                        else {
                            echo "NÃO ENVIADO" . '<br>';
                        }
                         
                    ?>


                    <?php
                    if(isset($_POST['submit'])){
                        include_once('conexao.php');
                        $temp = $_POST['temp'];
                        $luminosidade = $_POST['luminosidade'];
                        $co2 = $_POST['co2'];
                        $result = mysqli_query($conexao, "INSERT INTO pesq(temp,luminosidade,co2) VALUES ('$temp','$luminosidade','$co2')");
                    }
                    ?>
                 
                 <?php
                                        $dado = $con3->fetch_array();

                   echo "<tr>
                            <td> " . $dado['temp'] . "</td>             
                            <td > " . $dado['lumi'] . "</td>
                            <td > " . $dado['co2'] . "</td>
                    </tr>";

                    ?>
                </tbody>
            </table>

            <table class="table mt-4">
                <thead class="thead bg-white">
                    <tr>
                        <th>Temperatura Filtro</th>
                        <th>Luminosidade Filtro</th>
                        <th>Co² Filtro</th>

                    </tr>
                    
                </thead>
                <tbody>

                <?php
                        $dado4 = $con4->fetch_array();

                   echo "<tr>
                            <td> " . $dado4['temp'] . "</td>             
                            <td > " . $dado4['luminosidade'] . "</td>
                            <td > " . $dado4['co2'] . "</td>
                    </tr>";

                    ?>
                  
                 
                </tbody>
            </table>
            
        </main>
        
    </div>

    <div class="container">
        
    </div>
    <!-- <main>
    <p>Main</p>
  </main> -->
    <header>

        <div class="container text-center">
            <div class="row">
                <div class="col align-self-center">
                    <h2>Monitoramento</h2>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
                    type="text/javascript">
                </script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>


            <!-- <div class="col-5">
          <p class="titulo">Projeto - Estufa Inteligente</p>
          <img src="greenhouse 1.png" alt="" widht="80px" height="100px">
        </div> -->
        </div>
        </div>



    </header>
    <!-- <nav>
    <p>Nav</p>
  </nav> -->

</body>

</html>