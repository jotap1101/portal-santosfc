<?php
require_once("./php/connection.php");

if (isset($_POST['adicionar_jogador'])) {
    $nomeJogador = mysqli_real_escape_string($conn, trim($_POST['nome']));
    $nascimentoJogador = mysqli_real_escape_string($conn, trim($_POST['data_nascimento']));
    $cidadeJogador = mysqli_real_escape_string($conn, trim($_POST['cidade']));
    $estadoJogador = mysqli_real_escape_string($conn, trim($_POST['estado']));
    $numeroJogador = intval(mysqli_real_escape_string($conn, trim($_POST['numero'])));
    $posicaoJogador = mysqli_real_escape_string($conn, trim($_POST['posicao']));
    $jogosJogador = intval(mysqli_real_escape_string($conn, trim($_POST['jogos'])));
    $golsJogador = intval(mysqli_real_escape_string($conn, trim($_POST['gols'])));

    if ($nomeJogador == NULL || $nascimentoJogador == NULL || $cidadeJogador == NULL || $estadoJogador == NULL || $numeroJogador == NULL || $posicaoJogador == NULL || $jogosJogador == NULL || $golsJogador == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Preencha todos os campos'
        ];
        echo json_encode($res);
        return;
    }

    if ($estadoJogador == "outro") {
        $naturalidadeJogador = "";
    } else {
        $naturalidadeJogador = $cidadeJogador . " (" . $estadoJogador . ")";
    }

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

    if ($upload) {
        $sql = "INSERT INTO jogadores (nome, data_nascimento, naturalidade, numero, posicao, jogos, gols, imagem) VALUES ('$nomeJogador', '$nascimentoJogador', '$naturalidadeJogador', '$numeroJogador', '$posicaoJogador', '$jogosJogador', '$golsJogador', '$path')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $res = [
                'status' => 200,
                'message' => 'Jogador cadastrado com sucesso!'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Erro ao cadastrar jogador!'
            ];
            echo json_encode($res);
            return;
        }
    }
}

if (isset($_POST['excluir_jogador'])) {
    $id = intval(mysqli_real_escape_string($conn, $_POST['idJogador']));

    $sql = "DELETE FROM jogadores WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Jogador excluído com sucesso'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Erro ao excluir'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['idJogador'])) {
    $id = intval(mysqli_real_escape_string($conn, trim($_GET['idJogador'])));

    $sql = "SELECT * FROM jogadores WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $fetch = mysqli_fetch_array($result);

        $res = [
            'status' => 200,
            'message' => 'Busca de jogador por ID com sucesso!',
            'data' => $fetch
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Jogador não encontrado!'
        ];
        echo json_encode($res);
        return;
    }
}

// -------------------------------------------------------------

if (isset($_POST['adicionar_noticia'])) {
    $titulo = mysqli_real_escape_string($conn, trim($_POST['titulo']));
    $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));
    $texto = mysqli_real_escape_string($conn, trim($_POST['texto']));

    if ($titulo == NULL || $categoria == NULL || $texto == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Preencha todos os campos'
        ];
        echo json_encode($res);
        return;
    }

    $name = $_FILES['imagem-noticia']['name'];
    $tmp_name = $_FILES['imagem-noticia']['tmp_name'];
    $type = $_FILES['imagem-noticia']['type'];
    $size = $_FILES['imagem-noticia']['size'];
    $error = $_FILES['imagem-noticia']['error'];

    $folder = "uploaded-images/noticias/";
    $archive = uniqid();
    $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $path = $folder . $archive . "." . $extension;

    $upload = move_uploaded_file($tmp_name, $path);

    if ($upload) {
        $sql = "INSERT INTO noticias (titulo, categoria, texto, imagem) VALUES ('$titulo', '$categoria', '$texto', '$path')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $res = [
                'status' => 200,
                'message' => 'Notícia registrada com sucesso!'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Erro ao registrar notícia!'
            ];
            echo json_encode($res);
            return;
        }
    }
}

