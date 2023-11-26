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
    <title>Escudos - Santos FC</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Escudos</li>
                    </ol>
                </nav>
            </div>
        </div>
        <main class="mb-4">
            <h2 class="display-4">Escudos</h2>
            <div class="container d-flex flex-column align-items-center gap-5">
                <div class="escudos px-0 px-md-3 d-flex flex-column flex-md-row align-items-center">
                    <div class="w-100 d-flex flex-column align-items-center">
                        <h3 class="display-6 fw-bold">União FC</h3>
                        <img src="./img/Escudo-UFC229x220.png" alt="" class="img-fluid">
                    </div>
                    <p class="mt-2 lead w-100 w-md-75 text-center">Em 1915, o Santos FC adotou o pseudônimo de União FC, para poder disputar o Campeonato Santista. Com a nova nomenclatura, surgiu um novo escudo, e o time santista utilizou provisoriamente no ano de 1915 um escudo com as inicias U.F.C., em um fundo preto.</p>
                </div>
                <div class="escudos px-0 px-md-3 d-flex flex-column flex-md-row align-items-center">
                    <div class="w-100 d-flex flex-column align-items-center">
                        <h3 class="display-6 fw-bold">Fundo branco</h3>
                        <img src="./img/Escudo-anos-40229x220-1.png" alt="" class="img-fluid">
                    </div>
                    <p class="mt-2 lead w-100 w-md-75 text-center">No início da década 40, mais precisamente no ano de 1942, foi criado um novo escudo, com as letras SFC entrelaçadas em um fundo branco. O escudo não vingou, e foi utilizado até 1944.</p>
                </div>
                <div class="escudos w-100 d-flex flex-column align-items-center">
                    <h3 class="display-6 fw-bold">Atual</h3>
                    <div class="my-3 d-flex flex-md-row justify-content-between flex-column gap-3 w-75">
                        <figure class="figure d-flex flex-column justify-content-center align-items-center">
                            <img src="./img/Escudo-sem-estrelas229x220-1.png" alt="" class="img-fluid">
                            <figcaption class="figure-caption text-center">Escudo sem estrelas</figcaption>
                        </figure>
                        <figure class="figure d-flex flex-column justify-content-center align-items-center">
                            <img src="./img/Escudo-com-estrelas229x220.png" alt="" class="img-fluid">
                            <figcaption class="figure-caption text-center">Escudo com estrelas</figcaption>
                        </figure>
                        <figure class="figure d-flex flex-column justify-content-center align-items-center">
                            <img src="./img/Escudo-Atual-1.png" alt="" class="img-fluid">
                            <figcaption class="figure-caption text-center">Escudo atual</figcaption>
                        </figure>
                    </div>
                    <p class="lead text-center mt-3">O emblema atual surgiu em 1925. As estrelas acima do escudo, foram inseridas em 1968, representando as conquistas do Bicampeonato Mundial de 1962-1963. Antes de 1925, o Santos FC não utilizava distintivo nas camisas (exceto em 1915, devido ao União FC).</p>
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