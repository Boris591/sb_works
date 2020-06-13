<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/include/tempView.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/data/main_menu.php');

\tempView\check_route($arrMenu);
