<?php
require_once("./php/checkout-login.php");
require_once("./php/connection.php");

$admin = $_SESSION['id_adm'];

$sqlInnerJoin = "SELECT usuarios.id, dados.nome FROM usuarios INNER JOIN dados ON usuarios.id = dados.id_usuario WHERE usuarios.id = '$admin'";
$resultInnerJoin = mysqli_query($conn, $sqlInnerJoin);
$fetchInnerJoin = mysqli_fetch_assoc($resultInnerJoin);

$fetchName = $fetchInnerJoin['nome'];

if (isset($_POST['submit'])) {
    if (isset($_FILES['file'])) {
        var_dump($_FILES['file']);

        $name = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $type = $_FILES['file']['type'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];

        $folder = "./uploaded-images/jogadores/";
        $archive = uniqid();
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $path = $folder . $archive . "." . $extension;

        $upload = move_uploaded_file($tmp_name, $path);

        if ($upload === true) {
            round(intval($size) / pow(1024, 2));
            intval($error);

            $sql = "INSERT INTO imagem (name, tmp_name, type, size, error, path) VALUES ('$name', '$tmp_name', '$type', '$size', '$error', '$path')";
            $result = mysqli_query($conn, $sql);

            if ($result === true) {
                echo "<script>alert('Arquivo inserido com sucesso');</script>";
            } else {
                echo "<script>alert('Falha ao salvar arquivo');</script>";
            }
        }
    }
}

if (isset($_POST['jogador'])) {
    if (!empty($_POST['nome']) && !empty($_POST['data_nascimento']) && !empty($_POST['naturalidade']) && !empty($_POST['numero']) && !empty($_POST['posicao']) && !empty($_POST['jogos'])) {
        $nomeJogador = mysqli_real_escape_string($conn, trim($_POST['nome']));
        $nascimentoJogador = mysqli_real_escape_string($conn, trim($_POST['data_nascimento']));
        $naturalidadeJogador = mysqli_real_escape_string($conn, trim($_POST['naturalidade']));
        $numeroJogador = intval(mysqli_real_escape_string($conn, trim($_POST['numero'])));
        $posicaoJogador = mysqli_real_escape_string($conn, trim($_POST['posicao']));
        $jogosJogador = intval(mysqli_real_escape_string($conn, trim($_POST['jogos'])));

        $name = $_FILES['imagem']['name'];
        $tmp_name = $_FILES['imagem']['tmp_name'];
        $type = $_FILES['imagem']['type'];
        $size = $_FILES['imagem']['size'];
        $error = $_FILES['imagem']['error'];

        $folder = "uploaded-images/jogadores/";
        $archive = uniqid();
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $path = $folder . $archive . "." . $extension;

        $upload = move_uploaded_file($tmp_name, $path);

        if ($upload === true) {
            $sql = "INSERT INTO jogadores (nome, data_nascimento, naturalidade, numero, posicao, jogos, imagem) VALUES ('$nomeJogador', '$nascimentoJogador', '$naturalidadeJogador', '$numeroJogador', '$posicaoJogador', '$jogosJogador', '$path')";
            $result = mysqli_query($conn, $sql);

            if ($result === true) {
                echo "<script>alert('Jogador cadastrado com sucesso');</script>";
            } else {
                echo "<script>alert('Falha ao cadastrar');</script>";
            }
        }
    }
}

if (isset($_POST['video'])) {
    if (!empty($_POST['link'])) {
        $link = mysqli_real_escape_string($conn, trim($_POST['link']));

        $sql = "INSERT INTO videos (link) VALUE ('$link')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Vídeo cadastrado com sucesso');</script>";
        } else {
            echo "<script>alert('Falha ao cadastrar');</script>";
        }
    }
}

