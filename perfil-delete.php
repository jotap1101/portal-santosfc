<?php
    require_once("./php/connection.php");
    require_once("./php/checkout-login.php");

    $id = (!isset($_GET['id']) ? NULL : $_GET['id']);

    $sql = "DELETE usuarios, dados, redes_sociais, log FROM usuarios INNER JOIN dados ON usuarios.id = dados.id_usuario INNER JOIN redes_sociais ON usuarios.id = redes_sociais.id_usuario INNER JOIN log ON usuarios.id = log.id_usuario WHERE usuarios.id = '$id' AND dados.id_usuario = '$id' AND redes_sociais.id_usuario = '$id' AND log.id_usuario = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        echo '<script>
                alert("Conta excluída com sucesso!");
                setTimeout(function() {
                    window.location.href = "index.php?delete=success";
                }, 100);
            </script>';
    } else {
        echo '<script>
                alert("Erro ao excluir conta!");
                setTimeout(function() {
                    window.location.href = "perfil.php?delete=error";
                }, 100);
            </script>';
    }

    mysqli_close($conn);
?>