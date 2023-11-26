<?php
require_once("./php/controller.php");
require_once("./php/connection.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santos FC - O maior clube brasileiro do mundo!</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
    <header>
        <nav>
            <i class='bx bx-menu sidebar-open'></i>
            <a href="https://www.santosfc.com.br/" target="_blank" class="logo">
                <img src="img/logo.png" alt="">
            </a>
            <div class="menu">
                <div class="logo-toggle">
                    <a href="https://www.santosfc.com.br/" target="_blank" class="logo">
                        <img src="img/logo.png" alt="">
                    </a>
                    <span>Santos FC</span>
                    <i class='bx bx-x sidebar-close'></i>
                </div>
                <ul class="nav-list">
                    <li class="nav-items">
                        <a href="#home" class="menu-link">Home</a>
                    </li>
                    <li class="nav-items">
                        <a href="#noticias" class="menu-link">Notícias</a>
                    </li>
                    <li class="nav-items">
                        <a href="#santos-store" class="menu-link">Santos Store</a>
                    </li>
                    <li class="nav-items">
                        <a href="#santos-tv" class="menu-link">Santos TV</a>
                    </li>
                    <li class="nav-items">
                        <a href="#jogadores" class="menu-link">Nosso time</a>
                    </li>
                    <li class="nav-items">
                        <a href="#conquistas" class="menu-link">Nossas conquistas</a>
                    </li>
                </ul>
                <!-- <div class="footer">
                    <span>&copy; | João Pedro Alves</span>
                </div> -->
            </div>
            <button type="button" class="btn btn-light"><a href="./login.php">Login</a></button>
        </nav>
    </header>
    <main>
        <section class="home" id="home">
            <div class="container">
                <div class="content-text">
                    <h2>Nascer, viver e no Santos morrer <br><span>É um orgulho que nem todos podem ter!</span></h2>
                    <p class="lead">Eles não entendem que ser santista é ultrapassar o entendimento, porque é uma força muito maior que a torcida possa explicar! Ser santista é ser exatamente imprevisível durante toda a tua vida!Ser Santista é amar o que teus heróis vestem, sem se importar com o último título, e sim com a última emoção!</p>
                </div>
                <div class="button m-0">
                    <button type="button" class="btn btn-warning btn-lg">
                        <a href="https://www.santosfc.com.br/" target="_blank">Explorar</a>
                    </button>
                </div>
                <div class="img">
                    <img src="./img/cta-escudo.png" alt="">
                </div>
                <div class="social-index">
                    <a href="https://pt-br.facebook.com/santosfc/" target="_blank" class="face">
                        <i class='bx bxl-facebook-circle'></i>
                    </a>
                    <a href="https://www.instagram.com/santosfc/" target="_blank" class="insta">
                        <i class='bx bxl-instagram'></i>
                    </a>
                    <a href="https://twitter.com/SantosFC" target="_blank" class="tt">
                        <i class='bx bxl-twitter'></i>
                    </a>
                    <a href="https://www.youtube.com/c/santosfc" target="_blank" class="yt">
                        <i class='bx bxl-youtube'></i>
                    </a>
                    <a href="https://www.tiktok.com/@santosfc" target="_blank" class="ttk">
                        <i class='bx bxl-tiktok'></i>
                    </a>
                    <a href="https://br.linkedin.com/company/santosfc" target="_blank" class="lk">
                        <i class='bx bxl-linkedin'></i>
                    </a>
                </div>
            </div>
        </section>
        <section class="noticias" id="noticias">
            <div class="container">
                <div class="header">
                    <h2>Últimas notícias</h2>
                </div>
                <div class="swiper mySwiperNoticias">
                    <div class="swiper-wrapper">
                        <?php
                        $sql = "SELECT * FROM noticias GROUP BY id DESC LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        if ($rows > 0) {
                            while ($fetch = mysqli_fetch_assoc($result)) {
                                $data_post = new DateTime($fetch['data_post']);
                        ?>
                                <div class="swiper-slide">
                                    <img src="<?= $fetch['imagem'] ?>" alt="">
                                    <div class="date">
                                        <span class="day"><?= $data_post->format("j") ?></span><span class="month"><?= $data_post->format("M") ?></span>
                                    </div>
                                    <figcaption>
                                        <!-- <h3>An Abstract Post Heading</h3> -->
                                        <p class="fw-bold p-0"><?= $fetch['titulo'] ?></p>
                                    </figcaption>
                                    <div class="hover"><i class="ion-android-open"></i></div>
                                    <a href="info-noticia.php?id=<?= $fetch['id'] ?>"></a>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="button">
                    <button type="button" class="btn btn-warning
                    btn-lg"><a href="./noticias.php">Mais notícias</a></button>
                </div>
            </div>
        </section>
        <section class="santos-store" id="santos-store">
            <div class="container">
                <div class="content">
                    <div class="widget">
                        <img src="./img/anuncio.png" alt="" class="img-fluid">
                        <div class="button">
                            <button type="button" class="btn btn-warning btn-lg">
                                <a href="https://www.santosstore.com.br/" target="_blank">Acessar</a>
                            </button>
                        </div>
                    </div>
                    <div class="imagem">
                        <img src="./img/camisas.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <section class="santos-tv" id="santos-tv">
            <div class="container">
                <div class="header">
                    <h2>Santos TV</h2>
                    <span class="divider">
                        <hr>
                    </span>
                </div>
                <div class="swiper mySwiperVideos">
                    <div class="swiper-wrapper">
                        <?php
                        $sql = "SELECT * FROM videos";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        if ($rows > 0) {
                            while ($fetch = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="swiper-slide">
                                    <iframe width="560" height="315" src="<?= $fetch['link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="button">
                    <button type="button" class="btn btn-warning btn-lg"><a href="https://www.youtube.com/c/santosfc/videos" target="_blank">Assistir mais</a></button>
                </div>
            </div>
        </section>
        <section class="jogadores" id="jogadores">
            <div class="container">
                <div class="header">
                    <h2>Nosso Time</h2>
                    <span class="divider">
                        <hr>
                    </span>
                    <div class="button">
                        <button type="button" class="btn btn-warning btn-lg"><a href="./elenco.php">Ver elenco completo</a></button>
                    </div>
                </div>
                <div class="swiper mySwiperJogadores">
                    <div class="swiper-wrapper">
                        <?php
                        $sql = "SELECT * FROM jogadores LIMIT 6;";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        if ($rows > 0) {
                            while ($fetch = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="swiper-slide">
                                    <?php
                                    echo '<img src="' . $fetch['imagem'] . '" alt="" class="img-fluid">';
                                    ?>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <div class="swiper-slide">
                            <button type="button" class="btn btn-warning btn-sm"><a href="./elenco.php"></a>Ver mais</button>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <section class="conquistas" id="conquistas">
            <div class="container">
                <div class="header">
                    <img src="./img/coroa.png" alt="">
                    <h2>Nossas Conquistas</h2>
                    <img src="./img/coroa.png" alt="">
                </div>
                <div class="swiper mySwiperConquistas">
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
                <div class="button">
                    <button type="button" class="btn btn-warning
                    btn-lg"><a href="./titulos.php">Ver mais</a></button>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./js/main.js"></script>
    <script>
        const card = document.querySelector(".card__inner");

        card.addEventListener("mouseover", function(e) {
            card.classList.toggle('is-flipped');
        });
    </script>
</body>

</html>