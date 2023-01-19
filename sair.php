<?php
    unset($_SESSION['UsuarioID']);

    session_destroy();

    header("Location: index.php");