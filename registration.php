<?php

    require_once('class\db_construct.php');
    require_once('class\registartion_class.php');

    $nick = filter_input(INPUT_POST, 'user_nick', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_password1 = filter_input(INPUT_POST, 'user_password1', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_password2 = filter_input(INPUT_POST, 'user_password2', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_birthday_date = filter_input(INPUT_POST, 'user_birthday_date', FILTER_SANITIZE_SPECIAL_CHARS);

    // $incorrect_variables = array('OR', 'or', 'AND', 'and', 'DROP', 'drop', 'TABLE', 'table', 'select', 'SELECT');
    // foreach ($incorrect_variables as $incorrect_variables) {
    //     if (strstr($nick, $incorrect_variables))echo "<br>błedny nick";
    // }

    if($nick && $user_password1 && $user_password2 && $user_email && $user_birthday_date) {

        $qwe = new registartion($connect);
        $qwe->check_nick($nick);
        $qwe->check_password($user_password1, $user_password2);
        $qwe->check_email($user_email);
        $qwe->check_birthday_date($user_birthday_date);
        $qwe->add_to_database();

    } else {
        header("LOCATION: index.php");
    }


?>
