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
    <style>
        
    </style>
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
        <main class="contato" id="contato">
            <h3 class="title">Fale conosco!</h3>
            <div class="box">
                <div class="contact form">
                    <h3>Send a Message</h3>
                    <form action="" method="post">
                        <div class="form-box">
                            <div class="row-50">
                                <div class="input-box">
                                    <label for="">Nome</label>
                                    <input type="text" name="" id="" placeholder="Ex: João Pedro">
                                </div>
                                <div class="input-box">
                                    <label for="">Sobrenome</label>
                                    <input type="text" name="" id="" placeholder="Ex: Alves">
                                </div>
                            </div>
                            <div class="row-50">
                                <div class="input-box">
                                    <label for="">Email</label>
                                    <input type="email" name="" id="" placeholder="Ex: joaopedroalves@gmail.com">
                                </div>
                                <div class="input-box">
                                    <label for="">Telefone</label>
                                    <input type="tel" name="" id="" placeholder="Ex: +55 (35) 99872-4512">
                                </div>
                            </div>
                            <div class="row-100">
                                <div class="input-box">
                                    <label for="">Mensagem</label>
                                    <textarea name="" id="" cols="" rows="" placeholder="Escreva sua mensagem aqui..."></textarea>
                                </div>
                            </div>
                            <div class="row-100">
                                <div class="input-box">
                                    <input type="submit" value="Enviar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="contact info">
                    <h3>Contact Info</h3>
                    <div class="info-box">
                        <div>
                            <span><i class='bx bx-location-plus'></i></span>
                            <p>IFSULDEMINAS - Campus Muzambinho <br>BRASIL</p>
                        </div>
                        <div>
                            <span><i class='bx bx-envelope'></i></span>
                            <a href="mailto:12201000124@muz.ifsuldeminas.edu.br">12201000124@muz.ifsuldeminas.edu.br</a>
                        </div>
                        <div>
                            <span><i class='bx bx-phone-call'></i></span>
                            <a href="tel:+5535998742498">+55 (35) 99874-2498</a>
                        </div>
                        <ul class="sci">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-github"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="contact map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3715.9890207339386!2d-46.53074904946228!3d-21.350928289502257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b63fd0272469bf%3A0xe013b6753e91a94!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20do%20Sul%20de%20Minas%20Gerais%20-%20Campus%20Muzambinho!5e0!3m2!1spt-BR!2sbr!4v1664058962533!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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