if (isset($_POST['excluir_noticia'])) {
    $id = intval(mysqli_real_escape_string($conn, $_POST['idNoticia']));

    $sql = "DELETE FROM noticias WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Notícia excluída com sucesso'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Erro ao excluir'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['idNoticia'])) {
    $id = intval(mysqli_real_escape_string($conn, trim($_GET['idNoticia'])));

    $sql = "SELECT * FROM noticias WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $fetch = mysqli_fetch_array($result);

        $res = [
            'status' => 200,
            'message' => 'Busca de notícia por ID com sucesso!',
            'data' => $fetch
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Notícia não encontrada!'
        ];
        echo json_encode($res);
        return;
    }
}

// ----------------------------------------------------------------------

if (isset($_POST['adicionar_video'])) {
    $link = mysqli_real_escape_string($conn, trim($_POST['link']));

    if ($link == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Preencha todos os campos'
        ];
        echo json_encode($res);
        return;
    }

    $sql = "INSERT INTO videos (link) VALUE ('$link')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Vídeo inserido com sucesso!'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Erro ao inserir vídeo!'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['excluir_video'])) {
    $id = intval(mysqli_real_escape_string($conn, $_POST['idVideo']));

    $sql = "DELETE FROM videos WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Vídeo excluído com sucesso'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Erro ao excluir'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['idVideo'])) {
    $id = intval(mysqli_real_escape_string($conn, trim($_GET['idVideo'])));

    $sql = "SELECT * FROM videos WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $fetch = mysqli_fetch_array($result);

        $res = [
            'status' => 200,
            'message' => 'Busca de vídeo por ID com sucesso!',
            'data' => $fetch
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Vídeo não encontrado!'
        ];
        echo json_encode($res);
        return;
    }
}

// --------------------------------------------------------------------------------------

if (isset($_POST['adicionar_conquista'])) {
    $nomeCampeonato = mysqli_real_escape_string($conn, trim($_POST['campeonato']));
    $dataTitulo = mysqli_real_escape_string($conn, trim($_POST['data']));

    if ($nomeCampeonato == NULL || $dataTitulo == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Preencha todos os campos'
        ];
        echo json_encode($res);
        return;
    }

    $name = $_FILES['imagem-trofeu']['name'];
    $tmp_name = $_FILES['imagem-trofeu']['tmp_name'];
    $type = $_FILES['imagem-trofeu']['type'];
    $size = $_FILES['imagem-trofeu']['size'];
    $error = $_FILES['imagem-trofeu']['error'];

    $folder = "uploaded-images/conquistas/";
    $archive = uniqid();
    $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $path = $folder . $archive . "." . $extension;

    $upload = move_uploaded_file($tmp_name, $path);

    if ($upload) {
        $sql = "INSERT INTO conquistas (imagem_trofeu, nome_campeonato, data) VALUES ('$path', '$nomeCampeonato', '$dataTitulo')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $res = [
                'status' => 200,
                'message' => 'Conquista adicionada com sucesso!'
            ];
            echo json_encode($res);
            return;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Erro ao adicionar conquista!'
            ];
            echo json_encode($res);
            return;
        }
    }
}

if (isset($_POST['excluir_conquista'])) {
    $id = intval(mysqli_real_escape_string($conn, $_POST['idConquista']));

    $sql = "DELETE FROM conquistas WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Conquista excluída com sucesso'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Erro ao excluir'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['idConquista'])) {
    $id = intval(mysqli_real_escape_string($conn, trim($_GET['idConquista'])));

    $sql = "SELECT * FROM conquistas WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $fetch = mysqli_fetch_array($result);

        $res = [
            'status' => 200,
            'message' => 'Busca de conquista por ID com sucesso!',
            'data' => $fetch
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Conquista não encontrada!'
        ];
        echo json_encode($res);
        return;
    }
}
