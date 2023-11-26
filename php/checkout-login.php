<?php
    session_start();
    
    if (!isset($_SESSION['logged_in'])) {
        echo '<script>
                alert("Acesso restrito!");
                setTimeout(function() {
                    window.location.href = "login.php?logged=false";
                }, 100);
            </script>';
    }
?>