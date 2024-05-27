<?php

        $db_server = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "blackless(2)";
        $db_conn = "";

        $conn = mysqli_connect($db_server,
                                $db_user,
                                $db_pass,
                                $db_name);

        $fname = $_POST ["FullName"];
        $uname = $_POST ["Username"];
        $mail = $_POST ["Email"];
        $numb = $_POST ["PhoneNumber"];
        $pass = $_POST ["Password"];

        $sql = "INSERT INTO `users`(`user_id`, `user_name`, `fullname`, `email`, `phone_number`, `password`) 
        VALUES ('[value-1]','$uname','$fname','$mail','$numb','$pass')";
        
        header("Location: Home.php");


        mysqli_query($conn, $sql);

        mysqli_close($conn);
?>