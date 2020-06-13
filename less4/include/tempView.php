<?php
namespace tempView;


function cutStr($str){
    return mb_strimwidth($str, 0, 15, "...");
}

function matchAsc($a, $b){

    return $a['sort'] > $b['sort'];
}

function matchDesc($a, $b){

    return $a['sort'] < $b['sort'];
}

function menu_render($arrMenu, $sort, $ulClass = ''){

    usort($arrMenu, $sort);

    include $_SERVER['DOCUMENT_ROOT'].'/templates/menu.php';

}

function show_title($arrMenu){

    foreach ($arrMenu as $key){
        if (urlMatch($key['path'])){
            return $key['title'];
        }
    }
    return '';

}

function urlMatch($route){
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return $route == $url;
}

function check_route($arrMenu){

    foreach ($arrMenu as $key){
        if (urlMatch($key['path'])){
            return include $_SERVER['DOCUMENT_ROOT'].'/index.php';
        }
    }
    return include $_SERVER['DOCUMENT_ROOT'].'/templates/404.php';
}





