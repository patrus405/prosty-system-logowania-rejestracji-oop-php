<?php

    SESSION_START();
    if(!isset($_SESSION['online']))header("LOCATION: index.php");
    else echo "witaj ".$_SESSION['nick'];

?>
