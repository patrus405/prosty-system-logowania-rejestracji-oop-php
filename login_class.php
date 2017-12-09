<?php

  require_once "db_construct.php";

  class login extends db_construct{

    private function nick_password($nick, $password){
      $nick = htmlspecialchars($nick);
      $nick = addslashes($nick);
      $password = md5($password);
      $select = "*"; //wybór pola do wyszukania w bazie danych
      $from = "users"; //wybór tabeli
      $where = "nick = '$nick' AND password='$password'"; //wybór wartości do wyszukania w tabeli
      $this::select($select, $from, $where); //podstawienie danych do funkcji select
      if($this->num_select == 1)return true;
      else return 0;
    }

    public function show($nick, $password){
      if($this::nick_password($nick, $password)){ //sprawdzenie poprawności danych
        $_SESSION['zalogowany'] = true;
        $_SESSION['nick'] = $nick;
        header("LOCATION: zalogowany.php"); //jeśli wszystko w porządku zalogowanie użytkownika
      }else{
        $_SESSION['error'] = "błędny nick lub hasło";
        header("LOCATION: index.php"); //jeśli jakaś wartość jest błędna powrót do strony głównej
      }
    }

  }

  $login = new login;
  $login->show($_POST['nick'], $_POST['password']);

?>
