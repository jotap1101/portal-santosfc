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
    <title>Fundação - Santos FC</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Fundação</li>
                    </ol>
                </nav>
            </div>
        </div>
        <main>
            <h2 class="display-4">Fundação</h2>
            <div class="container">
                <p class="lead" style="text-align: justify;">O Santos Futebol Clube foi fundado por iniciativa de três esportistas da cidade, Francisco Raymundo Marques, Mário Ferraz de Campos e Argemiro de Souza Júnior. Eles convidaram a todos os interessados para participar da reunião inaugural do novo clube, que foi constituído para ser destinado a prática do futebol, que no começo do século passado estava engatinhando no Brasil.</p>
                <p class="lead" style="text-align: justify;">A reunião histórica aconteceu na tarde do domingo, 14 de abril de 1912, na sede do Clube Concórdia, na antiga rua do Rosário, 18 (hoje rua João Pessoa, 8/10). São considerados como sócios-fundadores todos os 39 participantes dessa reunião.</p>
                <p class="lead" style="text-align: justify;">No dia da fundação, o nome da entidade foi sugerido por Edmundo Jorge de Araújo: Santos Foot-Ball Club e as cores dos uniformes da nova agremiação, que seria presidida no primeiro ano de existência por Sizino Patusca, eram o azul e o branco, com fios dourados entre elas.</p>
                <p class="lead" style="text-align: justify;">No dia 31 de março do ano seguinte as cores do Clube, por sugestão de Paulo Peluccio, passaram a ser calção branco e camisa listrada de branco e preto. O Conselho Deliberativo do Clube teve início no dia 28 de janeiro de 1932 e o primeiro presidente foi Flamínio Levy.</p>
                <p class="lead" style="text-align: justify;">No começo de sua gloriosa caminhada entra para a vida do clube, Urbano Vilella Caldeira Filho, um homem que dedicou toda a vida ao time que tanto amou até o falecimento, no ano de 1933. Urbano Caldeira foi atleta, técnico, dirigente e hoje é um dos patronos do Santos Futebol Clube. Em sua homenagem o nome do estádio que foi erguido, no ano de 1916, leva seu nome como reconhecimento de seu amor ao Alvinegro Praiano.</p>
                <p class="lead" style="text-align: justify;">As primeiras conquistas importantes na história do time começaram em 1913 com a conquista do campeonato santista, repetindo o feito em 1915, jogando como o apelido de “União Futebol Clube” por imposição da diretoria da Associação Paulista de Esportes Atléticos.</p>
                <p class="lead" style="text-align: justify;">No ano de 1927 surge no time um ataque que até hoje não foi superado em jogos do campeonato paulista, com uma média de 6,25 gols por partida e que ficou eternizado como o time do “Ataque dos 100 gols”. Ataque esse que era formado por Omar, Camarão, Feitiço, Araken e Evangelista.</p>
                <p class="lead" style="text-align: justify;">O primeiro Campeonato Paulista vencido pelo Clube é o do ano de 1935, título esse conquistado na casa do adversário na capital paulista. A equipe volta a ganhar os certames paulistas em 1955 e 1956 e novamente no ano de 1958, quando então já tinha em suas fileiras um garoto apelidado de Pelé, que nos anos seguintes se tornaria o melhor jogador de futebol em todos os tempos.</p>
                <p class="lead" style="text-align: justify;">Na chamada “Década de Ouro”, nos anos de 1960, o time conquistou o mundo exibindo um futebol digno de aplausos, com conquistas constantes, não só no futebol brasileiro como também no planeta. A coroação maior desse time ícone da cidade de Santos aconteceu no ano de 1962, quando o Alvinegro mais famoso do mundo venceu todos os certames mais importantes disputados nesse ano e sagrando-se no ano seguinte Bicampeão Mundial. A FIFA outorgou ao clube o título de “O melhor time do século nas Américas”.</p>
                <p class="lead" style="text-align: justify;">Nos dias atuais o Santos Futebol Clube é considerado como o legítimo Octocampeão Brasileiro por suas conquistas nacionais nos anos de 1961 a 1965, 1968, 2002 e 2004. Nos campeonatos paulistas foram 22 conquistas, na Taça Libertadores da América foram 03 conquistas e nos Mundiais Interclubes foram duas conquistas. Revelando jogadores como Araken Patusca, Antoninho, Pelé, Robinho, Paulo Henrique Ganso e Neymar o time continua sendo o orgulho de toda a gente Alvinegra nos seus 110 anos de história.</p>
                <div class="my-3 d-flex flex-md-row justify-content-around flex-column gap-3 gap-md-0">
                    <figure class="figure d-flex flex-column justify-content-center align-items-center">
                        <img src="./img/Fundacao-do-Santos-3-127x300.jpg" class="figure-img img-fluid rounded h-75 w-50" alt="">
                        <figcaption class="figure-caption text-center">Convite para a fundação (Foto: Arquivo/Santos FC)</figcaption>
                    </figure>
                    <figure class="figure d-flex flex-column justify-content-center align-items-center">
                        <img src="./img/1912-06-23-Jogo-Treino-300x259.jpg" class="figure-img img-fluid rounded" alt="">
                        <figcaption class="figure-caption text-center">1º jogo treino da história do Santos FC (Foto: Divulgação/Santos FC)</figcaption>
                    </figure>
                    <figure class="figure d-flex flex-column justify-content-center align-items-center">
                        <img src="./img/1913-125x300.jpg" class="figure-img img-fluid rounded h-75 w-50" alt="">
                        <figcaption class="figure-caption text-center">1º jogo de 1913 (Foto: Arquivo/Santos FC)</figcaption>
                    </figure>
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