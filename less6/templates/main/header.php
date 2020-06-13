<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/tempView.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/data/main_menu.php');


?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

<div class="header">
    <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
    <div class="clearfix"></div>
</div>

<div class="clear">
        <?php \tempView\menu_render($arrMenu, '\tempView\matchAsc', 'main-menu') ?>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="left-collum-index">

            <h1><?= \tempView\show_title($arrMenu) ?></h1>