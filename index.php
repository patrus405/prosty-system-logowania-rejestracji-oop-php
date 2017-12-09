<?php SESSION_START();
if(isset($_SESSION['error'])){
  echo "<font color=red>".$_SESSION['error']."</font></br>";
  SESSION_DESTROY();
}
echo <<< END
  zarejestruj sie<hr>

  <form method='post' action="registration_class.php">

    <input type="text" name="nick" placeholder="nick"></br>
    <input type="password" name="password1" placeholder="hasło"></br>
    <input type="password" name="password2" placeholder="powtórz hasło"></br>
    <input type="email" name="email" placeholder="e-mail"></br>
    data urodzenia: <input type="date" name="date"></br>
    <input type="submit" value="zarejstruj">

  </form>

  zaloguj się<hr>

  <form method='post' action="login_class.php">

    <input type="text" name="nick" placeholder="nick"></br>
    <input type="password" name="password" placeholder="hasło"></br>
    <input type="submit" value="zaloguj">

  </form>

END;
?>
