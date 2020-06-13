<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

function message($txt){
    exit(json_encode(['type' => 'upload', 'message' => $txt]));
}

function errorCheck($fileName, $tmp, $fileSize, $settings){
    $settings;

    if (file_exists(UPLOAD_DIR.$fileName)){

        return '<span class="err">Файл '.$fileName.' уже содержится в каталоге!</span>';
    }

    if(!in_array(mime_content_type($tmp), FILE_TYPES)){

        return '<span class="err">Ошибка! Тип файла '.
                $fileName.
                ' не соответствует '.
                preg_replace('/image\//', '', implode('/', FILE_TYPES)).
                '</span>';
    }


    if($fileSize > MAX_SIZE){

        return '<span class="err">Ошибка! Размер файла '.$fileName.' больше 5MB.</span>';
    }

}

function uploadFile($fileName, $tmpName){
    return move_uploaded_file($tmpName, UPLOAD_DIR.basename($fileName));
}

if(isset($_FILES['f'])){
    $files = $_FILES['f'];
    $results = [];
    $settings = include $_SERVER['DOCUMENT_ROOT'].'/config/settings.php';
    
    for ($i = 0; $i < count($files['name']); $i++){
        $error = errorCheck($files['name'][$i], $files['tmp_name'][$i], $files['size'][$i], $settings);

        if (!is_null($error)){
            $results[] = $error;

            continue;
        }

        if(uploadFile($files['name'][$i], $files['tmp_name'][$i])){
            $results[] = '<span class="correct">Файл '.$files['name'][$i].' успешно загружен.</span>';
        }else{
            $results[] = '<span class="err">Ошибка! файл '.$files['name'][$i].' не был загружен.</span>';
        }
    }


}

message(implode('<br/> <br/>', $results));
