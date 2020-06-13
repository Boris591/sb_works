<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

include $_SERVER['DOCUMENT_ROOT'].'/config/settings.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>

    <link rel="stylesheet" href="/include/style.css">
</head>
<body>
<span></span>
<h3>Загрузите файлы</h3>
<div id="info">

</div>
<form id="form-img" action="/config/up_files.php" enctype="multipart/form-data" method="post">
    <p><input type="file" accept="<?= implode(',', FILE_TYPES) ?>" name="f[]" multiple>
        <input type="submit" value="Отправить"></p>
</form>

<div><a href="/gallery.php">Галерея</a></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/include/form.js"></script>
</body>
</html>