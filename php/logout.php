<?php
// session_start();
// session_unset();
// session_destroy();

// unset($_SESSION['id']);
// unset($_SESSION['id_adm']);
// unset($_SESSION['logged_in']);

// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

unset($_SESSION['id']);
unset($_SESSION['id_adm']);

$_SESSION['logged_in'] = false;

unset($_SESSION['logged_in']);

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();


header("Location: ../index.php?logout=success");
exit();
