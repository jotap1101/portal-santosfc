<?php
require_once("./php/checkout-login.php");
require_once("./php/connection.php");

date_default_timezone_set('America/Sao_Paulo');

$id = (!isset($_GET['id']) ? NULL : $_GET['id']);

if (isset($_POST['atualizar-jogador'])) {
    $nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $dataNascimento = mysqli_real_escape_string($conn, trim($_POST['data_nascimento']));
    $naturalidade = mysqli_real_escape_string($conn, trim($_POST['naturalidade']));
    $numero = intval(mysqli_real_escape_string($conn, trim($_POST['numero'])));
    $jogos = intval(mysqli_real_escape_string($conn, trim($_POST['jogos'])));
    $gols = intval(mysqli_real_escape_string($conn, trim($_POST['gols'])));
    $posicao = mysqli_real_escape_string($conn, trim($_POST['posicao']));

    $sql = "UPDATE jogadores SET nome = '$nome', data_nascimento = '$dataNascimento', naturalidade = '$naturalidade', numero = '$numero', posicao = '$posicao', jogos = '$jogos', gols = '$gols' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
                alert("Jogador atualizado com sucesso!");
                setTimeout(function() {
                    window.location.href = "admin-jogadores.php?update=success";
                }, 100);
            </script>';
    } else {
        echo '<script>
                alert("Erro ao atualizar!");
                setTimeout(function() {
                    window.location.href = "admin-jogadores.php?update=error";
                }, 100);
            </script>';
    }
}

if (isset($_POST['atualizar-noticia'])) {
    $titulo = mysqli_real_escape_string($conn, trim($_POST['titulo']));
    $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));
    $texto = mysqli_real_escape_string($conn, trim($_POST['texto']));

    $hasImage = (isset($_FILES['update-imagem-noticia']['name'])) ? $_FILES['update-imagem-noticia']['name'] : "";

    if ($hasImage) {
        $updateImageName = $_FILES['update-imagem-noticia']['name'];
        $updateImageSize = $_FILES['update-imagem-noticia']['size'];
        $updateImageType = $_FILES['update-imagem-noticia']['type'];
        $updateImageError = $_FILES['update-imagem-noticia']['error'];
        $updateImageTmpName = $_FILES['update-imagem-noticia']['tmp_name'];

        $folder = './uploaded-images/noticias/';
        $archive = uniqid();
        $extension = strtolower(pathinfo($updateImageName, PATHINFO_EXTENSION));
        $newArchive = $arquive . $extension;
        $path = $folder . $archive . "." . $extension;

        move_uploaded_file($updateImageTmpName, $path);

        $dateTime = date("Y-m-d H:i:s");

        $sql = "UPDATE noticias SET titulo = '$titulo', categoria = '$categoria', texto = '$texto', imagem = '$path', data_atualizacao = '$dateTime' WHERE id = '$id'";
    } else {
        $dateTime = date("Y-m-d H:i:s");

        $sql = "UPDATE noticias SET titulo = '$titulo', categoria = '$categoria', texto = '$texto', data_atualizacao = '$dateTime' WHERE id = '$id'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
                alert("Notícia atualizada com sucesso!");
                setTimeout(function() {
                    window.location.href = "admin-noticias.php?update=success";
                }, 100);
            </script>';
    } else {
        echo '<script>
                alert("Erro ao atualizar!");
                setTimeout(function() {
                    window.location.href = "admin-noticias.php?update=error";
                }, 100);
            </script>';
    }
}

if (isset($_POST['atualizar-video'])) {
    $link = mysqli_real_escape_string($conn, trim($_POST['link']));

    $sql = "UPDATE videos SET link = '$link' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
                alert("Vídeo atualizado com sucesso!");
                setTimeout(function() {
                    window.location.href = "admin-videos.php?update=success";
                }, 100);
            </script>';
    } else {
        echo '<script>
                alert("Erro ao atualizar!");
                setTimeout(function() {
                    window.location.href = "admin-videos.php?update=error";
                }, 100);
            </script>';
    }
}

