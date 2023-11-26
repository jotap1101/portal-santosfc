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
    <title>Títulos - Santos FC</title>
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
                        <li class="breadcrumb-item active">História</li>
                        <li class="breadcrumb-item active" aria-current="page">Títulos</li>
                    </ol>
                </nav>
            </div>
        </div>
        <main>
            <h2 class="display-4">Títulos</h2>
            <div class="d-flex flex-md-row flex-column gap-md-5">
                <ul class="lead lh-lg fs-6">
                    <li>1913 – Campeão Santista (invicto)</li>
                    <li>1915 – Bicampeão Santista (invicto)</li>
                    <li>1926 – Campeão Torneio Início Extra</li>
                    <li>1928 – Campeão Torneio Início (Apea)</li>
                    <li>1929 - Campeão Santista</li>
                    <li>1930 – Campeão do Torneio Início Santista</li>
                    <li>1935 – Campeão Paulista (LPF)</li>
                    <li>1937 – Campeão do Torneio Início (LPF)</li>
                    <li>1948 – Campeão da Taça Cidade de Santos</li>
                    <li>1948 – Vencedor da Taça das Taças (Cidade de Santos x Cidade de São Paulo)</li>
                    <li>1949 – Campeão da Taça Cidade de São Paulo</li>
                    <li>1951 – Torneio Quadrangular de Belo Horizonte (Campeão Invicto)</li>
                    <li>1952 – Campeão do Torneio Início (FPF)</li>
                    <li>1952 – Campeão da Taça Santos F.C.</li>
                    <li>1955 – Campeão Paulista (2º)</li>
                    <li>1956 – Campeão da Taça Gazeta Esportiva (24 jogos invicto)</li>
                    <li>1956 – Campeão do Torneio Internacional da FPF</li>
                    <li>1956 – Campeão do Torneio de Classificação (17 jogos invicto)</li>
                    <li>1956 – Bicampeão Paulista (3º)</li>
                    <li>1958 – Campeão Paulista (4º)</li>
                    <li>1959 – Campeão da Taça Dr. Mário Echandi (Costa Rica)</li>
                    <li>1959 – Campeão do Torneio Pentagonal do México</li>
                    <li>1959 – Campeão do Torneio Rio/São Paulo</li>
                    <li>1959 – Troféu Tereza Herrera (Espanha)</li>
                    <li>1959 – Torneio de Valencia (Espanha)</li>
                    <li>1960 – Troféu de Gialorosso (Itália)</li>
                    <li>1960 – Campeão do IV Torneio de Paris</li>
                    <li>1960 – Campeão Paulista (5º)</li>
                    <li>1961 – Campeão do Torneio da Costa Rica</li>
                    <li>1961 – Campeão do Torneio Pentagonal de Guadalajara (México)</li>
                    <li>1961 – Bicampeão do Torneio de Paris</li>
                    <li>1961 – Campeão do Torneio Itália</li>
                    <li>1961 – Bicampeão Paulista (6º)</li>
                    <li>1961 – Campeão Brasileiro (Taça Brasil)</li>
                    <li>1962 – Bicampeão Brasileiro (Taça Brasil)</li>
                    <li>1962 – Campeão da Taça Libertadores da América</li>
                    <li>1962 – Tricampeão Paulista (7º)</li>
                    <li>1962 – Campeão Mundial Interclubes</li>
                    <li>1963 – Tricampeão Brasileiro (Taça Brasil)</li>
                    <li>1963 – Campeão do Torneio Rio/São Paulo)</li>
                    <li>1963 – Bicampeão da Taça Libertadores da América</li>
                    <li>1963 – Bicampeão Mundial Interclubes</li>
                    <li>1964 – Bicampeão do Torneio Roberto Gomes Pedrosa(Rio/S. Paulo)</li>
                    <li>1964 – Campeão Paulista (8º)</li>
                    <li>1964 – Tetracampeão Brasileiro (Taça Brasil)</li>
                    <li>1965 – Campeão do Torneio Hexagonal do Chile</li>
                    <li>1965 – Campeão do Torneio de Caracas (Venezuela)</li>
                    <li>1965 – Campeão do Torneio Quadrangular de Buenos Aires (Argentina)</li>
                    <li>1965 – Bicampeão Paulista (9º)</li>
                    <li>1965 – Pentacampeão Brasileiro (Taça Brasil)</li>
                </ul>
                <ul class="lead lh-lg fs-6">
                    <li>1966 – Campeão do Torneio Rio/São Paulo</li>
                    <li>1966 – Campeão do Torneio de Nova York</li>
                    <li>1967 – Campeão Paulista (10º)</li>
                    <li>1967 – Campeão do Torneio Triangular de Roma/Florença</li>
                    <li>1967 – Campeão do Torneio Rubens Ulhoa Cintra (Cidade de Santos)</li>
                    <li>1968 – Campeão do Torneio Amazônia</li>
                    <li>1968 – Campeão do Torneio Octogonal Chile (Nicolau Moran)</li>
                    <li>1968 – Bicampeão Paulista (11º)</li>
                    <li>1968 – Hexacampeão Brasileiro – Torneio Roberto Gomes Pedrosa (1ª Taça de Prata)</li>
                    <li>1968 – Campeão da Recopa – Sul-Americano Interclubes (68/69)</li>
                    <li>1969 – Campeão Torneio Pentagonal de Buenos Aires</li>
                    <li>1969 – Campeão da Recopa – Mundial Interclubes</li>
                    <li>1969 – Tricampeão Paulista (12º)</li>
                    <li>1969 – Torneio de Cuiabá</li>
                    <li>1970 – Torneio Hexagonal do Chile</li>
                    <li>1970 – Taça Cidade de São Paulo</li>
                    <li>1970 – Torneio Triangular da Guatemala</li>
                    <li>1971 – Torneio de kingston – Jamaica</li>
                    <li>1972 – Fita Azul do Futebol Brasileiro (17 partidas invicto)</li>
                    <li>1973 – Campeão Paulista (13º)</li>
                    <li>1975 – Torneio Laudo Natel (Governador do Estado de São Paulo)</li>
                    <li>1975 – Torneio Governador da Bahia (Roberto Santos)</li>
                    <li>1977 – Torneio Hexagonal do Chile</li>
                    <li>1977 – Campeão da Copa Governador Luiz Ducoing Leon/México</li>
                    <li>1978 – Campeão Paulista (14º)</li>
                    <li>1983 – Campeão do Torneio Vencedores da América (Uruguai)</li>
                    <li>1983 – Campeão do Torneio Cidade de Pamplona (Espanha)</li>
                    <li>1984 – Campeão do Torneio Início da FPF</li>
                    <li>1984 – Campeão da Taça dos Invictos da Gazeta Esportiva Nova Série (15 partidas)</li>
                    <li>1984 – Campeão Paulista (15º)</li>
                    <li>1985 – Campeão do Torneio Copa Kirim (Japão)</li>
                    <li>1987 – Campeão do Torneio Cidade de Marseille (França)</li>
                    <li>1990 – Campeão da Super Copa Americana (Taiwan)</li>
                    <li>1994 – Campeão da Copa Denner</li>
                    <li>1996 – Campeão do Torneio de Verão (Santos)</li>
                    <li>1997 – Campeão do Torneio Rio/São Paulo (5º)</li>
                    <li>1998 – Campeão da Copa Conmebol</li>
                    <li>2002 – Heptacampeão Brasileiro</li>
                    <li>2004 – Copa Federação Paulista de Futebol (Santos B)</li>
                    <li>2004 – Octacampeão brasileiro</li>
                    <li>2006 – Campeão Paulista (16º)</li>
                    <li>2007 – Bicampeão Paulista (17º)</li>
                    <li>2010 – Campeão Paulista (18º)</li>
                    <li>2010 – Campeão da Copa do Brasil</li>
                    <li>2011 – Bicampeão Paulista (19º)</li>
                    <li>2011 – Campeão da Taça Libertadores da América (3º)</li>
                    <li>2012 – Tricampeão Paulista (20º)</li>
                    <li>2012 – Campeão da Recopa Sul-Americana (1º)</li>
                    <li>2015 – Campeão Paulista (21º)</li>
                    <li>2016 – Campeão Paulista (22º)</li>
                </ul>
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