<?php
require_once("./php/connection.php");
require_once("./php/checkout-login.php");
require_once("./perfil-read.php");

date_default_timezone_set('America/Sao_Paulo');

$id = (!isset($_GET['id']) ? NULL : $_GET['id']);

if (isset($_POST['update'])) {
    $updateName = mysqli_real_escape_string($conn, trim($_POST['update-nome']));
    $updateSurname = mysqli_real_escape_string($conn, trim($_POST['update-sobrenome']));
    $updateImage = $_FILES['update-imagem'];
    $updateDate = mysqli_real_escape_string($conn, trim($_POST['update-data']));
    $updateCpf = intval(mysqli_real_escape_string($conn, trim($_POST['update-cpf'])));
    $updateEmail = mysqli_real_escape_string($conn, trim($_POST['update-email']));
    $updatePhone = intval(mysqli_real_escape_string($conn, trim($_POST['update-telefone'])));
    $updateAddress = mysqli_real_escape_string($conn, trim($_POST['update-endereco']));
    $updateNeighborhood = mysqli_real_escape_string($conn, trim($_POST['update-bairro']));
    $updateNumber = intval(mysqli_real_escape_string($conn, trim($_POST['update-numero'])));
    $updateCity = mysqli_real_escape_string($conn, trim($_POST['update-cidade']));
    $updateState = mysqli_real_escape_string($conn, trim($_POST['update-estado']));
    $updateZipCode = intval(mysqli_real_escape_string($conn, trim($_POST['update-cep'])));
    $updateGithubLink = mysqli_real_escape_string($conn, trim($_POST['update-github']));
    $updateTwitterLink = mysqli_real_escape_string($conn, trim($_POST['update-twitter']));
    $updateInstagramLink = mysqli_real_escape_string($conn, trim($_POST['update-instagram']));
    $updateFacebookLink = mysqli_real_escape_string($conn, trim($_POST['update-facebook']));

    $hasImage = (isset($_FILES['update-imagem']['name'])) ? $_FILES['update-imagem']['name'] : "";

    if ($hasImage) {
        $updateImageName = $_FILES['update-imagem']['name'];
        $updateImageSize = $_FILES['update-imagem']['size'];
        $updateImageType = $_FILES['update-imagem']['type'];
        $updateImageError = $_FILES['update-imagem']['error'];
        $updateImageTmpName = $_FILES['update-imagem']['tmp_name'];

        $folder = './uploaded-images/usuarios/';
        $archive = uniqid();
        $extension = strtolower(pathinfo($updateImageName, PATHINFO_EXTENSION));
        $newArchive = $arquive . $extension;
        $path = $folder . $archive . "." . $extension;

        move_uploaded_file($updateImageTmpName, $path);

        $dateTime = date("Y-m-d H:i:s");

        $sql = "UPDATE usuarios INNER JOIN dados ON usuarios.id = dados.id_usuario INNER JOIN redes_sociais ON usuarios.id = redes_sociais.id_usuario INNER JOIN log ON usuarios.id = log.id_usuario SET usuarios.email = '$updateEmail', dados.nome = '$updateName', dados.sobrenome = '$updateSurname', dados.imagem = '$path', dados.data_nascimento = '$updateDate', dados.cpf = '$updateCpf', dados.telefone = '$updatePhone', dados.endereco = '$updateAddress', dados.numero = '$updateNumber', dados.bairro = '$updateNeighborhood', dados.cidade = '$updateCity', dados.estado = '$updateState', dados.cep = '$updateZipCode', redes_sociais.github_link = '$updateGithubLink', redes_sociais.twitter_link = '$updateTwitterLink', redes_sociais.instagram_link = '$updateInstagramLink', redes_sociais.facebook_link = '$updateFacebookLink', log.data_atualizacao = '$dateTime' WHERE usuarios.id = '$id' AND dados.id_usuario = '$id' AND redes_sociais.id_usuario = '$id' AND log.id_usuario = '$id'";
    } else {
        $dateTime = date("Y-m-d H:i:s");

        $sql = "UPDATE usuarios INNER JOIN dados ON usuarios.id = dados.id_usuario INNER JOIN redes_sociais ON usuarios.id = redes_sociais.id_usuario INNER JOIN log ON usuarios.id = log.id_usuario SET usuarios.email = '$updateEmail', dados.nome = '$updateName', dados.sobrenome = '$updateSurname', dados.data_nascimento = '$updateDate', dados.cpf = '$updateCpf', dados.telefone = '$updatePhone', dados.endereco = '$updateAddress', dados.numero = '$updateNumber', dados.bairro = '$updateNeighborhood', dados.cidade = '$updateCity', dados.estado = '$updateState', dados.cep = '$updateZipCode', redes_sociais.github_link = '$updateGithubLink', redes_sociais.twitter_link = '$updateTwitterLink', redes_sociais.instagram_link = '$updateInstagramLink', redes_sociais.facebook_link = '$updateFacebookLink', log.data_atualizacao = '$dateTime' WHERE usuarios.id = '$id' AND dados.id_usuario = '$id' AND redes_sociais.id_usuario = '$id' AND log.id_usuario = '$id'";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_POST['update-nome'] = "";
        $_POST['update-sobrenome'] = "";
        $_FILES['update-imagem'] = "";
        $_POST['update-data'] = "";
        $_POST['update-cpf'] = "";
        $_POST['update-email'] = "";
        $_POST['update-telefone'] = "";
        $_POST['update-endereco'] = "";
        $_POST['update-bairro'] = "";
        $_POST['update-numero'] = "";
        $_POST['update-cidade'] = "";
        $_POST['update-estado'] = "";
        $_POST['update-cep'] = "";
        // $_POST['update-github'] = "";
        // $_POST['update-twitter'] = "";
        // $_POST['update-instagram'] = "";
        // $_POST['update-facebook'] = "";

        echo '<script>
                    alert("Dados atualizados com sucesso!");
                    setTimeout(function() {
                        window.location.href = "perfil.php?update=success";
                    }, 100);
                </script>';
    } else {
        echo '<script>
                alert("Erro ao atualizar!");
                setTimeout(function() {
                    window.location.href = "perfil.php?update=error";
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
    <title><?= $fetchName . " " . $fetchSurname ?> - Perfil</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style-profile.css">
    <link rel="stylesheet" href="./css/style-navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
    <?php
    include("./includes/header.php");
    ?>
    <main class="pt-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="./perfil.php">Perfil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Atualizar perfil</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <?php
                            if ($fetchImage === '' || $fetchImage === NULL) {
                            ?>
                                <img src="./img/default-avatar.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
                            <?php
                            } else {
                            ?>
                                <img src="<?= $fetchImage ?>" alt="outro" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
                            <?php
                            }
                            ?>
                            <span class="fw-bold fs-4 text-white"><?= $fetchName . " " . $fetchSurname ?></span>
                            <span class="fs-5 text-white"><?= $fetchEmail ?></span>
                            <input type="file" name="update-imagem" id="" accept="image/jpg, image/jpeg, image/png" class="pt-3" style="width: 55%;">
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right text-white fw-bold fs-2">Informações pessoais</h4>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-6">
                                    <label class="labels text-white">Nome</label>
                                    <input type="text" name="update-nome" class="form-control" placeholder="Digite seu nome" value="<?= $fetchName ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels text-white">Sobrenome</label>
                                    <input type="text" name="update-sobrenome" class="form-control" value="<?= $fetchSurname ?>" placeholder="Digite seu sobrenome">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label class="labels text-white">Data de nascimento</label>
                                    <input type="date" name="update-data" class="form-control" placeholder="Digite sua data de nascimento" value="<?= $fetchDate ?>">
                                </div>
                                <div class="col-md mb-3">
                                    <label class="labels text-white">CPF</label>
                                    <input type="number" name="update-cpf" class="form-control" placeholder="000.000.000-00" value="<?= $fetchCpf ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label class="labels text-white">Email</label>
                                    <input type="email" name="update-email" class="form-control" placeholder="Digite seu email" value="<?= $fetchEmail ?>">
                                </div>
                                <div class="col-md mb-3">
                                    <label class="labels text-white">Telefone</label>
                                    <input type="tel" name="update-telefone" class="form-control" placeholder="(00) 00000-0000" value="<?= $fetchPhone ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label class="labels text-white">Endereço</label>
                                    <input type="text" name="update-endereco" class="form-control" placeholder="Nome da rua" value="<?= $fetchAddress ?>">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="labels text-white">Bairro</label>
                                    <input type="text" name="update-bairro" class="form-control" placeholder="Nome do bairro" value="<?= $fetchNeighborhood ?>">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="labels text-white">Número</label>
                                    <input type="number" name="update-numero" class="form-control" placeholder="N°" value="<?= $fetchNumber ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label class="labels text-white">Cidade</label>
                                    <input type="text" name="update-cidade" class="form-control" placeholder="Digite sua cidade" value="<?= $fetchCity ?>">
                                </div>
                                <div class="col-md mb-3">
                                    <label class="labels text-white">Estado</label>
                                    <select class="form-select" name="update-estado" aria-label="Default select example">
                                        <option value="<?= $fetchState ?>" selected>
                                            <?php
                                            if ($fetchInnerJoin['estado'] !== NULL) {
                                                if ($fetchInnerJoin['estado'] === "AC") {
                                                    echo "Acre";
                                                } else if ($fetchInnerJoin['estado'] === "AL") {
                                                    echo "Alagoas";
                                                } else if ($fetchInnerJoin['estado'] === "AP") {
                                                    echo "Amapá";
                                                } else if ($fetchInnerJoin['estado'] === "AM") {
                                                    echo "Bahia";
                                                } else if ($fetchInnerJoin['estado'] === "BA") {
                                                    echo "Bahia";
                                                } else if ($fetchInnerJoin['estado'] === "CE") {
                                                    echo "Ceará";
                                                } else if ($fetchInnerJoin['estado'] === "DF") {
                                                    echo "Distrito Federal";
                                                } else if ($fetchInnerJoin['estado'] === "ES") {
                                                    echo "Espiríto Santo";
                                                } else if ($fetchInnerJoin['estado'] === "GO") {
                                                    echo "Goiás";
                                                } else if ($fetchInnerJoin['estado'] === "MA") {
                                                    echo "Maranhão";
                                                } else if ($fetchInnerJoin['estado'] === "MT") {
                                                    echo "Mato Grosso";
                                                } else if ($fetchInnerJoin['estado'] === "MS") {
                                                    echo "Mato Grosso do Sul";
                                                } else if ($fetchInnerJoin['estado'] === "MG") {
                                                    echo "Minas Gerais";
                                                } else if ($fetchInnerJoin['estado'] === "PA") {
                                                    echo "Pará";
                                                } else if ($fetchInnerJoin['estado'] === "PB") {
                                                    echo "Paraíba";
                                                } else if ($fetchInnerJoin['estado'] === "PR") {
                                                    echo "Paraná";
                                                } else if ($fetchInnerJoin['estado'] === "PE") {
                                                    echo "Pernambuco";
                                                } else if ($fetchInnerJoin['estado'] === "PI") {
                                                    echo "Piauí";
                                                } else if ($fetchInnerJoin['estado'] === "RJ") {
                                                    echo "Rio de Janeiro";
                                                } else if ($fetchInnerJoin['estado'] === "RN") {
                                                    echo "Rio Grande do Norte";
                                                } else if ($fetchInnerJoin['estado'] === "RS") {
                                                    echo "Rio Grande do Sul";
                                                } else if ($fetchInnerJoin['estado'] === "RO") {
                                                    echo "Rondônia";
                                                } else if ($fetchInnerJoin['estado'] === "RR") {
                                                    echo "Roraima";
                                                } else if ($fetchInnerJoin['estado'] === "SC") {
                                                    echo "Santa Catarina";
                                                } else if ($fetchInnerJoin['estado'] === "SP") {
                                                    echo "São Paulo";
                                                } else if ($fetchInnerJoin['estado'] === "SE") {
                                                    echo "Sergipe";
                                                } else if ($fetchInnerJoin['estado'] === "TO") {
                                                    echo "Tocantins";
                                                } else {
                                                    echo "Estado";
                                                }
                                            } else {
                                                echo "Estado";
                                            }
                                            ?>
                                        </option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                    </select>
                                </div>
                                <div class="col-md mb-3">
                                    <label class="labels text-white">CEP</label>
                                    <input type="number" name="update-cep" class="form-control" placeholder="00000-000" value="<?= $fetchZipCode ?>">
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <button class="btn btn-primary profile-button" type="submit" name="update" onclick="return confirm('Deseja salvar as alterações?')">Atualizar perfil</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center experience">
                                <h4 class="text-right text-white fw-bold fs-2">Redes sociais</h4>
                            </div>
                            <div class="col-md-12 my-3">
                                <label class="labels text-white">Github</label>
                                <input type="text" name="update-github" class="form-control" placeholder="Link do github" value="<?= $fetchGithub ?>">
                            </div>
                            <div class="col-md-12 my-3">
                                <label class="labels text-white">Twitter</label>
                                <input type="text" name="update-twitter" class="form-control" placeholder="Link do twitter" value="<?= $fetchTwitter ?>">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="labels text-white">Instagram</label>
                                <input type="text" name="update-instagram" class="form-control" placeholder="Link do instagram" value="<?= $fetchInstagram ?>">
                            </div>
                            <div class="col-md-12">
                                <label class="labels text-white">Facebook</label>
                                <input type="text" name="update-facebook" class="form-control" placeholder="Link do facebook" value="<?= $fetchFacebook ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="./js/main2.js"></script>
</body>

</html>