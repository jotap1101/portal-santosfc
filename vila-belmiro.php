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
    <title>Vila Belmiro - Santos FC</title>
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
                        <li class="breadcrumb-item active">Clube</li>
                        <li class="breadcrumb-item active" aria-current="page">Vila Belmiro</li>
                    </ol>
                </nav>
            </div>
        </div>
        <main>
            <h2 class="display-4">Vila Belmiro</h2>
            <div class="container">
                <p class="lead" style="text-align: justify;">No dia 12 de outubro de 1916, uma quinta-feira, dia de Nossa Senhora Aparecida, o Santos inaugurava sua pioneira Praça de Esportes, localizada no bairro de Vila Belmiro, antiga Vila Operária.</p>
                <p class="lead" style="text-align: justify;">Antes da inauguração da sua Praça de Esportes na Vila Belmiro, o Santos treinava e realizava até algumas partidas em seu campo na rua Aguiar de Andrade, atual Manoel Tourinho, entre as ruas Lowndes e Emílio Ribas, no Macuco, mas sem as dimensões e acomodações necessárias, a questão do campo passou a caráter de urgência.</p>
                <p class="lead" style="text-align: justify;">No início, a opção mais atraente era um terreno examinado por Urbano Caldeira em boas condições de edificar o campo esportivo, localizado no Campo Grande. Porém, em reunião de 14 de abril de 1916, coincidentemente o 4º aniversário do clube, Luiz Suplicy Junior comunicou à diretoria que a Companhia Construtora de Santos propunha fornecer um campo completo, vendendo-o em prestações mensais.</p>
                <p class="lead" style="text-align: justify;">Em assunto de tamanha importância como a aquisição de um patrimônio dessa relevância para os destinos do clube, todos os aspectos foram discutidos. A proposta da Companhia Santista de Habitações Econômicas e respectivo exame da planta do terreno se mostrou a mais viável.</p>
                <p class="lead" style="text-align: justify;">Portanto, em 10 de junho, o presidente fechou as negociações para compra de terreno com a Companhia Santista de Habitações Econômicas. A minuta foi lida e registrada em Ata no dia 23 de junho de 1916.</p>
                <p class="lead" style="text-align: justify;">O campo do Santos, já não era sem tempo, estava prestes a ser inaugurado. Em reunião de diretoria de 11 de outubro, foi lido um ofício da Associação Paulista de Sports Athléticos (APSA), “nomeando comissão que examinará o ground deste club”. A mesma, em comum acordo com o clube, concordou com a transferência do jogo Ypiranga x Santos que deveria realizar-se no dia 12 para o dia 22 próximo.</p>
                <p class="lead" style="text-align: justify;">No dia festivo aconteceram várias partidas e brincadeiras entre os associados. Foi o adeus aos jogos nos campos situados nas avenidas Ana Costa e Conselheiro Nébias. Apenas o campo alugado pelo clube em 1912, na Vila Macuco, continuou sendo usado para os jogos da liga interna do clube até 1917.</p>
                <p class="lead" style="text-align: justify;">Em 12 de outubro, o Santos inaugurava a sua Praça de Esportes.</p>
                <p class="lead" style="text-align: justify;">Quando o estádio santista foi fundado era chamado apenas de “Campo do Santos”, ou “Praça de Esportes do Santos”. Com o passar dos anos, o nome do bairro virou também o apelido do estádio. Em 24 de março de 1933, após o falecimento de Urbano Caldeira, o campo passou a se chamar, oficialmente, Estádio Urbano Caldeira. A sugestão foi feita por Ricardo Pinto de Oliveira em homenagem ao maior abnegado da história santista.</p>
                <p class="lead" style="text-align: justify;">Em que pese o nome oficial, o estádio do Alvinegro é mais conhecido por Vila Belmiro. Com o passar dos anos recebeu ainda as denominações populares de “Alçapão da Vila” e “Vila mais famosa do mundo”.</p>
                <p class="lead" style="text-align: justify;">O famoso apelido de “Alçapão” – imortalizado na marchinha “Leão do Mar” – composta por Maugeri Neto e Maugeri Sobinho para comemorar o título paulista de 1955, foi criado bem antes, em 1930, pelo jornalista Antonio Guenaga, do jornal A Tribuna. Naquele ano o Santos permaneceu invicto em 25 partidas jogadas em seu estádio.</p>
                <p class="lead" style="text-align: justify;">O Rei Pelé é o maior artilheiro do estádio santista com 288 gols, seguido por Feitiço com 162 e Pepe com 152.</p>
                <div class="my-3 d-flex flex-md-row justify-content-around flex-column gap-3 gap-md-0">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                          <img src="./img/Foto-Fabio-Maradei-1.jpeg" alt="" class="img-fluid h-100">
                        </div>
                        <div class="col">
                          <img src="./img/Foto-Fabio-Maradei-2.jpeg" alt="" class="img-fluid h-100">
                        </div>
                        <div class="col">
                          <img src="./img/Foto-tu.drone_.jpeg" alt="" class="img-fluid h-100">
                        </div>
                        <div class="col">
                          <img src="./img/Foto-tu.drone-2.jpeg" alt="" class="img-fluid h-100">
                        </div>
                        <div class="col">
                          <img src="./img/Foto-tu.drone-3.jpeg" alt="" class="img-fluid h-100">
                        </div>
                        <div class="col">
                          <img src="./img/Foto-tu.drone-4-1.jpeg" alt="" class="img-fluid h-100">
                        </div>
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