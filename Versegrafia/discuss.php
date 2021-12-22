<?php
//inserting the database
include 'Database/_dbconnect.php'; 
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="Style/style.css">

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <title>Versegrafia</title>
</head>

<body>
    <?php
     include 'Components/_nav.php'; 
     include 'Components/_addGist.php'; 

     //checking if the request is POST
     $method = $_SERVER['REQUEST_METHOD'];
     if($method == 'POST')
     {   
         //taking the value of topic id from the URL
         $topicid = $_GET['topicid'];

         //taking the values from input fields of "ADDING GIST" form 
         $gist_title = $_POST['gist_title'];
         $gist_desc = $_POST['gist_desc'];

         //<-- taking the user's sno who's logged in (it will be used to identify the user for autherization) -->
         //adding datas to the "gists" table and the user_id as $_SESSION['sno'] (VERY VERY IMPORTANT)
         //adding topic_id (from url ) and user id (from session) in the table is very much important
         $sql = "INSERT INTO `gists` (`gist_title`, `gist_description`, `topic_id`, `user_id`, `timestamp`) VALUES ('$gist_title', '$gist_desc', '$topicid', '".$_SESSION['sno']."', current_timestamp());";
         $result = mysqli_query($connection, $sql);

         //showing gist added alert if the result is success
         if($result)
         {
             require 'Components/Alerts/_gistAddAlert.php';
         }
     }
    ?>
    <div class="body-container">
        <?php
                //taking the value of topic id from the URL
                $topicid = $_GET['topicid'];

                //getting fields from "topics" table with topic id for using discuss heading
                $sql = "SELECT * FROM `topics` WHERE topic_id=$topicid";
                $result = mysqli_query($connection, $sql);
                while($row = mysqli_fetch_assoc($result)){   
                $name = $row['topic_name'];
                $desc = $row['topic_description'];
                }


echo
        '<div class="discuss-top">
            <div class="discuss-heading">
                Explore <strong>'.$name.'</strong>
            </div>
            <div class="discuss-subheading">
                '.$desc.'
            </div>'
            ;

//check if session is logged in then only show the gist-add button else showing the error msg to login to create a gist
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
echo            
            '<div class="gist-button">
            <button type="button" class="btn btn-light mx-2" data-bs-toggle="modal" data-bs-target="#addGistModal"><i class="fas fa-plus-circle"></i> New Gist</button>
            </div>';
}  
else
{
    echo            
            '<div class="gist-button">
            <p class="warning">Login to create a new gist!</p>
            </div>';
}      
?>
    </div>
    </div>
    <div class="gist-list-heading-parent">
        <div class="gist-list-heading-child-1">
            <?php
        echo
        '<p style="margin-bottom: 4px;">Gists related to '.$name.'</p>';
        ?>
        </div>
        <div class="gist-list-heading-child-2">
        </div>
    </div>
    <div class="discuss-section">
        <?php
                    $noGist = true;

                    $topicid = $_GET['topicid'];

                    //showing all the gists' fields for the perticular topic_id
                    $sql = "SELECT * FROM `gists` WHERE topic_id=$topicid";
                    $result = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                    $noGist = false;
                    $gistid = $row['gist_id'];
                    $gistname = $row['gist_title'];
                    $gistdesc = $row['gist_description'];  

                    $time = $row['timestamp'];
                    $user_id = $row['user_id'];    

                    //query to fetch the usernames from the users table with the perticular sno
                    $sql2 = "SELECT user_name FROM `users` WHERE sno= $user_id";
                    $result2 = mysqli_query($connection, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $user_name = $row2['user_name'];
                    echo
                    '
                    <a href="gist.php?gistid='.$gistid.'">
                    <div class="thread">
                    <div class="thread-user">
                        <img src="Images/user.png" alt="" srcset="" class="thread-user-image" draggable="false">
                    </div>
                    <div class="thread-question">
                        <p class="thread-username">'.$user_name.'</p>
                        <p class="thread-time-and-publicity"><i class="fas fa-globe-asia"></i> '.$time.'</p>
                        <p class="thread-heading">'.$gistname.'</p>
                        <p class="thread-user-question">'.$gistdesc.'</p>
                    </div>
                </div>
                    </a>
                    ';
                }
                if ($noGist){
                    echo
                    '
                    <div class="no-post-parent">
                    <div class="no-post-child-1">
                    <img src="Images/bethefirsttopost.svg" alt="" srcset="" class="no-post-img" draggable="false">
                    </div>
                    <div class="no-post-child-2">
                    <p class="no-post-title">No gist found!</p>
                    </div>
                    </div>
                    ';
                }

    ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>