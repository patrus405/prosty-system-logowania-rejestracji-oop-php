<?php SESSION_START();

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'shop';

    $connect_test = new mysqli($host, $user, $password, $dbname);

    if($connect_test->connect_errno != 0) {
        echo "<span style='color:red; text-align:center'>".$connect_test->connect_errno."</span>";
        // $connect = false;
    } else {
        $connect = $connect_test;
    }

    // $check_nickname_in_dtbase = $connect->query("SELECT nick FROM users WHERE nick='admin'");
    // if($check_nickname_in_dtbase->num_rows > 0)echo 'slabo';
    // echo $check_nickname_in_dtbase->num_rows;

?>
