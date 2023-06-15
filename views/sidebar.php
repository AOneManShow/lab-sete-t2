<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include_once '../constantes/constantes.php';
include '../sessions/session.php';
?>

<html>
<head>
  <meta charset='utf-8'>
  <title>Gestor de Tarefas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="../content/css/custom/estilo.css">
</head>

<body class="bg-verde-pastoso">
    