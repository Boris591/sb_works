

<td class="right-collum-index">

    <div class="project-folders-menu">
        <ul class="project-folders-v">
            <li class="project-folders-v-active">
                <?php if(isset($_SESSION['user'])): ?>
                    <a href="/?login=out">Выйти</a>
                <?php else: ?>
                    <a href="/?login=yes">Авторизация</a>
                <?php endif; ?>

            </li>
            <li><a href="#">Регистрация</a></li>
            <li><a href="#">Забыли пароль?</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="index-auth">
        <?php if($res || isset($_SESSION['user'])):
            include $_SERVER['DOCUMENT_ROOT'].'/include/success.html';
        else:
            ?>
            <form action="/" method="post">
                <?php if(!empty($_POST)){
                    include $_SERVER['DOCUMENT_ROOT'].'/include/error.html';
                }
                ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="iat">
                            <label class="<?= $classLabel ?>" for="login_id">Ваш e-mail:</label>
                            <input type="<?= $typeInputLogin ?>" id="login_id" size="30" name="login" value="<?= $formLogin ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="iat">
                            <label for="password_id">Ваш пароль:</label>
                            <input id="password_id" size="30" name="password" type="password">
                        </td>
                    </tr>
                    <tr>
                        <td><input name="auth" type="submit" value="Войти"></td>
                    </tr>
                </table>
            </form>
        <?php endif; ?>
    </div>
</td>
