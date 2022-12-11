<?php
    session_start();
    include_once('conexao.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }

    include_once('conexao.php');
    $consulta = "SELECT * FROM dados"; 
    $con = $conexao->query($consulta) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
            <h2 style="margin-top: 15px;">Dados</h2>
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
                    <form method="post" action="home.php">
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

    <div class="container"></div>
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

            <script>
            var ctx = document.getElementById("myChart").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: [
                        "Segunda-Feira",
                        "Terça-Feira",
                        "Quarta-Feira",
                        "Quinta-Feira",
                        "Sexta-Feira",
                        "Sabado",
                        "Domingo",
                    ],

                 
                    

                    datasets: [{
                            label: "Luminosidade",
                            data: [10, 3, 6, 9, 7, 1, 2],
                            backgroundColor: "rgba(173,232,244,0.5)",
                        },
                        {
                            label: "Umidade",
                            data: [2, 2, 5, 5, 2, 1, 10],
                            backgroundColor: "rgba(2,62,138,0.7)",
                        },
                        {
                            label: "Temperatura",
                            data: [10, 12, 15, 11, 13, 14, 10],
                            backgroundColor: "rgba(226, 149, 120, 0.5)",
                        },
                        {
                            label: "Nivel Co²",
                            data: [5, 10, 8, 4, 8, 7, 5],
                            backgroundColor: "rgba(175, 252, 65, 0.8)",
                        },
                    ],
                },
            });
            </script>
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