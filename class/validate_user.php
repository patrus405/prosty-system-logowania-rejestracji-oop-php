<?php

    abstract class validation
    {
        
        public function check_nick(string $nick)
        {

            $nick = htmlspecialchars($nick);
            $nick = addslashes($nick);

            $check_nickname_in_dtbase = $this->connect->query("SELECT nick FROM users WHERE nick='$nick'");

            if (empty($nick)) {

                $this->user_nick_error = true;
                $this->user_nick_error_description = 'Nie podano nicku';

            } elseif ($check_nickname_in_dtbase->num_rows != 0) {

                $this->user_nick_error = true;
                $this->user_nick_error_description = 'Podany nick istnieje';

            } else {

                $this->user_nick = $nick;
                $this->user_nick_error = false;

            }

        }

        public function check_password(string $user_password1, string $user_password2)
        {
            $user_password1 = addslashes($user_password1);
            $user_password2 = addslashes($user_password2);
            $user_password1 = htmlspecialchars($user_password1);
            $user_password2 = htmlspecialchars($user_password2);

            if (empty($user_password1) || empty($user_password2)) {

                $this->user_password_error = true;
                $this->user_password_error_description = 'Nie podano hasła';

            } elseif (strlen($user_password1) <= 4) {

                $this->user_password_error = true;
                $this->user_password_error_description = 'Hasło jest zbyt krótkiek';

            } elseif ($user_password1 != $user_password2) {

                $this->user_password_error = true;
                $this->user_password_error_description = 'Hasła nie są identyczne';

            } else {

                $user_password1 = password_hash($user_password1, PASSWORD_DEFAULT);
                $this->user_password = $user_password1;

                $this->user_password_error = false;

            }

        }

        public function check_email(string $user_email)
        {
            $user_email = htmlspecialchars($user_email);
            $user_email = addslashes($user_email);

            $check_email_in_dtbase = $this->connect->query("SELECT email FROM users WHERE email='$user_email'");

            if (empty($user_email)) {

                $this->user_email_error = true;
                $this->user_email_error_description = 'Nie podano e-maila';

            } elseif ($check_email_in_dtbase->num_rows != 0) {

                $this->user_email_error = true;
                $this->user_email_error_description = 'Podany e-mail istnieje';

            } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {

                $this->user_email_error = true;
                $this->user_email_error_description = 'Podano niewłaściwy adres e-mail';

            } else {

                $this->user_email = $user_email;
                $this->user_email_error = false;

            }

        }

        public function check_birthday_date(string $user_birthday_date)
        {
            $user_birthday_date = new DateTime($user_birthday_date);
            $user_birthday_date_year = $user_birthday_date->format('Y');

            $current_date = new DateTime();
            $current_date_year = $current_date->format('Y');

            $user_age = $current_date_year - $user_birthday_date_year;

            if($user_age < 13) {

                $user_age = 13-$user_age;

                $this->user_age_error = true;
                $this->user_age_error_description = "Jesteś zbyt młody o $user_age lat";

            } else {

                $user_birthday_date = $user_birthday_date->format('Y-m-d');

                $this->user_birthday_date = $user_birthday_date;
                $this->user_age_error = false;

            }
        }

    }

?>
