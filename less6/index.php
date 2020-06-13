<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/include/session.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/include/auth.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/main/header.php')
?>



            <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>


        </td>
        <?php auth_render();?>
    </tr>
</table>
<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/main/footer.php')?>

