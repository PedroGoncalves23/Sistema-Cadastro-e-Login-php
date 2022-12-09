<?php 

include_once('conexao.php');
$consulta = "SELECT * FROM usuarios"; 
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
            <h2 style="margin-top: 15px;">FEIRAS</h2>



            <table class="table mt-4">
                <thead class="thead bg-white">
                    <tr>
                        <th>Login</th>
                        <th>Senha</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- CONTEÚDO DA TABELA -->
                    <?php while($dado = $con->fetch_array()) { ?>
                    <tr>
                        <td class="align-middle"><?php echo $dado['login']; ?></td>
                        <td class="align-middle"><?php echo $dado['senha']; ?></td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>