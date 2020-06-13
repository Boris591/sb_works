<?php

if(isset($_POST['img'])){
    include $_SERVER['DOCUMENT_ROOT'].'/config/settings.php';

    foreach ($_POST['img'] as $item){
        $file = realpath(UPLOAD_DIR.$item);

        if($file && in_array(mime_content_type($file), FILE_TYPES)){
            unlink($file);
        }
    }
    exit(json_encode(['type' => 'delete', 'message' => 'yes']));
}
