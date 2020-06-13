<?php

include $_SERVER['DOCUMENT_ROOT'].'/config/settings.php';
$files = scandir(UPLOAD_DIR);
$files = array_filter($files, 'cutEmpty');

function cutEmpty($item){
    return $item != '.' && $item != '..';
}

function sizeShow($file){
    $size= filesize(UPLOAD_DIR.$file);
    $kb = round($size / 1000, 1);
    $mb = round($kb / 1000, 1);

    if($kb < 10){
        return $size.'B';
    }elseif ($kb > 10 && $mb < 1 ){
        return $kb.'KB';
    }else{
        return $mb.'MB';
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Галерея</title>
    <link rel="stylesheet" href="/include/style.css">
</head>
<body>
<a href="/">Главная</a><br><br>
<form id="gallery-form" enctype="multipart/form-data" method="post" action="/config/del.php">
    <?php if(!empty($files)): ?>
        <?php foreach ($files as $file): ?>
            <div>
                <label for="<?= $file ?>">
                    <img src="/upload/<?= $file ?>"><br>
                    <span><?= $file ?></span><br>
                    <span><?= sizeShow($file) ?></span><br>
                    <span><?= date("F d Y", filectime(UPLOAD_DIR.$file)) ?></span><br>
                </label>
                <input id="<?= $file ?>" type="checkbox" name="img[]" value="<?= $file ?>">
            </div>
        <br>
        <?php endforeach ?>
        <input type="submit" value="Удалить">
    <?php else: ?>
        <span>Файлов нет!</span>
    <?php endif ?>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/include/form.js"></script>
</body>
</html>