if (isset($_POST['atualizar-conquista'])) {
    $campeonato = mysqli_real_escape_string($conn, trim($_POST['campeonato']));
    $data = mysqli_real_escape_string($conn, trim($_POST['data']));

    $hasImage = (isset($_FILES['update-imagem-trofeu']['name'])) ? $_FILES['update-imagem-trofeu']['name'] : "";

    if ($hasImage) {
        $updateImageName = $_FILES['update-imagem-trofeu']['name'];
        $updateImageSize = $_FILES['update-imagem-trofeu']['size'];
        $updateImageType = $_FILES['update-imagem-trofeu']['type'];
        $updateImageError = $_FILES['update-imagem-trofeu']['error'];
        $updateImageTmpName = $_FILES['update-imagem-trofeu']['tmp_name'];

        $folder = './uploaded-images/conquistas/';
        $archive = uniqid();
        $extension = strtolower(pathinfo($updateImageName, PATHINFO_EXTENSION));
        $newArchive = $arquive . $extension;
        $path = $folder . $archive . "." . $extension;

        move_uploaded_file($updateImageTmpName, $path);

        $sql = "UPDATE conquistas SET imagem_trofeu = '$path', nome_campeonato = '$campeonato', data = '$data' WHERE id = '$id'";
    } else {
        $sql = "UPDATE conquistas SET nome_campeonato = '$campeonato', data = '$data' WHERE id = '$id'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
                alert("Conquista atualizada com sucesso!");
                setTimeout(function() {
                    window.location.href = "admin-conquistas.php?update=success";
                }, 100);
            </script>';
    } else {
        echo '<script>
                alert("Erro ao atualizar!");
                setTimeout(function() {
                    window.location.href = "admin-conquistas.php?update=error";
                }, 100);
            </script>';
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogador</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        if ($_GET['page'] == "jogador") {
            $id = (!isset($_GET['id']) ? NULL : $_GET['id']);

            $sql = "SELECT * FROM jogadores WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            $fetch = mysqli_fetch_assoc($result);
        ?>
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="<?= $fetch['imagem'] ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 mt-3 mb-3 mb-md-0">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Jogador
                                <a href="./admin-jogadores.php" class="btn btn-danger float-end">Voltar</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div id="errorMessage" class="alert alert-warning d-none"></div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nome do jogador</label>
                                    <input type="text" class="form-control" name="nome" value="<?= $fetch['nome'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Data de nascimento</label>
                                    <input type="date" name="data_nascimento" class="form-control" value="<?= $fetch['data_nascimento'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Naturalidade</label>
                                    <input type="text" name="naturalidade" class="form-control" value="<?= $fetch['naturalidade'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Número da camisa</label>
                                    <input type="number" name="numero" class="form-control" value="<?= $fetch['numero'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Número de jogos</label>
                                    <input type="number" name="jogos" class="form-control" value="<?= $fetch['jogos'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Número de gols</label>
                                    <input type="number" name="gols" class="form-control" value="<?= $fetch['gols'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Posição</label>
                                    <input type="text" name="posicao" class="form-control" value="<?= $fetch['posicao'] ?>">
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="atualizar-jogador" class="btn btn-primary">
                                        Atualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else if ($_GET['page'] == "conquista") {
            $id = (!isset($_GET['id']) ? NULL : $_GET['id']);

            $sql = "SELECT * FROM conquistas WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            $fetch = mysqli_fetch_assoc($result);
        ?>
            <div class="row mt-5">
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="<?= $fetch['imagem_trofeu'] ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 my-3 my-md-0">
                <div class="card">
                        <div class="card-header">
                            <h4>Editar Conquista
                                <a href="./admin-conquistas.php" class="btn btn-danger float-end">Voltar</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div id="errorMessage" class="alert alert-warning d-none"></div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nome do campeonato</label>
                                    <input type="text" name="campeonato" class="form-control" value="<?= $fetch['nome_campeonato'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Data(s) da conquista</label>
                                    <input type="text" name="data" class="form-control" value="<?= $fetch['data'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Imagem</label>
                                    <input class="form-control form-control-sm" type="file" name="update-imagem-trofeu">
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="atualizar-conquista" class="btn btn-primary">
                                        Atualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else if ($_GET['page'] == "video") {
            $id = (!isset($_GET['id']) ? NULL : $_GET['id']);

            $sql = "SELECT * FROM videos WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            $fetch = mysqli_fetch_assoc($result);
        ?>
            <div class="row mt-5">
                <div class="col-md-6">
                    <iframe class="w-100" height="315" src="<?= $fetch['link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Vídeos
                                <a href="./admin-videos.php" class="btn btn-danger float-end">Voltar</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div id="errorMessage" class="alert alert-warning d-none"></div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Posição</label>
                                    <input type="text" name="link" class="form-control" value="<?= $fetch['link'] ?>">
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="atualizar-video" class="btn btn-primary">
                                        Atualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else if ($_GET['page'] == "noticia") {
            $id = (!isset($_GET['id']) ? NULL : $_GET['id']);

            $sql = "SELECT * FROM noticias WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);

            $fetch = mysqli_fetch_assoc($result);
            $data_post = new DateTime($fetch['data_post']);
        ?>
            <div class="row my-3">
                <div class="col-md-6 col-lg-7">
                    <div class="card mb-3">
                        <img src="<?= $fetch['imagem'] ?>" class="card-img-top imf-fluid" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?= $fetch['titulo'] ?></h5>
                            <p class="card-text">Categoria: <strong><?= $fetch['categoria'] ?></strong></p>
                            <p class="lead"><?= $fetch['texto'] ?></p>
                        </div>
                        <div class="card-footer text-muted">
                            Postado em <?= $data_post->format('d/m/Y') . " às " . $data_post->format('H:i') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Notícia
                                <a href="./admin-noticias.php" class="btn btn-danger float-end">Voltar</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div id="errorMessage" class="alert alert-warning d-none"></div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Título da notícia</label>
                                    <input type="text" class="form-control" name="titulo" value="<?= $fetch['titulo'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Categoria da notícia</label>
                                    <input type="text" name="categoria" class="form-control" value="<?= $fetch['categoria'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Texto da notícia</label>
                                    <textarea name="texto" id="" class="form-control"><?= $fetch['texto'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Imagem</label>
                                    <input class="form-control form-control-sm" type="file" name="update-imagem-noticia">
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="atualizar-noticia" class="btn btn-primary">
                                        Atualizar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>