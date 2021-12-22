<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../Database/_dbconnect.php';
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $sql = "Select * from users where user_email='$email'";
    $result = mysqli_query($connection, $sql);
    $numRows = mysqli_num_rows($result);

    if($numRows==1)
    {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['user_pass']))
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['useremail'] = $email;
            header("Location: /versegrafia/index.php?loginsuccess=true");
        }
        else
        {
            header("Location: /versegrafia/index.php?loginsuccess=flase&error=emailorpasswordsDoNotMatch");
        }
    }
    else
    {
        header("Location: /versegrafia/index.php?loginsuccess=flase&error=emailorpasswordsDoNotMatch");    
    }

}
?>