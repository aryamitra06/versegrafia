<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../Database/_dbconnect.php';
    $name = $_POST['signupName'];
    $email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupConfirmPassword'];

    $existSql = "select * from `users` where user_email = '$email'";
    $result = mysqli_query($connection, $existSql);
    $numRows = mysqli_num_rows($result);

    //checking for any other email existance
    if($numRows>0){
        header("Location: /versegrafia/index.php?signupsuccess=false&error=emailAlreadyExist");
    }
    else
    {
        if($pass == $cpass)
        {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`, `signupTime`) VALUES ('$name', '$email', '$hash', current_timestamp());";
            $result = mysqli_query($connection, $sql);
            header("Location: /versegrafia/index.php?signupsuccess=true");
            exit();     
        }
        else
        {
            header("Location: /versegrafia/index.php?signupsuccess=false&error=passwordsDoNotMatch");
        }
    }

}    
?>