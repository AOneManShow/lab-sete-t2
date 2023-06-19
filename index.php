<?php
//include_once './session/session.php';
require_once 'controller/MainController.php';

$controller = new MainController();
$controller->requestsHandler();
