<?php
    if( (!isset($_SESSION['username']) ) || session_status() !== PHP_SESSION_ACTIVE ){
        header("Location: " . $GLOBALS['nomeDoProjecto'] . '/index.php?op=login');
    }
    else{
        //echo 'AAAAAAAAAAA';
    }
