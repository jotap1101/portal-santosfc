<?php
require_once("./php/checkout-login.php");
include("./php/connection.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;
$nome = isset($_GET['jogador']) ? $_GET['jogador'] : null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nome . " - Elenco santista" ?></title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style-others.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <?php
    $sql = "SELECT * FROM jogadores WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        $fetch = mysqli_fetch_assoc($result);
        
        $fetchDate = strtotime($fetch['data_nascimento']);
    ?>
        <div class="container px-4">
            <button type="button" class="btn btn-light mt-5"><a href="./elenco.php">Voltar</a></button>
            <div class="main">
                <img src="<?= $fetch['imagem'] ?>" alt="">
                <div class="info-text">
                    <p>Nome: <span class="result"><?= $fetch['nome'] ?></span></p>
                    <p>Data de nascimento: <span class="result"><?= date("d/m/Y", $fetchDate) ?></span></p>
                    <p>Natural de: <span class="result"><?= $fetch['naturalidade'] ?></span></p>
                    <p>Número: <span class="result"><?= $fetch['numero'] ?></span></p>
                    <p>Posicão: <span class="result"><?= $fetch['posicao'] ?></span></p>
                    <p>Jogos: <span class="result"><?= $fetch['jogos'] ?></span></p>
                    <p>Gols: <span class="result"><?= $fetch['gols'] ?></span></p>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo '<p class="lead">Erro!</p>';
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>