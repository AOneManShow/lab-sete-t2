<?php
//include_once './session/session.php';
//include 'constantes/nomeProjecto.php';
require_once 'controller/MainController.php';

$controller = new MainController();
$controller->requestsHandler();
