<?php

require_once "db_construct.php";

class registration extends db_construct{

  public function nick($nick){
    $nick = htmlspecialchars($nick);
    $nick = addslashes($nick);
    $select = "nick";
    $from = "users";
    $where = "nick = '$nick'";
    $this::select($select, $from, $where); //sprawdzenie, czy podany nick istnieje
    if($this->num_select > 0)$this->nick_error = false; //zwrócenie wartości negatywnej jeśli nie
    else{
       $this->nick_error = true; //zwrócenie wartości pozytywnej jeśli tak
       $this->nick = $nick;
     }

     if(strlen($nick) == 0)$this->nick_error = false;
  }

  public function email($email){
    if(!strpos($email, '@') || !strpos($email, '.'))$this->email_error = false; //sprawdzenie poprawności e-mail
    else{
      $this->email = $email;
      $this->email_error = true;
    }
  }

  public function password($password1, $password2){
    if($password1 !== $password2)$this->password_error = false; //sprawdzenie, czy hasła są identyczne
    else{
      $this->password = md5($password1); //hash hasła
      $this->password_error = true;
     }
  }

  public function date($date){ //sprawdzenie wieku użytkownika
    $date_explode = explode("-", $date);
    $date_Y = date('Y')-$date_explode[0];
    $date_how_much = 13-$date_Y;
    if($date_Y < 13){
      $this->date_error = false;
      $this->how_much = $date_how_much;
    }
    else {
      $this->date = $date;
      $this->date_error = true;
    }
  }

  public function add_user(){

    if($this->email_error && $this->password_error && $this->date_error && $this->nick_error){

      $where = "`users`";
      $field = "(`nick`, `password`, `email`, `date`, `email_confirm`)";
      $what = "'$this->nick', '$this->password', '$this->email', '$this->date', 0";
      
      //dodanie użytkownika
      if($this::add($where, $field, $what)){
          $_SESSION['zalogowany'] = true;
          $_SESSION['nick'] = $this->nick;
          header("LOCATION: zalogowany.php");
      }

    }else{
      //lista błędów powstałych przy walidacji
      $_SESSION['error'] = "";
      if(!$this->email_error)$_SESSION['error'] .= "bledny email</br>";
      if(!$this->password_error)$_SESSION['error'] .= "bledne haslo</br>";
      if(!$this->date_error)$_SESSION['error'] .= "za mlody o ".$this->how_much."</br>";
      if(!$this->nick_error)$_SESSION['error'] = "podany nick istnieje</br>";

      header("LOCATION: index.php");

    }
  }

}

$registration = new registration;
$registration->nick($_POST['nick']);
$registration->email($_POST['email']);
$registration->password($_POST['password1'], $_POST['password2']);
$registration->date($_POST['date']);
$registration->add_user();
