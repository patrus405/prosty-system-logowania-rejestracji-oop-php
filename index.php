<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>rejestracja php oop</title>

    </head>
    <body>

    <?php

        SESSION_START();
        if(isset($_SESSION['error'])) {
            echo '<p style="color:red;">'.$_SESSION['error'].'</p>';
            SESSION_DESTROY();
        }
    ?>

    <h1>zarejestruj sie:</h1>

        <form method="post" action="registration.php">

            <label for="user_nick">nick</label><br>
                <input type="text" name="user_nick" id="user_nick" placeholder="nick" required><br>
            <label for="user_password1">hasło</label><br>
                <input type="password" name="user_password1" id="user_password1" placeholder="hasło" required><br>
            <label for="user_password2">powtórz hasło</label><br>
                <input type="password" name="user_password2" id="user_password2"  placeholder="powtórz hasło" required><br>
            <label for="user_email">e-mail</label><br>
                <input type="email" name="user_email" id="user_email" placeholder="e-mail" required><br>
            <label for="user_birthday_date">data urodzenia:</label><br>
                <input type="date" name="user_birthday_date" id="user_birthday_date" required><br>
            <input type="submit" value="zarejstruj">

        </form>

        <h1>zaloguj się:</h1>

        <form method='post' action="login.php">

            <label for="user_nick_login">nick</label><br>
                <input type="text" name="user_nick" id="user_nick_login" placeholder="nick" required><br>
            <label for="user_password_login">hasło</label><br>
                <input type="password" name="user_password" id="user_password_login" placeholder="hasło" required><br>
                <input type="submit" value="zaloguj">

        </form>

    </body>
</html>
