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
    <title>Elenco - Santos FC</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/style-navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
</head>

<body>
    <?php
    include("./includes/header.php");
    ?>
    <div class="container first">
        <div class="row w-100 m-0">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 my-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Elenco</li>
                    </ol>
                </nav>
            </div>
        </div>
        <main class="elenco mb-4">
            <h2 class="display-4">Elenco</h2>
            <div class="container">
                <div class="w-100 d-flex justify-content-center">
                    <div class="btn-group d-flex flex-wrap" role="group" aria-label="Default button group">
                        <button type="button" class="btn btn-outline-dark" id="goleiros" onclick="showDiv(this)">Goleiros</button>
                        <button type="button" class="btn btn-outline-dark" id="zagueiros" onclick="showDiv(this)">Zagueiros</button>
                        <button type="button" class="btn btn-outline-dark" id="laterais" onclick="showDiv(this)">Laterais</button>
                        <button type="button" class="btn btn-outline-dark" id="volantes" onclick="showDiv(this)">Volantes</button>
                        <button type="button" class="btn btn-outline-dark" id="meio-campo" onclick="showDiv(this)">Meio Campo</button>
                        <button type="button" class="btn btn-outline-dark" id="atacantes" onclick="showDiv(this)">Atacantes</button>
                    </div>
                </div>
                <div class="swiper mySwiper" id="div-goleiros">
                    <div class="swiper-wrapper">
                        <?php
                        $posicao = ucfirst('goleiro');
                        $sql = "SELECT * FROM jogadores WHERE posicao = '$posicao'";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        if ($rows > 0) {
                            while ($fetch = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="swiper-slide">
                                    <?php
                                    echo '<div><h2>' . $fetch['nome'] . '</h2><span>' . $fetch['numero'] . '</span></div>
                                
                                <img src="' . $fetch['imagem'] . '" alt="" class="img-fluid">
                                
                                <button type="button" class="btn btn-dark mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><a href="./info-jogador.php?id=' . $fetch['id'] . '&jogador=' . $fetch['nome'] . '">Ver mais informações</a></button>';
                                    ?>
                                </div>
                        <?php
                            }
                        } else {
                            echo '<p class="lead">Nada ainda!</p>';
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
                <div class="swiper mySwiper" id="div-zagueiros" style="display: none;">
                    <div class="swiper-wrapper">
                        <?php
                        $posicao = ucfirst('zagueiro');
                        $sql = "SELECT * FROM jogadores WHERE posicao = '$posicao'";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        if ($rows > 0) {
                            while ($fetch = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="swiper-slide">
                                    <?php
                                    echo '<div><h2>' . $fetch['nome'] . '</h2><span>' . $fetch['numero'] . '</span></div>
                                
                                <img src="' . $fetch['imagem'] . '" alt="" class="img-fluid">
                                
                                <button type="button" class="btn btn-dark mt-3"><a href="./info-jogador.php?id=' . $fetch['id'] . '&jogador=' . $fetch['nome'] . '">Ver mais informações</a></button>';
                                    ?>
                                </div>
                        <?php
                            }
                        } else {
                            echo '<p class="lead">Nada ainda!</p>';
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
                <div class="swiper mySwiper" id="div-laterais" style="display: none;">
                    <div class="swiper-wrapper">
                        <?php
                        $posicao = ucfirst('lateral');
                        $sql = "SELECT * FROM jogadores WHERE posicao = '$posicao'";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        if ($rows > 0) {
                            while ($fetch = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="swiper-slide">
                                    <?php
                                    echo '<div><h2>' . $fetch['nome'] . '</h2><span>' . $fetch['numero'] . '</span></div>
                                
                                <img src="' . $fetch['imagem'] . '" alt="" class="img-fluid">
                                
                                <button type="button" class="btn btn-dark mt-3"><a href="./info-jogador.php?id=' . $fetch['id'] . '&jogador=' . $fetch['nome'] . '">Ver mais informações</a></button>';
                                    ?>
                                </div>
                        <?php
                            }
                        } else {
                            echo '<p class="lead">Nada ainda!</p>';
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
                <div class="swiper mySwiper" id="div-volantes" style="display: none;">
                    <div class="swiper-wrapper">
                        <?php
                        $posicao = ucfirst('volante');
                        $sql = "SELECT * FROM jogadores WHERE posicao = '$posicao'";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        if ($rows > 0) {
                            while ($fetch = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="swiper-slide">
                                    <?php
                                    echo '<div><h2>' . $fetch['nome'] . '</h2><span>' . $fetch['numero'] . '</span></div>
                                
                                <img src="' . $fetch['imagem'] . '" alt="" class="img-fluid">
                                
                                <button type="button" class="btn btn-dark mt-3"><a href="./info-jogador.php?id=' . $fetch['id'] . '&jogador=' . $fetch['nome'] . '">Ver mais informações</a></button>';
                                    ?>
                                </div>
                        <?php
                            }
                        } else {
                            echo '<p class="lead">Nada ainda!</p>';
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
                <div class="swiper mySwiper" id="div-meio-campo" style="display: none;">
                    <div class="swiper-wrapper">
                        <?php
                        $posicao = ucfirst('meio-campo');
                        $sql = "SELECT * FROM jogadores WHERE posicao = '$posicao'";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        if ($rows > 0) {
                            while ($fetch = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="swiper-slide">
                                    <?php
                                    echo '<div><h2>' . $fetch['nome'] . '</h2><span>' . $fetch['numero'] . '</span></div>
                                
                                <img src="' . $fetch['imagem'] . '" alt="" class="img-fluid">
                                
                                <button type="button" class="btn btn-dark mt-3"><a href="./info-jogador.php?id=' . $fetch['id'] . '&jogador=' . $fetch['nome'] . '">Ver mais informações</a></button>';
                                    ?>
                                </div>
                        <?php
                            }
                        } else {
                            echo '<p class="lead">Nada ainda!</p>';
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
                <div class="swiper mySwiper" id="div-atacantes" style="display: none;">
                    <div class="swiper-wrapper">
                        <?php
                        $posicao = ucfirst('atacante');
                        $sql = "SELECT * FROM jogadores WHERE posicao = '$posicao'";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        if ($rows > 0) {
                            while ($fetch = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="swiper-slide">
                                    <?php
                                    echo '<div><h2>' . $fetch['nome'] . '</h2><span>' . $fetch['numero'] . '</span></div>
                                
                                <img src="' . $fetch['imagem'] . '" alt="" class="img-fluid">
                                
                                <button type="button" class="btn btn-dark mt-3"><a href="./info-jogador.php?id=' . $fetch['id'] . '&jogador=' . $fetch['nome'] . '">Ver mais informações</a></button>';
                                    ?>
                                </div>
                        <?php
                            }
                        } else {
                            echo '<p class="lead">Nada ainda!</p>';
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>
        </main>
    </div>
    <?php
    include("./includes/icons.php");
    include("./includes/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
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