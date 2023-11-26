<?php
require_once("./php/connection.php");
?>

<div class="col-md-4">
    <div class="position-sticky" style="top: 6rem;">
        <!-- <div class="p-4 mb-3 bg-light rounded">
                                <h4 class="fst-italic">About</h4>
                                <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
                            </div> -->

        <div class="card mb-4">
            <h5 class="card-header">Pesquisar</h5>
            <div class="card-body">
                <form name="search" action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="searchtitle" class="form-control" placeholder="Digite aqui" required>
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">Buscar</button>
                        </span>
                </form>
            </div>
        </div>
    </div>

    <div class="p-4">
        <h4 class="fst-italic">Categorias</h4>
        <ol class="list-unstyled mb-0">
            <?php
            $sql = "SELECT * FROM noticias LIMIT 8";
            $result = mysqli_query($conn, $sql);

            while ($fetch = mysqli_fetch_assoc($result)) {
            ?>
                <li><a href="info-categoria.php?categoria=<?= $fetch['categoria'] ?>"><?= $fetch['categoria'] ?></a></li>
            <?php
            }
            ?>
        </ol>
    </div>

    <div class="p-4">
        <h4 class="fst-italic">Últimas notícias</h4>
        <ol class="list-unstyled">
            <?php
            $sql = "SELECT * FROM noticias ORDER BY id DESC LIMIT 5";
            $result = mysqli_query($conn, $sql);

            while ($fetch = mysqli_fetch_assoc($result)) {
            ?>
                <li><a href="info-noticia.php?id=<?= $fetch['id'] ?>"><?= substr($fetch['titulo'], 0, 30) . "..."; ?></a></li>
            <?php
            }
            ?>
        </ol>
    </div>
</div>