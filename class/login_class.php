<?php

    class login
    {

        public function __construct($connect)
        {
            $this->connect = $connect;
        }

        public function check_login_details($user_nick, $user_password)
        {
            $user_nick = htmlspecialchars($user_nick);
            $user_nick = addslashes($user_nick);

            $user_password = htmlspecialchars($user_password);
            $user_password = addslashes($user_password);

            $check_user_in_dtbase = $this->connect->query("SELECT * FROM users WHERE nick = '$user_nick'");
            $row = $check_user_in_dtbase->fetch_assoc();

            if($check_user_in_dtbase->num_rows != 1){

                $_SESSION['error'] = "Podany użytkownik nie istnieje";

            } elseif (!password_verify($user_password, $row['password'])) {

                $_SESSION['error'] = "Błędne hasło";

            } else {

                $_SESSION['online'] = true;
                $_SESSION['nick'] = $row['nick'];

                header('LOCATION: online.php');

            }
        }

    }

?>
