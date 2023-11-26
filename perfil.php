<?php
require_once("./php/connection.php");
require_once("./php/checkout-login.php");
require_once("./perfil-read.php");
require_once("./update-password.php");

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
    <main class="py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
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
                            <h5 class="my-3"><?php echo $fetchName . " " . $fetchSurname; ?></h5>
                            <div class="d-flex justify-content-center mb-2 gap-3">
                                <button type="button" class="btn btn-danger" onclick="return confirm('Deseja excluir sua conta?')"><a href="./perfil-delete.php?id=<?= $user ?>">Excluir conta</a></button>
                                <button type="button" class="btn btn-warning"><a href="./php/logout.php" onclick="return confirm('Deseja realizar o logout?')">Sair</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">
                                        <?php
                                        $result = ($fetchGithub === NULL || $fetchGithub === "") ? "-" : $fetchGithub;
                                        echo '<a href="' . $result . '">' . $result . '</a>';
                                        ?>
                                    </p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">
                                        <?php
                                        $result = ($fetchTwitter === NULL || $fetchTwitter === "") ? "-" : $fetchTwitter;
                                        echo '<a href="' . $result . '">' . $result . '</a>';
                                        ?>
                                    </p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">
                                        <?php
                                        $result = ($fetchInstagram === NULL || $fetchInstagram === "") ? "-" : $fetchInstagram;
                                        echo '<a href="' . $result . '">' . $result . '</a>';
                                        ?>
                                    </p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">
                                        <?php
                                        $result = ($fetchFacebook === NULL || $fetchFacebook === "") ? "-" : $fetchFacebook;
                                        echo '<a href="' . $result . '">' . $result . '</a>';
                                        ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nome completo</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php
                                        $result = (($fetchName === NULL && $fetchSurname === NULL) || $fetchName === "" && $fetchSurname === "") ? "-" : $fetchName . " " . $fetchSurname;
                                        echo $result;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Data de nascimento</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php
                                        $result;
                                        if ($fetchDate === NULL || $fetchDate === "01/01/1970" || $fetchDate === "0000-00-00" || $fetchDate === "") {
                                            $result = "-";
                                        } else {
                                            $result = date("d/m/Y", strtotime($fetchInnerJoin['data_nascimento']));
                                        }
                                        echo $result;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">CPF</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php
                                        $result;
                                        if ($fetchCpf === NULL || $fetchCpf === "" || $fetchCpf == 0) {
                                            $result = "-";
                                        } else {
                                            $stringCpf = strval($fetchCpf);
                                            $result = "{$stringCpf[0]}{$stringCpf[1]}{$stringCpf[2]}.{$stringCpf[3]}{$stringCpf[4]}{$stringCpf[5]}.{$stringCpf[6]}{$stringCpf[7]}{$stringCpf[8]}-{$stringCpf[9]}{$stringCpf[10]}";
                                        }
                                        echo $result;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php
                                        $result = ($fetchEmail === NULL || $fetchEmail === "") ? "-" : $fetchEmail;
                                        echo $result;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Telefone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php
                                        $result;
                                        if ($fetchPhone === NULL || $fetchPhone === "" || $fetchPhone == 0) {
                                            $result = "-";
                                        } else {
                                            $stringTelefone = strval($fetchPhone);
                                            $result = "({$stringTelefone[0]}{$stringTelefone[1]}) {$stringTelefone[2]}{$stringTelefone[3]}{$stringTelefone[4]}{$stringTelefone[5]}{$stringTelefone[6]}-{$stringTelefone[7]}{$stringTelefone[8]}{$stringTelefone[9]}{$stringTelefone[10]}";
                                        }
                                        echo $result;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Endereço</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php
                                        $result = ($fetchAddress === NULL || $fetchNumber === NULL || $fetchNeighborhood === NULL || $fetchCity === NULL || $fetchState === NULL || $fetchZipCode === NULL || $fetchAddress === "" || $fetchNumber === "" || $fetchNeighborhood === "" || $fetchCity === "" || $fetchState === "" || $fetchZipCode === "") ? "-" : strval($fetchEndereco);
                                        echo $result;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md">
                                    <button type="button" class="btn btn-primary w-100"><a href="./perfil-update.php?id=<?= $user ?>">Atualizar perfil</a></button>
                                </div>
                                <div class="col-12 col-md mt-2 mt-sm-0">
                                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updatePassword">Alterar senha</button>
                                </div>
                                <div class="modal fade" id="updatePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar senha</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="./update-password.php" method="post">
                                                    <input type="hidden" name="password" value="<?= $fetchInnerJoin['senha'] ?>">
                                                    <div class="mb-3">
                                                        <label for="senha-antiga" class="col-form-label">Senha atiga:</label>
                                                        <input type="password" name="old-password" class="form-control" id="senha-antiga">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="senha-nova" class="col-form-label" aria-describedby="passwordHelpBlock">Nova senha:</label>
                                                        <input type="password" name="new-password" class="form-control" id="senha-nova">
                                                        <div id="passwordHelpBlock" class="form-text">
                                                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="senha-confirmacao" class="col-form-label">Confirme a senha:</label>
                                                        <input type="password" name="confirm-password" class="form-control" id="senha-confirmacao">
                                                    </div>
                                                    <div class="modal-footer" style="padding-bottom: 0 !important;">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-primary" name="update-password">Atualizar senha</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                                <p class="fs-2 fw-bold text-center" s>Nascer, viver e no Santos Morrer!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        const imageProfile = document.querySelector("#image-profile");
        const accountBox = document.querySelector('.account-box');

        imageProfile.addEventListener('click', () => {
            accountBox.classList.toggle('active');
        });
    </script>
</body>

</html>