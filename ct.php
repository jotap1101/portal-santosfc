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
    <title>CT Rei Pelé - Santos FC</title>
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
                        <li class="breadcrumb-item active" aria-current="page">CT Rei Pelé</li>
                    </ol>
                </nav>
            </div>
        </div>
        <main>
            <h2 class="display-4">CT Rei Pelé</h2>
            <div class="container">
                <p class="lead" style="text-align: justify;">O projeto da construção do CT começou na primeira gestão de Marcelo Pirilo Teixeira como presidente do Santos Futebol Clube (92/93), quando o time da Vila Belmiro conseguiu, junto à Prefeitura Municipal de Santos e à Companhia Docas do Estado de São Paulo (Codesp), a posse de um terreno, estrategicamente localizado (próximo à Vila Belmiro e a entrada da cidade), que seria transformado no primeiro centro de treinamentos do time Alvinegro.</p>
                <p class="lead" style="text-align: justify;">No local, até então chamado de Conjunto Poliesportivo Chico Guimarães da Prefeitura de Santos, a equipe profissional e as divisões de base do Santos FC já realizavam alguns treinos. O espaço também era utilizado para a realização de torneios e jogos de equipes amadoras da cidade.</p>
                <p class="lead" style="text-align: justify;">Com a conquista do terreno, a área, de cerca de 40 mil metros quadrados, foi recebendo uma série de reformas e construções para hoje receber a denominação de Centro de Treinamento Rei Pelé, sendo considerado um dos mais modernos e bem equipados centro de treinamentos do país. Nele treinam as equipes Sub-20 e profissional do Santos FC.</p>
                <p class="lead" style="text-align: justify;">O CT é utilizado para as movimentações físicas, técnicas e táticas de todo o departamento de Futebol do clube. Há ainda uma caixa de areia, utilizada para treinamentos físicos específicos. Além disso, o CT Rei Pelé também é sede de amistosos e jogos oficiais dos times amadores.</p>
                <p class="lead" style="text-align: justify;">Depois de reestruturado e com novas instalações, o CT se tornou um centro de referência no cenário futebolístico brasileiro. Quando inaugurado no início de outubro de 2005, a primeira fase do Complexo Modesto Roma I contava com vestiário principal, piscina de recuperação física, capela ecumênica, sala de musculação, sala de massagem, unidade de saúde, centro de reabilitação avançada, sala de atendimento médico, sala do departamento de futebol, sala da gerência de futebol, sala do departamento técnico, sala do treinador, sala da comissão técnica e sala da assessoria especializada a rouparia.</p>
                <p class="lead" style="text-align: justify;">A primeira fase do Complexo Modesto Roma, o CT Rei Pelé, foi inaugurada em 1º de outubro de 2005, com a finalização de toda a estrutura necessária para que os atletas e a comissão técnica possam realizar o trabalho físico do dia a dia. O espaço conta com três campos e instalações modernas como piscina para recuperação física e fisioterápica, moderna sala de musculação, vestiários, salas de gerência, administração, fisiologia, psicóloga e assessoria especializada.</p>
                <p class="lead" style="text-align: justify;">No local existe o Hotel Recanto dos Alvinegros, onde os atletas ficam concentrados antes das partidas do time. São disponibilizadas 28 suítes, com televisão a cabo, pontos de Internet, ar condicionado e frigobar, além de salão de jogos, auditório e refeitório. O CT Rei Pelé possui também uma área destinada aos jornalistas que cobrem o Santos FC, com espaço para coletivas de imprensa e acesso aos treinos.</p>
                <p class="lead" style="text-align: justify;">O vestiário principal, destinado ao uso exclusivo para os atletas do time profissional, tem 36 armários individuais, 4 banheiras de hidromassagem e 1 piscina spa, além de espaçoso e com privacidade para os atletas utilizarem em seu trabalho diário dentro do CT.</p>
                <p class="lead" style="text-align: justify;">A piscina do Complexo Modesto Roma tem 20 metros de comprimento e possui uma raia preparada especialmente para a natação dos atletas. A idéia das áreas técnicas do clube é utilizar esta piscina na recuperação e preparação dos jogadores, dentro dos conceitos modernos de educação física. A piscina possui aquecimento térmico e foi construída de acordo com as orientações dos profissionais envolvidos com a preparação atlética dos jogadores.</p>
                <p class="lead" style="text-align: justify;">A sala de musculação é integrada aos departamentos de fisiologia, fisioterapia, medicina e nutrição e contam com equipamentos modernos para atender os atletas e as necessidades da comissão técnica.</p>
                <p class="lead" style="text-align: justify;">As salas para trabalho dos profissionais ligados à administração, gerência, fisiologia, massagem, fisioterapia, nutrição, medicina e parte técnica foram reformadas e estão agregadas em uma distribuição que facilita a integração do trabalho no dia a dia.</p>
                <p class="lead" style="text-align: justify;">O CT ainda conta com a sala de imprensa Peirão de Castro, que facilita o trabalho dos jornalistas que cobrem o clube. O local possui painéis com os patrocinadores oficiais, onde os jogadores e comissão técnica concedem entrevistas aos veículos de imprensa.</p>
                <p class="lead" style="text-align: justify;">Com a segunda fase do Complexo Modesto Roma, o CT passou a contar com um hotel de 28 quartos, um amplo restaurante, sala de jogos, cozinha, recepção e auditório para utilização em preleções e reuniões dos atletas.</p>
                <div class="my-3 d-flex flex-md-row justify-content-around flex-column gap-3 gap-md-0">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <img src="./img/CT-Rei-Pele-1-1.jpeg" alt="" class="img-fluid h-100">
                        </div>
                        <div class="col">
                            <img src="./img/CT-Rei-Pele-2-1.jpeg" alt="" class="img-fluid h-100">
                        </div>
                        <div class="col">
                            <img src="./img/CT-Rei-Pele-3-1.jpeg" alt="" class="img-fluid h-100">
                        </div>
                        <div class="col">
                            <img src="./img/CT-Rei-Pele-4-1.jpeg" alt="" class="img-fluid h-100">
                        </div>
                        <div class="col">
                            <img src="./img/CT-Rei-Pele-5-1.jpeg" alt="" class="img-fluid h-100">
                        </div>
                        <div class="col">
                            <img src="./img/CT-Rei-Pele-6-1.jpeg" alt="" class="img-fluid h-100">
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