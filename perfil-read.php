<?php
    require_once("./php/connection.php");

    $user = $_SESSION['id'];

    $sqlInnerJoin = "SELECT * FROM usuarios INNER JOIN dados ON usuarios.id = dados.id_usuario INNER JOIN redes_sociais ON usuarios.id = redes_sociais.id_usuario INNER JOIN log ON usuarios.id = log.id_usuario WHERE usuarios.id = '$user' AND dados.id_usuario = '$user' AND redes_sociais.id_usuario = '$user' AND log.id_usuario = '$user'";
    $resultInnerJoin = mysqli_query($conn, $sqlInnerJoin);
    $rows = mysqli_num_rows($resultInnerJoin);
    
    if ($rows > 0) {
        $fetchInnerJoin = mysqli_fetch_assoc($resultInnerJoin);
    
        $fetchName = $fetchInnerJoin['nome'];
        $fetchSurname = $fetchInnerJoin['sobrenome'];
        $fetchImage = $fetchInnerJoin['imagem'];
        $fetchDate = $fetchInnerJoin['data_nascimento'];
        $fetchCpf = $fetchInnerJoin['cpf'];
        $fetchEmail = $fetchInnerJoin['email'];
        $fetchPhone = $fetchInnerJoin['telefone'];
        $fetchAddress = $fetchInnerJoin['endereco'];
        $fetchNumber = $fetchInnerJoin['numero'];
        $fetchNeighborhood = $fetchInnerJoin['bairro'];
        $fetchCity = $fetchInnerJoin['cidade'];
        $fetchState = $fetchInnerJoin['estado'];
        $fetchZipCode = $fetchInnerJoin['cep'];
        $fetchEndereco = $fetchAddress . ", n° " . strval($fetchNumber) . ", " . $fetchNeighborhood . ", " . $fetchCity . " - " . $fetchState . " (" . strval($fetchZipCode) . ")";

        $fetchGithub = $fetchInnerJoin['github_link'];
        $fetchTwitter = $fetchInnerJoin['twitter_link'];
        $fetchInstagram = $fetchInnerJoin['instagram_link'];
        $fetchFacebook = $fetchInnerJoin['facebook_link'];
    }
?>