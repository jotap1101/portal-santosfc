<?php
require_once("./php/connection.php");
require_once("./php/checkout-login.php");
require_once("./perfil-read.php");
 
$id = (!isset($_GET['id']) ? NULL : $_GET['id']);
 
if (isset($_POST['update-password'])) {
    $password = $_POST['password'];
    $oldPassword = mysqli_real_escape_string($conn, $_POST['old-password']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['new-password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm-password']);
 
    $checkPassword = password_verify($oldPassword, $password);
 
    if (!empty($oldPassword) || !empty($newPassword) || !empty($confirmPassword)) {
        if ($checkPassword === false) {
            echo '<script>
                        alert("Senha antiga incorreta!");
                        setTimeout(function() {
                            window.location.href = "perfil.php";
                        }, 100);
                    </script>';
        } elseif ($newPassword !== $confirmPassword) {
            echo '<script>
                        alert("As senhas não conferem!");
                        setTimeout(function() {
                            window.location.href = "perfil.php";
                        }, 100);
                    </script>';
        } else {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
 
            $sql = "UPDATE usuarios SET senha = '$hashedPassword' WHERE id = '$user'";
            $result = mysqli_query($conn, $sql);
 
            if ($result) {
                echo '<script>
                        alert("Senha alterada com sucesso!!");
                        setTimeout(function() {
                            window.location.href = "perfil.php";
                        }, 100);
                    </script>';
 
                $_POST['password'] = "";
                $_POST['old-password'] = "";
                $_POST['new-password'] = "";
                $_POST['confirm-password'] = "";
            } else {
                echo '<script>
                        alert("Não foi possível alterar a senha!");
                        setTimeout(function() {
                            window.location.href = "perfil.php";
                        }, 100);
                    </script>';
            }
        }
    } else {
        echo '<script>
                alert("Preencha todos os campos!");
                setTimeout(function() {
                    window.location.href = "perfil.php";
                }, 100);
            </script>';
    }
} else {
    // echo '<script>
    //         alert("Insira as informações!");
    //         setTimeout(function() {
    //             window.location.href = "perfil.php";
    //         }, 100);
    //     </script>';
}