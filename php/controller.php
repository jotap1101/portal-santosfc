<?php
require_once("connection.php");
date_default_timezone_set('America/Sao_Paulo');

$errors = array();
$msgs = array();

function emptyInputsLogin($email, $password)
{
    if (!empty(trim($email)) || !empty(trim($password))) {
        return true;
    } else {
        return false;
    }
}

function emptyInputsSignin($name, $email, $password, $passwordConfirm)
{
    if (!empty(trim($name)) || !empty(trim($email)) || !empty(trim($password)) || !empty(trim($passwordConfirm))) {
        return true;
    } else {
        return false;
    }
}

function validateName($name)
{
    $virginName = $name;

    $regex = "/^([a-zA-Z' ]+)$/";

    if (preg_match($regex, $virginName)) {
        return true;
    } else {
        return false;
    }
}

function validateEmail($email)
{
    $virginEmail = $email;
    $pureEmail = filter_var($virginEmail, FILTER_SANITIZE_EMAIL);
    $validEmail = filter_var($pureEmail, FILTER_VALIDATE_EMAIL);

    $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";

    if (preg_match($regex, $validEmail)) {
        return true;
    } else {
        return false;
    }
}

function validatePasswordSignin($password, $passwordConfirm)
{
    $virginPassword = $password;
    $lengthPassword = strlen($virginPassword);

    if (!($virginPassword !== $passwordConfirm)) {
        return true;
    } else {
        return false;
    }
}

