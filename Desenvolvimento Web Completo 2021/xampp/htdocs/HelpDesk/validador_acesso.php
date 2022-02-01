<?php
    session_start();

    if(!(isset($_SESSION['token'])) || $_SESSION['token'] != true) {
    header('Location: https://localhost/HelpDesk/index.php?login=erro2');
    }
?>