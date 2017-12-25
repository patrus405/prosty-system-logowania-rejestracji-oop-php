<?php

    require_once('validate_user.php');

    class registartion extends validation
    {

        public function __construct($connect)
        {
            // SESSION_START();
            $this->connect = $connect;
        }

        public function add_to_database()
        {

            if($this->user_nick_error || $this->user_password_error || $this->user_email_error || $this->user_age_error) {


                $_SESSION['error'] = '';

                if($this->user_nick_error) $_SESSION['error'] .= $this->user_nick_error_description.'<br>';
                if($this->user_password_error) $_SESSION['error'] .= $this->user_password_error_description.'<br>';
                if($this->user_email_error) $_SESSION['error'] .= $this->user_email_error_description.'<br>';
                if($this->user_age_error) $_SESSION['error'] .= $this->user_age_error_description.'<br>';

                header('LOCATION: index.php');


            } else {

                $add_user = $this->connect->query("INSERT INTO `users`(`nick`, `email`, `password`, `date`) VALUES ('$this->user_nick','$this->user_email','$this->user_password','$this->user_birthday_date')");

                if ($add_user) {

                    $_SESSION['online'] = true;
                    $_SESSION['nick'] = $this->user_nick;
                    // $_SESSION['email'] = $this->user_email;

                    header('LOCATION: online.php');

                } else {

                    $_SESSION['error'] = 'Błąd z serwerem spróbuj za parę minut';
                    header('LOCATION: index.php');

                }

            }
        }

    }

?>