function emptyInputsContact($name, $surname, $email, $phone)
{
    if (!empty(trim($name)) || !empty(trim($surname)) || !empty(trim($email)) || !empty(trim($phone))) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        $emptyInputs = emptyInputsLogin($_POST['email'], $_POST['password']);

        if ($emptyInputs === true) {
            $email = mysqli_real_escape_string($conn, trim($_POST['email']));
            $password = mysqli_real_escape_string($conn, trim($_POST['password']));

            $validateEmail = validateEmail($email);

            if ($validateEmail === true) {
                $sql = "SELECT * FROM usuarios INNER JOIN dados ON usuarios.id = dados.id_usuario WHERE usuarios.email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_num_rows($result);

                if ($rows > 0) {
                    $fetch = mysqli_fetch_assoc($result);

                    $fetchTypeUser = $fetch['tipo_usuario'];

                    $fetchPassword = $fetch['senha'];
                    $checkPassword = password_verify($password, $fetchPassword);

                    if ($checkPassword === true) {
                        if ($fetchTypeUser === "visitante") {
                            session_start();

                            $_SESSION['id'] = $fetch['id'];
                            $_SESSION['name'] = $fetch['nome'];
                            $_SESSION['image'] = $fetch['imagem'];
                            $_SESSION['email'] = $fetch['email'];
                            $_SESSION['create_date'] = $fetch['data_criacao'];
                            $_SESSION['update_date'] = $fetch['data_atualizacao'];
                            $_SESSION['type_user'] = $fetch['tipo_usuario'];
                            $_SESSION['logged_in'] = true;

                            $dateTime = date("Y-m-d H:i:s");

                            header("Location: perfil.php?logged=true");
                        } else if ($fetchTypeUser === "administrador") {
                            session_start();

                            $_SESSION['id_adm'] = $fetch['id'];
                            $_SESSION['name_adm'] = $fetch['nome'];
                            $_SESSION['email_adm'] = $fetch['email'];
                            $_SESSION['create_date_adm'] = $fetch['data_criacao'];
                            $_SESSION['update_date_adm'] = $fetch['data_atualizacao'];
                            $_SESSION['type_user'] = $fetch['tipo_usuario'];
                            $_SESSION['logged_in'] = true;

                            $dateTime = date("Y-m-d H:i:s");

                            header("Location: admin-dashboard.php?logged=true");
                        }
                    } else {
                        $errors['email-password'] = "Email ou senha incorretos!";
                    }
                } else {
                    $errors['email-password'] = "Usuário não encontrado!";
                }
            } else {
                $errors['email'] = "Digite o email corretamente!";
            }
        } else {
            $errors['empty-inputs'] = "Preencha todos os campos!";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['signin'])) {
        $emptyInputs = emptyInputsSignin($_POST['name'], $_POST['email'], $_POST['password'], $_POST['password-confirm']);

        if ($emptyInputs === true) {
            $name = mysqli_real_escape_string($conn, trim($_POST['name']));
            $surname = mysqli_real_escape_string($conn, trim($_POST['surname']));
            $email = mysqli_real_escape_string($conn, trim($_POST['email']));
            $password = mysqli_real_escape_string($conn, trim($_POST['password']));
            $passwordConfirm = mysqli_real_escape_string($conn, trim($_POST['password-confirm']));

            $validateName = validateName($name);

            if ($validateName === false) {
                $errors['name'] = "Nome inválido! ";
            }

            $validatePassword = validatePasswordSignin($password, $passwordConfirm);

            if ($validatePassword === false) {
                $errors['password'] = "As senhas não conferem! ";
            }

            $validateEmail = validateEmail($email);

            if ($validateEmail === false) {
                $errors['email'] = "Digite o email corretamente! ";
            }

            $sql = "SELECT * FROM usuarios INNER JOIN dados WHERE usuarios.email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);

            if ($rows > 0) {
                $errors['account'] = "Este endereço de email já existe!";
            }

            if (count($errors) === 0) {
                $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

                $sqlInsert1 = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$encryptedPassword')";
                $resultInsert1 = mysqli_query($conn, $sqlInsert1);

                $lastId1 = mysqli_insert_id($conn);

                $sqlInsert2 = "INSERT INTO dados (id_usuario, nome, sobrenome) VALUES ('$lastId1', '$name', '$surname')";
                $resultInsert2 = mysqli_query($conn, $sqlInsert2);

                $lastId2 = mysqli_insert_id($conn);

                $sqlInsert3 = "INSERT INTO redes_sociais (id_usuario) VALUES ('$lastId2')";
                $resultInsert3 = mysqli_query($conn, $sqlInsert3);

                $lastId3 = mysqli_insert_id($conn);

                $sqlInsert4 = "INSERT INTO log (id_usuario) VALUES ('$lastId3')";
                $resultInsert4 = mysqli_query($conn, $sqlInsert4);

                if ($resultInsert1 === true && $resultInsert2 === true && $resultInsert3 === true && $resultInsert4 === true) {
                    header("Location: login.php?signup=success");
                    exit();
                } else {
                    $errors['account'] = "Não foi possível criar a conta. Tente novamente!";
                }
            }
        } else {
            $errors['empty-inputs'] = "Preencha todos os campos!";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['send-message'])) {
        $emptyInputs = emptyInputsContact($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phone'], $_POST['message']);

        if ($emptyInputs === true) {
            $name = mysqli_real_escape_string($conn, trim($_POST['name']));
            $surname = mysqli_real_escape_string($conn, trim($_POST['surname']));
            $email = mysqli_real_escape_string($conn, trim($_POST['email']));
            $phone = intval(mysqli_real_escape_string($conn, trim($_POST['phone'])));
            $message = mysqli_real_escape_string($conn, trim($_POST['message']));

            $sql = "SELECT * FROM contato WHERE nome = '$name' AND email = '$email' AND mensagem = '$message'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);

            if ($rows > 0) {
                $errors['message'] = "Essa mensagem já existe!";
            } else {
                $sql = "INSERT INTO contato (nome, sobrenome, email, telefone, mensagem) VALUES ('$name', '$surname', '$email', '$phone', '$message')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $msgs['sent'] = "Mensagem enviada. Obrigado!";

                    $_POST['name'] = "";
                    $_POST['surname'] = "";
                    $_POST['email'] = "";
                    $_POST['phone'] = "";
                    $_POST['message'] = "";
                }
            }
        } else {
            $errors['empty-inputs'] = "Preencha todos os campos!";
        }
    }
}
