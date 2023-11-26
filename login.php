<?php
    require_once("./php/controller.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santos FC | Login</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/login-signin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
</head>
<body>
    <h3 class="title-main">Faça seu login!</h3>
    <div class="container">
        <div class="cover">
            <div class="front">
                <img src="./img/wp01.jpg" alt="">
                <div class="text">
                    <span class="text-1">Entre, e torne-se o melhor em campo!</span>
                    <span class="text-2">Mantenha-se conectado</span>
                </div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <?php
                        if (count($errors) > 0) {
                    ?>
                        <div class="msg">
                            <span>
                                <?php
                                    foreach($errors as $showError) {
                                        echo $showError;
                                    }
                                ?>
                            </span>
                        </div>
                    <?php
                        }
                    ?>
                    <form action="login.php" method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" id="" placeholder="Digite seu email">
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" id="inputPassword" placeholder="Digite sua senha">
                                <span class="show-btn"><i class="fas fa-eye"></i></span>
                            </div>
                            <div class="text"><a href="#">Esqueceu a senha?</a></div>
                            <div class="button input-box">
                                <input type="submit" value="Entrar" name="login">
                            </div>
                            <div class="text sign-up-text">Não possui uma conta? <a href="./signin.php">Inscreva-se agora</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    <script src="./js/login-signin.js"></script>
</body>
</html>