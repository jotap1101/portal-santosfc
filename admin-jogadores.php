<?php
require_once("./php/checkout-login.php");
require_once("./php/connection.php");

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['id_adm'])) {
    echo '<script>
            alert("Você não possui esse nível de acesso!");
            setTimeout(function() {
                window.location.href = "./index.php";
            }, 100);
        </script>';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do administrador - Jogadores</title>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/admin.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Painel do administrador</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav w-100">
            <div class="nav-item text-nowrap text-end">
                <a class="nav-link px-3" href="./php/logout.php">Logout</a>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse pt-5 px-3">
                <div class="position-sticky pt-3">
                    <ul class="list-unstyled ps-0">
                        <a class="btn d-inline-flex align-items-center rounded border-0 collapsed text-success fw-bold" href="./admin-dashboard.php">
                            Dashboard
                        </a>
                        <br>
                        <a class="btn d-inline-flex align-items-center rounded border-0 collapsed" href="./admin-usuarios.php">
                            Usuários
                        </a>
                        <br>
                        <a class="btn d-inline-flex align-items-center rounded border-0 collapsed" href="admin-mensagens.php">
                            Mensagens
                        </a>
                        <br>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#conteudo-collapse" aria-expanded="false">
                                Conteúdo
                            </button>
                            <div class="collapse" id="conteudo-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="admin-jogadores.php" class="link-dark d-inline-flex text-decoration-none rounded">Jogadores</a></li>
                                    <li><a href="admin-conquistas.php" class="link-dark d-inline-flex text-decoration-none rounded">Conquistas</a></li>
                                    <li><a href="admin-videos.php" class="link-dark d-inline-flex text-decoration-none rounded">Vídeos</a></li>
                                    <li><a href="admin-noticias.php" class="link-dark d-inline-flex text-decoration-none rounded">Notícias</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="border-top my-3"></li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h1">Gerenciar jogadores</h1>
                </div>
                <!-- Botão -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adicionarJogador">Adicionar Jogador</button>

                <!-- Tabela -->
                <div class="table-responsive mt-3">
                    <table class="table table-striped table-sm" id="myTable">
                        <caption>Jogadores cadastrados</caption>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Data de nascimento</th>
                                <th scope="col">Naturalidade</th>
                                <th scope="col">Posição</th>
                                <th scope="col">Número da camisa</th>
                                <th scope="col">Jogos</th>
                                <th scope="col">Gols</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM jogadores";
                            $result = mysqli_query($conn, $sql) or die('Erro no banco de dados!');

                            while ($fetch = mysqli_fetch_assoc($result)) {
                                $data_nascimento = new DateTime($fetch['data_nascimento']);
                            ?>
                                <tr>
                                    <td><?= $fetch['id'] ?></td>
                                    <td><?= $fetch['nome'] ?></td>
                                    <td><?= ($fetch['data_nascimento'] == NULL) ? "-" : $data_nascimento->format('d/m/Y') ?></td>
                                    <td><?= $fetch['naturalidade'] ?></td>
                                    <td><?= $fetch['posicao'] ?></td>
                                    <td><?= $fetch['numero'] ?></td>
                                    <td><?= $fetch['jogos'] ?></td>
                                    <td><?= $fetch['gols'] ?></td>
                                    <td>
                                        <button type="button" value="<?= $fetch['id']; ?>" class="btnVisualizarJogador btn btn-info btn-sm">Visualizar</button>
                                        <a href="admin-editar.php?page=jogador&id=<?= $fetch['id']; ?>" type="button" value="<?= $fetch['id']; ?>" class="btnEditarJogador btn btn-success btn-sm">Editar</a>
                                        <button type="button" value="<?= $fetch['id']; ?>" class="btnExcluirJogador btn btn-danger btn-sm">Excluir</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- modal adicionar -->
                <div class="modal fade" id="adicionarJogador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo jogador</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="" enctype="multipart/form-data" id="adicionar">
                                    <div id="errorMessage" class="alert alert-warning d-none"></div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nome do jogador</label>
                                        <input type="text" class="form-control" name="nome" autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Data de nascimento</label>
                                        <input type="date" name="data_nascimento" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Cidade</label>
                                        <input type="text" name="cidade" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Estado</label>
                                        <select name="estado" class="form-select" aria-label="Default select example">
                                            <option selected>Selecione uma opção</option>
                                            <option value="Outro">Outro</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Número da camisa</label>
                                        <input type="number" name="numero" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Número de jogos</label>
                                        <input type="number" name="jogos" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Número de gols</label>
                                        <input type="number" name="gols" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-2 d-inline-flex pt-0">Posição</legend>
                                            <div class="col-sm-10 d-flex flex-wrap gap-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="posicao" id="gridRadios1" value="Goleiro">
                                                    <label class="form-check-label" for="gridRadios1">Goleiro</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="posicao" id="gridRadios2" value="Zagueiro" autocomplete="off">
                                                    <label class="form-check-label" for="gridRadios2">Zagueiro</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="posicao" id="gridRadios3" value="Lateral" autocomplete="off">
                                                    <label class="form-check-label" for="gridRadios3">Lateral</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="posicao" id="gridRadios4" value="Volante" autocomplete="off">
                                                    <label class="form-check-label" for="gridRadios4">Volante</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="posicao" id="gridRadios5" value="Meio-campo" autocomplete="off">
                                                    <label class="form-check-label" for="gridRadios5">Meio campo</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="posicao" id="gridRadios6" value="Atacante" autocomplete="off">
                                                    <label class="form-check-label" for="gridRadios6">Atacante</label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Imagem do jogador</label>
                                        <input class="form-control form-control-sm" type="file" name="imagem">
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal visualizar -->
                <div class="modal fade" id="visualizarJogador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Visualizar jogador</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome do jogador</label>
                                    <p id="view_nome" class="form-control"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="data_nascimento" class="form-label">Data de nascimento</label>
                                    <p id="view_data_nascimento" class="form-control"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="naturalidade" class="form-label">Naturalidade</label>
                                    <p id="view_naturalidade" class="form-control"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Número da camisa</label>
                                    <p id="view_numero" class="form-control"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="jogos" class="form-label">Número de jogos</label>
                                    <p id="view_jogos" class="form-control"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="gols" class="form-label">Número de gols</label>
                                    <p id="view_gols" class="form-control"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="posicao" class="form-label">Posição</label>
                                    <p id="view_posicao" class="form-control"></p>
                                </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="./js/admin.js"></script>
    <script>
        $(document).on('submit', '#adicionar', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("adicionar_jogador", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    } else if (res.status == 200) {

                        $('#errorMessage').addClass('d-none');
                        $('#adicionarJogador').modal('hide');
                        $('#adicionar')[0].reset();

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    } else if (res.status == 500) {
                        alert(res.message);
                    }
                }
            });
        });

        $(document).on('click', '.btnVisualizarJogador', function() {

            var idJogador = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?idJogador=" + idJogador,
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {
                        alert(res.message);
                    } else if (res.status == 200) {
                        $('#view_nome').text(res.data.nome);
                        $('#view_data_nascimento').text(res.data.data_nascimento);
                        $('#view_naturalidade').text(res.data.naturalidade);
                        $('#view_numero').text(res.data.numero);
                        $('#view_posicao').text(res.data.posicao);
                        $('#view_jogos').text(res.data.jogos);
                        $('#view_gols').text(res.data.gols);

                        $('#visualizarJogador').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.btnExcluirJogador', function(e) {
            e.preventDefault();

            if (confirm('Deseja excluir este jogador?')) {
                var idJOgador = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'excluir_jogador': true,
                        'idJogador': idJOgador
                    },
                    success: function(response) {

                        var res = jQuery.parseJSON(response);
                        if (res.status == 500) {

                            alert(res.message);
                        } else {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable').load(location.href + " #myTable");
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>