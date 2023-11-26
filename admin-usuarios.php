<?php
require_once("./php/checkout-login.php");
require_once("./php/connection.php");

if (!isset($_SESSION['id_adm'])) {
    echo '<script>
            alert("Você não possui esse nível de acesso!");
            setTimeout(function() {
                window.location.href = "./index.php";
            }, 100);
        </script>';
}

if (isset($_GET['id'])) {
    $id = (!isset($_GET['id']) ? NULL : $_GET['id']);

    $sql = "DELETE usuarios, dados, redes_sociais, log FROM usuarios INNER JOIN dados ON usuarios.id = dados.id_usuario INNER JOIN redes_sociais ON usuarios.id = redes_sociais.id_usuario INNER JOIN log ON usuarios.id = log.id_usuario WHERE usuarios.id = '$id' AND dados.id_usuario = '$id' AND redes_sociais.id_usuario = '$id' AND log.id_usuario = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();

        echo '<script>
                alert("Conta excluída com sucesso!");
                setTimeout(function() {
                    window.location.href = "admin-usuarios.php?delete=success";
                }, 100);
            </script>';
    } else {
        echo '<script>
                alert("Erro ao excluir conta!");
                setTimeout(function() {
                    window.location.href = "admin-usuarios.php?delete=error";
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
    <title>Painel do administrador - Usuários</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/admin.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Painel do administrador</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search"> -->
        <div class="navbar-nav w-100">
            <div class="nav-item text-nowrap text-end">
                <a class="nav-link px-3" href="./php/logout.php">Logout</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse pt-5 px-3">
                <div class="position-sticky pt-3">
                    <ul class="list-unstyled ps-0">
                        <a class="btn d-inline-flex align-items-center rounded border-0 collapsed text-success fw-bold" href="./admin-dashboard.php">
                            Dashboard
                        </a>
                        <br>
                        <a class="btn d-inline-flex align-items-center rounded border-0 collapsed" href="./admin-usuarios.php">
                            Usuários
                        </a>
                        <br>
                        <a class="btn d-inline-flex align-items-center rounded border-0 collapsed" href="admin-mensagens.php">
                            Mensagens
                        </a>
                        <br>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#conteudo-collapse" aria-expanded="false">
                                Conteúdo
                            </button>
                            <div class="collapse" id="conteudo-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="admin-jogadores.php" class="link-dark d-inline-flex text-decoration-none rounded">Jogadores</a></li>
                                    <li><a href="admin-conquistas.php" class="link-dark d-inline-flex text-decoration-none rounded">Conquistas</a></li>
                                    <li><a href="admin-videos.php" class="link-dark d-inline-flex text-decoration-none rounded">Vídeos</a></li>
                                    <li><a href="admin-noticias.php" class="link-dark d-inline-flex text-decoration-none rounded">Notícias</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="border-top my-3"></li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h1">Gerenciamento de usuários</h1>
                </div>

                <h2 class="mt-4">Contas recentes</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <caption>Contas adicionadas recentemente</caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Data de nascimento</th>
                                <th scope="col">Email</th>
                                <th scope="col">Data de registro</th>
                                <th scope="col">Nível</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM usuarios INNER JOIN dados ON usuarios.id = dados.id_usuario INNER JOIN redes_sociais ON usuarios.id = redes_sociais.id_usuario INNER JOIN log ON usuarios.id = log.id_usuario ORDER BY usuarios.id DESC";
                            $result = mysqli_query($conn, $sql) or die('Erro no banco de dados!');

                            while ($fetch = mysqli_fetch_assoc($result)) {
                                $data_nascimento = new DateTime($fetch['data_nascimento']);
                                $data_registro = new DateTime($fetch['data_criacao']);
                            ?>
                                <tr>
                                    <td><?= $fetch['id'] ?></td>
                                    <td><?= $fetch['nome'] ?></td>
                                    <td><?= ($fetch['data_nascimento'] == NULL) ? "-" : $data_nascimento->format('d/m/Y') ?></td>
                                    <td><?= $fetch['email'] ?></td>
                                    <td><?= $data_registro->format('d/m/Y') ?></td>
                                    <td><?= $fetch['tipo_usuario'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <h2 class="mt-5">Usuários</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <caption>Registros dos usuários</caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Data de<br>nascimento</th>
                                <th scope="col">CPF</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Data de<br> registro</th>
                                <th scope="col">Última<br> atualização</th>
                                <th scope="col">Nível</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM usuarios INNER JOIN dados ON usuarios.id = dados.id_usuario INNER JOIN redes_sociais ON usuarios.id = redes_sociais.id_usuario INNER JOIN log ON usuarios.id = log.id_usuario";
                            $result = mysqli_query($conn, $sql) or die('Erro no banco de dados!');

                            while ($fetch = mysqli_fetch_assoc($result)) {
                                $data_nascimento = new DateTime($fetch['data_nascimento']);
                                $data_registro = new DateTime($fetch['data_criacao']);
                                $data_atualizacao = new DateTime($fetch['data_atualizacao']);
                            ?>
                                <tr>
                                    <td><?= $fetch['id'] ?></td>
                                    <td><?= $fetch['nome'] ?></td>
                                    <td><?= ($fetch['data_nascimento'] == NULL) ? "-" : $data_nascimento->format('d/m/Y') ?></td>
                                    <td><?= ($fetch['cpf'] == 0 || $fetch['cpf'] == NULL) ? "-" : $fetch['cpf'] ?></td>
                                    <td><?= $fetch['email'] ?></td>
                                    <td><?= ($fetch['telefone'] == 0 || $fetch['telefone'] == NULL) ? "-" : $fetch['telefone'] ?></td>
                                    <td><?= $data_registro->format('d/m/Y') ?></td>
                                    <td><?= (($fetch['data_atualizacao'] == "0000-00-00" || $fetch['data_atualizacao'] == NULL) || $fetch['tipo_usuario'] == "administrador") ? "-" : $data_atualizacao->format('d/m/Y') . " às " . $data_atualizacao->format('H:i:s') ?></td>
                                    <td><?= $fetch['tipo_usuario'] ?></td>
                                    <td>
                                        <?php
                                        if ($fetch['tipo_usuario'] == "administrador") {
                                            echo "-";
                                        } else {
                                        ?>
                                            <a class="btn btn-danger btn-sm" href="./admin-usuarios.php?id=<?= $fetch['id'] ?>" role="button" onclick="return confirm('Excluir este usuário?');">Excluir</a>
                                        <?php
                                        }
                                        ?>

                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="./js/admin.js"></script>
</body>

</html>