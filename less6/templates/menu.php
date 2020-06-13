
<ul class="<?= $ulClass ?>">
    <?php foreach($arrMenu as $item):
        $title = \tempView\cutStr($item['title']);

        if($item['path'] == $_SERVER['REQUEST_URI']){
            $active = 'active ';
        }else{
            $active = '';
        }
        ?>
        <li><a class="<?= $active ?>" href="<?= $item['path'] ?>"><?= $title ?></a></li>
    <?php endforeach; ?>
</ul>