if (isset($_POST['noticia'])) {
    if (!empty($_POST['titulo']) && !empty($_POST['categoria']) && !empty($_POST['texto'])) {
        $titulo = mysqli_real_escape_string($conn, trim($_POST['titulo']));
        $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));
        $texto = mysqli_real_escape_string($conn, trim($_POST['texto']));
        
        $name = $_FILES['imagemNoticia']['name'];
        $tmp_name = $_FILES['imagemNoticia']['tmp_name'];
        $type = $_FILES['imagemNoticia']['type'];
        $size = $_FILES['imagemNoticia']['size'];
        $error = $_FILES['imagemNoticia']['error'];

        $folder = "uploaded-images/noticias/";
        $archive = uniqid();
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $path = $folder . $archive . "." . $extension;

        $upload = move_uploaded_file($tmp_name, $path);

        if ($upload === true) {
            $sql = "INSERT INTO noticias (titulo, categoria, texto, imagem, url_post) VALUES ('$titulo', '$categoria', '$texto', '$path', 'NULL')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Notícia cadastrada com sucesso!');</script>";
            } else {
                echo "<script>alert('Falha ao cadastrar!');</script>";
            }
        }
    }
}

if (isset($_POST['conquista'])) {
    if (!empty($_POST['campeonato']) && !empty($_POST['data'])) {
        $nomeCampeonato = mysqli_real_escape_string($conn, trim($_POST['campeonato']));
        $dataTitulo = mysqli_real_escape_string($conn, trim($_POST['data']));
        
        $name = $_FILES['imagemTrofeu']['name'];
        $tmp_name = $_FILES['imagemTrofeu']['tmp_name'];
        $type = $_FILES['imagemTrofeu']['type'];
        $size = $_FILES['imagemTrofeu']['size'];
        $error = $_FILES['imagemTrofeu']['error'];

        $folder = "uploaded-images/conquistas/";
        $archive = uniqid();
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $path = $folder . $archive . "." . $extension;

        $upload = move_uploaded_file($tmp_name, $path);

        if ($upload) {
            $sql = "INSERT INTO conquistas (imagem_trofeu, nome_campeonato, data) VALUES ('$path', '$nomeCampeonato', '$dataTitulo')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>alert('Conquista cadastrada com sucesso!');</script>";
            } else {
                echo "<script>alert('Falha ao cadastrar!');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="p-5">
    <?php
    echo "Nome: " . $_SESSION['name_adm'];
    echo nl2br("\n");
    echo "Email: " . $_SESSION['email_adm'];
    echo nl2br("\n");
    echo "Tipo: " . $_SESSION['type_user'];
    echo nl2br("\n\n\n");

    echo '<a href="./php/logout.php">Sair</a>';

    echo nl2br("\n\n\n");
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="link" id="" placeholder="link do vídeo">
        <br><br>
        <input type="submit" value="Salvar" name="video">
    </form>

    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="nome" id="" placeholder="nome do jogador">
        <br><br>
        <input type="date" name="data_nascimento" id="">
        <br><br>
        <input type="text" name="naturalidade" id="" placeholder="natural de">
        <br><br>
        <input type="number" name="numero" id="" placeholder="numero">
        <br><br>
        <input type="text" name="posicao" id="" placeholder="posicao">
        <br><br>
        <input type="number" name="jogos" id="" placeholder="jogos">
        <br><br>
        <input type="number" name="gols" id="" placeholder="gols">
        <br><br>
        <input type="file" name="imagem" id="" placeholder="imagem">
        <br><br><br><br>
        <input type="submit" value="Cadastrar jogador" name="jogador">
    </form>
    <br><br>

    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="titulo" id="" placeholder="titulo da notícia">
        <br><br>
        <input type="text" name="categoria" id="" placeholder="categoria da notícia">
        <br><br>
        <textarea name="texto" id="" cols="30" rows="10" placeholder="texto da notícia"></textarea>
        <br><br>
        <input type="file" name="imagemNoticia" id="" placeholder="imagem">
        <br><br>
        
        <input type="submit" value="Cadastrar notícia" name="noticia">
    </form>
    <br><br>

    <hr>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="imagemTrofeu" id="" placeholder="Imagem do troféu">
        <br><br>
        <input type="text" name="campeonato" id="" placeholder="nome do campeonato">
        <br><br>
        <input type="text" name="data" placeholder="data de campeão"></input>
        <br><br>
        
        <input type="submit" value="Cadastrar conquista" name="conquista">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>