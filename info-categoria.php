<?php
require_once("./php/checkout-login.php");
require_once("./php/connection.php");

$categoria = (!isset($_GET['categoria']) ? NULL : $_GET['categoria']);

$sql = "SELECT * FROM noticias WHERE categoria = '$categoria'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santos FC - Notícias</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/style-navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
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
</head>

<body>
    <?php
    include("./includes/header.php")
    ?>
    <div class="container first">
        <div class="row w-100 m-0">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 my-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="./noticias.php">Notícias</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= "Categoria: " . $categoria ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <main class="mb-5">
            <div class="container">
                <h2 class="display-4">Notícias</h2>
                <div class="row g-5">
                    <div class="col-md-8">
                        <?php
                        $rows = mysqli_num_rows($result);

                        if ($rows > 0) {
                            while ($fetch = mysqli_fetch_assoc($result)) {
                                $data_post = new DateTime($fetch['data_post']);
                        ?>
                                <div class="card mb-3">
                                    <img src="<?= $fetch['imagem'] ?>" class="img-fluid card-img-top"  alt="">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $fetch['titulo'] ?></h5>
                                        <p class="card-text">Categoria: <strong><?= $fetch['categoria'] ?></strong></p>
                                        <a href="info-noticia.php?id=<?= $fetch['id'] ?>" class="btn btn-warning">Ver mais &rarr;</a>
                                    </div>
                                    <div class="card-footer text-muted">
                                        Postado em <?= $data_post->format('d/m/Y') . " às " . $data_post->format('H:i') ?>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                        ?>
                        <p class="lead text-center">Sem notícias no momento!</p>
                        <?php
                        }
                        ?>
                    </div>
                    <?php
                    include("./includes/sidebar.php")
                    ?>
                </div>
            </div>
    </div>
    </main>
    </div>
    <?php
    include("./includes/icons.php");
    include("./includes/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        const imageProfile = document.querySelector("#image-profile");
        const accountBox = document.querySelector('.account-box');

        imageProfile.addEventListener('click', () => {
            accountBox.classList.toggle('active');
        });
    </script>
</body>

</html>