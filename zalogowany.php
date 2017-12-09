<?php

SESSION_START();
if(!isset($_SESSION['zalogowany']))header("LOCATION: index.php");
else echo "witaj ".$_SESSION['nick'];

?>
