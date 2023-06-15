<?php
include_once '../constantes/constantes.php';

session_start();
session_unset();
session_destroy();
header("Location: " . $GLOBALS['nomeDoProjecto'] . '/index.php?op=login');

