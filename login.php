<?php

    require_once('class\db_construct.php');
    require_once('class\login_class.php');

    $user_nick = filter_input(INPUT_POST, 'user_nick', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_password = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_SPECIAL_CHARS);

    if($user_nick && $user_password) {

        $qwe = new login($connect);
        $qwe->check_login_details($user_nick, $user_password);

    } else {
        
        header("LOCATION: index.php");
        
    }


?>
