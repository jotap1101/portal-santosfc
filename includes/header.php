<?php
    require_once("./perfil-read.php");
?>

<header>
    <nav>
        <input type="checkbox" id="show-menu">
        <label for="show-menu" class="menu-icon">
            <i class="fas fa-bars"></i>
        </label>
        <div class="content">
            <div class="logo">
                <a href="./index.php">Santos FC</a>
            </div>
        </div>
        <ul class="links-nav">
            <li><a href="noticias.php">Notícias</a></li>
            <li>
                <a href="#" class="desktop-link">Clube <i class='bx bx-chevron-down'></i></a>
                <input type="checkbox" id="show-clube">
                <label for="show-clube">Clube <i class='bx bx-chevron-down'></i></label>
                <ul>
                    <li><a href="vila-belmiro.php">Vila Belmiro</a></li>
                    <li><a href="ct.php">CT Rei Pelé</a></li>
                    <li><a href="memorial.php">Memorial das conquistas</a></li>
                </ul>
            </li>
            <li><a href="elenco.php">Elenco</a></li>
            <li><a href="pele.php">Pelé</a></li>
            <li>
                <a href="#" class="desktop-link">História <i class='bx bx-chevron-down'></i></a>
                <input type="checkbox" id="show-historia">
                <label for="show-historia">História <i class='bx bx-chevron-down'></i></label>
                <ul>
                    <li><a href="fundacao.php">Fundação</a></li>
                    <li><a href="titulos.php">Títulos</a></li>
                    <!-- <li><a href="#">Ídolos</a></li> -->
                    <li><a href="escudos.php">Escudos</a></li>
                    <li><a href="hino.php">Hino Oficial</a></li>
                </ul>
            </li>
            <!-- <li><a href="contato.php">Contato</a></li> -->
        </ul>
        <?php
        if ($fetchImage === '' || $fetchImage === NULL) {
        ?>
            <img src="./img/default-avatar.png" alt="avatar" class="rounded-circle img-fluid" style="width: 40px; height: 40px; object-fit: cover;" id="image-profile">
        <?php
        } else {
        ?>
            <img src="<?= $fetchImage ?>" alt="outro" class="rounded-circle img-fluid" style="width: 40px; height: 40px; object-fit: cover;" id="image-profile">
        <?php
        }
        ?>
        <div class="account-box">
            <p>Usuário: <span><?= $fetchName ?></span></p>
            <p>Email: <span><?= $fetchEmail ?></span></p>
            <div class="acoes">
                <a href="perfil.php" class="btn-profile">Configurações</a>
                <a href="php/logout.php" class="btn-profile" onclick="return confirm('Deseja realizar o logout?');">Logout</a>
            </div>
        </div>
    </nav>
</header>