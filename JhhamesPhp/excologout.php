<?php
    include '../JhhamesPhp/sessions.php';
    include '../JhhamesPhp/database.php';

    if(isset($_SESSION['exco-login'])):
         unset($_SESSION['exco-login']);
         redirect_to('../excos/login.php');
    else:
        redirect_to('../excos/login.php');
    endif;
?>