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
    <title>Hino Oficial - Santos FC</title>
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
    include("./includes/header.php")
    ?>
    <div class="container first">
        <div class="row w-100 m-0">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 my-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">História</li>
                        <li class="breadcrumb-item active" aria-current="page">Hino Oficial</li>
                    </ol>
                </nav>
            </div>
        </div>
        <main class="mb-4">
            <h2 class="display-4">Hino Oficial</h2>
            <div class="container d-flex flex-column-reverse flex-md-row">
                <div class="w-100 w-md-50">
                    <div class="text-center">
                        <p class="lead ">Sou alvinegro da Vila Belmiro</p>
                        <p class="lead">O Santos vive no meu coração</p>
                        <p class="lead">É o motivo de todo o meu riso</p>
                        <p class="lead">De minhas lágrimas e emoção</p>
                    </div>
                    <br>
                    <div class="text-center">
                        <p class="lead">Sua bandeira no mastro é a história</p>
                        <p class="lead">De um passado e um presente só de glórias</p>
                        <p class="lead">Nascer, viver e no Santos morrer</p>
                        <p class="lead">É um orgulho que nem todos podem ter</p>
                    </div>
                    <br>
                    <div class="text-center">
                        <p class="lead">No Santos pratica-se o esporte</p>
                        <p class="lead">Com dignidade e com fervor</p>
                        <p class="lead">Seja qual for a sua sorte</p>
                        <p class="lead">De vencido ou vencedor</p>
                    </div>
                    <br>
                    <div class="text-center">
                        <p class="lead">Com técnica e disciplina</p>
                        <p class="lead">Dando o sangue com amor</p>
                        <p class="lead">Pela bandeira que ensina</p>
                        <p class="lead">Lutar com fé e com ardor</p>
                    </div>
                    <br>
                </div>
                <div class="w-100 w-md-50 d-flex flex-column align-items-center gap-3 mb-5 mb-md-0">
                    <img src="./img/Escudo-com-estrelas229x220.png" alt="" class="img-fluid w-50">
                    <audio controls>
                        <source src="./midia/Hino-Oficial-Santos-FC.mp3" type="audio/mp3"></source>
                    </audio>
                </div>
            </div>
        </main>
    </div>
    <?php
    include("./includes/icons.php");
    include("./includes/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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