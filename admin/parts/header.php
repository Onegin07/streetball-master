<?php
    // Конфигурация БД
    include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Платформа Game USL 3x3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="/admin/assets/img/favicon.gif" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="/admin/assets/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/admin/assets/css/custom.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/admin/assets/css/adminLogin.css" rel="stylesheet" type="text/css" media="all" />
</head>

 <body>

    <div class="layout layout-nav-side">

      <?php
        include $_SERVER['DOCUMENT_ROOT']."/admin/adminLogin.php";
        // Главное боковое меню
        include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/navbar-admin.php';
      ?>

      <div class="main-container">