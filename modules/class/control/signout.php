<?php
    session_start();
    session_destroy();

    $url = '../../../views/index.php';
    header('Location: '.$url);
    exit();