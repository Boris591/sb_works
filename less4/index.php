<?php

error_reporting(E_ALL);

$res = false;
$formLogin = '';
$formPassword = '';


if(isset($_POST['auth'])){
    $logins = include $_SERVER['DOCUMENT_ROOT'].'/data/logins.php';
    $passwords = include $_SERVER['DOCUMENT_ROOT'].'/data/passwords.php';
    $formLogin = $_POST['login'];
    $formPassword = $_POST['password'];
    $flip = array_flip($logins);
    $res = isset($flip[$formLogin]) && $passwords[$flip[$formLogin]] == $formPassword;

//    if($res && !$_SESSION['user']){
//        $_SESSION['user'] = $formLogin;
//    }
}
?>
<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/main/header.php')?>



            <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>


        </td>
        <td class="right-collum-index">

            <div class="project-folders-menu">
                <ul class="project-folders-v">
                    <li class="project-folders-v-active"><a href="/?login=yes">Авторизация</a></li>
                    <li><a href="#">Регистрация</a></li>
                    <li><a href="#">Забыли пароль?</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <?php if (isset($_GET['login']) && $_GET['login'] == 'yes'):?>
                <div class="index-auth">
                    <?php if($res):
                        include $_SERVER['DOCUMENT_ROOT'].'/include/success.html';
                    else:
                        ?>
                        <form action="/?login=yes" method="post">
                            <?php if(!empty($_POST)){
                                include $_SERVER['DOCUMENT_ROOT'].'/include/error.html';
                            }
                            ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="iat">
                                        <label for="login_id">Ваш e-mail:</label>
                                        <input id="login_id" size="30" name="login" value="<?= $formLogin ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="iat">
                                        <label for="password_id">Ваш пароль:</label>
                                        <input id="password_id" size="30" name="password" type="password" value="<?= $formPassword ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td><input name="auth" type="submit" value="Войти"></td>
                                </tr>
                            </table>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </td>
    </tr>
</table>
<?php require_once ($_SERVER['DOCUMENT_ROOT'].'/templates/main/footer.php')?>

