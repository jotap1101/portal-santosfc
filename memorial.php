<?php
require_once("./php/checkout-login.php");
require_once("./php/connection.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memorial das Conquistas - Santos FC</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/style-navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
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
                        <li class="breadcrumb-item active">Clube</li>
                        <li class="breadcrumb-item active" aria-current="page">Memorial</li>
                    </ol>
                </nav>
            </div>
        </div>
        <main class="memorial">
            <h2 class="display-4">Memorial das Conquistas</h2>
            <div class="container">
                <p class="lead" style="text-align: justify;">Todos os dias o Santos Futebol Clube recebe amantes e admiradores do futebol de diversos lugares do mundo. Troféus, flâmulas, fotos e prêmios contam histórias do Clube que mais marcou gols na história desse esporte que encanta multidões.</p>
                <p class="lead" style="text-align: justify;">No dia 17 de novembro de 2003 foi inaugurado, no Estádio Urbano Caldeira, na famosa Vila Belmiro, o Memorial das Conquistas e, desde sua fundação, mais de 1 milhão de pessoas já visitaram o espaço.</p>
                <p class="lead" style="text-align: justify;">Em 380 m² de pura magia, os visitantes conhecem a história dos Ídolos Eternos, inclusive, alguns com espaços únicos, como Pelé e Neymar, além de observar vídeos de grandes momentos do time, descobrindo que o Peixão é dono de façanhas incríveis.</p>
                <p class="lead" style="text-align: justify;">Em 380 m² de pura magia, os visitantes conhecem a história dos Ídolos Eternos, inclusive, alguns com espaços únicos, como Pelé e Neymar, além de observar vídeos de grandes momentos do time, descobrindo que o Peixão é dono de façanhas incríveis.</p>
                <div class="my-3 d-flex flex-md-row justify-content-around flex-column gap-3 gap-md-0">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <figure class="figure">
                                <img src="./img/Memorial-das-Conquistas-2.jpeg" class="figure-img img-fluid rounded" alt="">
                                <figcaption class="figure-caption text-center">Foto: (Pedro Ernesto Guerra Azevedo/Santos FC)</figcaption>
                            </figure>
                        </div>
                        <div class="col">
                            <figure class="figure">
                                <img src="./img/Memorial-das-Conquistas-3.jpeg" class="figure-img img-fluid rounded" alt="">
                                <figcaption class="figure-caption text-center">Foto: (Pedro Ernesto Guerra Azevedo/Santos FC)</figcaption>
                            </figure>
                        </div>
                        <div class="col">
                            <figure class="figure">
                                <img src="./img/Memorial-das-Conquistas-4.jpeg" class="figure-img img-fluid rounded" alt="">
                                <figcaption class="figure-caption text-center">Foto: (Pedro Ernesto Guerra Azevedo/Santos FC)</figcaption>
                            </figure>
                        </div>
                        <div class="col">
                            <figure class="figure">
                                <img src="./img/Memorial-das-Conquistas-5.jpeg" class="figure-img img-fluid rounded" alt="">
                                <figcaption class="figure-caption text-center">Foto: (Pedro Ernesto Guerra Azevedo/Santos FC)</figcaption>
                            </figure>
                        </div>
                        <div class="col">
                            <figure class="figure">
                                <img src="./img/Memorial-das-Conquistas-6.jpeg" class="figure-img img-fluid rounded" alt="">
                                <figcaption class="figure-caption text-center">Foto: (Pedro Ernesto Guerra Azevedo/Santos FC)</figcaption>
                            </figure>
                        </div>
                        <div class="col">
                            <figure class="figure">
                                <img src="./img/Museu-1.jpeg" class="figure-img img-fluid rounded" alt="">
                                <figcaption class="figure-caption text-center">Foto: (Pedro Ernesto Guerra Azevedo/Santos FC)</figcaption>
                            </figure>
                        </div>
                        <div class="col">
                            <figure class="figure">
                                <img src="./img/Museu-2.jpeg" class="figure-img img-fluid rounded" alt="">
                                <figcaption class="figure-caption text-center">Foto: (Pedro Ernesto Guerra Azevedo/Santos FC)</figcaption>
                            </figure>
                        </div>
                        <div class="col">
                            <figure class="figure">
                                <img src="./img/@tu.drone_.jpeg" class="figure-img img-fluid rounded" alt="">
                                <figcaption class="figure-caption text-center">Foto: (Fábio Maradei/Santos FC)</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper mySwiperConquistas my-5">
                <div class="swiper-wrapper">
                    <?php
                    $sql = "SELECT * FROM conquistas";
                    $result = mysqli_query($conn, $sql);

                    while ($fetch = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="swiper-slide">
                            <div class="card__inner">
                                <div class="card__face card__face--front d-flex flex-column justify-content-center gap-3">
                                    <img src="<?= $fetch['imagem_trofeu'] ?>" alt="" class="h-75">
                                </div>
                                <div class="card__face card__face--back d-flex flex-column justify-content-center">
                                    <h2><?= $fetch['nome_campeonato'] ?></h2>
                                    <p class="lead fw-bold"><?= $fetch['data'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>
    <?php
    include("./includes/icons.php");
    include("./includes/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./js/main2.js"></script>
    <script>
        const imageProfile = document.querySelector("#image-profile");
        const accountBox = document.querySelector('.account-box');

        imageProfile.addEventListener('click', () => {
            accountBox.classList.toggle('active');
        });
    </script>
</body>

</html>