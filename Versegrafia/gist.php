<?php 
include 'Database/_dbconnect.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Versegrafia</title>
</head>

<body>
    <?php
     include 'Components/_nav.php';
     include 'Components/_addDiscuss.php'; 

     $gistid = $_GET['gistid'];
     $method = $_SERVER['REQUEST_METHOD'];
     if($method == 'POST')
     {   
         //post discuss_content from the from
        $discuss_content = $_POST['discuss_content'];

        //saving web from XSS attack
        $discuss_content = str_ireplace("<", "&lt", $discuss_content);
        $discuss_content = str_ireplace(">", "&gt", $discuss_content);
   
         //adding discuss content, gist_id (from URL) and $_SESSION['sno] (user sno) -> user_id into the table called discussions
         $sql = "INSERT INTO `discussions` (`discuss_content`, `gist_id`, `user_id`, `discuss_time`) VALUES ('$discuss_content', '$gistid', '".$_SESSION['sno']."', current_timestamp());";
         $result = mysqli_query($connection, $sql);

         if($result)
         {
             require 'Components/Alerts/_discussAddAlert.php';
         }
     }
    ?>

    <div class="body-container">
        <?php

                $gistid = $_GET['gistid'];

                //fetching datas from the table "gists" to show the gist at the top
                $sql = "SELECT * FROM `gists` WHERE gist_id=$gistid";
                $result = mysqli_query($connection, $sql);
                while($row = mysqli_fetch_assoc($result)){
                $name = $row['gist_title'];
                $desc = $row['gist_description'];
                
                //taking gistid from url
                //selecting user_id from gists table with the help of gist_id
                $sql_creator_1 = "SELECT * FROM `gists` WHERE gist_id=$gistid";
                $result_creator_1 = mysqli_query($connection, $sql_creator_1);
                while($row3 = mysqli_fetch_assoc($result_creator_1))
                {
                    $user_id = $row3['user_id'];
                }

                //selecting user from users table where sno = user_id and then fetching user_name data from table
                $sql_creator_2 = "SELECT * FROM `users` WHERE sno = $user_id";
                $result_creator_2 = mysqli_query($connection, $sql_creator_2);
                while($row4 = mysqli_fetch_assoc($result_creator_2))
                {
                    $gist_creator = $row4['user_name'];
                }
                

        echo
        '<div class="gist-top">
        <div class="gist-heading">
        '.$name.'
        </div>
        <div class="gist-subheading">
        '.$desc.'
        </div>   
        <div class="gist-asked-by">
        Gist asked by <i class="fas fa-user-edit"></i> <strong> '.$gist_creator.' </strong>
        </div>    
        ';
                }

                
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
echo
            '<div class="gist-button">
                <button type="button" class="btn btn-light mx-2" data-bs-toggle="modal" data-bs-target="#addDiscussModal"><i class="fas fa-plus-circle"></i> New Discuss</button>
            </div>'; 
}
else
{
    echo
            '<div class="gist-button">
            <p class="warning">Login to create a new discuss!</p>
            </div>';
}      
?>
    </div>
    </div>
    <div class="gist-list-heading-parent">
        <div class="gist-list-heading-child-1">
            <?php
        echo
        '<p style="margin-bottom: 4px;">Discuss the Gist</p>';
        ?>
        </div>
        <div class="gist-list-heading-child-2">
        </div>
    </div>
    <div class="gist-section">
        <?php
                    //<-- discussion section starts -->
                    $noDiscuss = true;
                    $gistid = $_GET['gistid'];

                    //fetching the discussions from the discussion table
                    $sql = "SELECT * FROM `discussions` WHERE gist_id=$gistid";
                    $result = mysqli_query($connection, $sql);

                    while($row = mysqli_fetch_assoc($result)){
                    $noDiscuss = false;
                    $content = $row['discuss_content'];
                    $user_id = $row['user_id'];
                    $time = $row['discuss_time'];

                    //fetching usernames
                    $sql2 = "SELECT user_name FROM `users` WHERE sno= $user_id";
                    $result2 = mysqli_query($connection, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $user_name = $row2['user_name'];
                    

                    echo
                    '
                    <div class="thread">
                    <div class="thread-user">
                        <img src="Images/user.png" alt="" srcset="" class="thread-user-image" draggable="false">
                    </div>
                    <div class="thread-question">
                        <p class="thread-username">'. $user_name .'</p>
                        <p class="thread-time-and-publicity"><i class="fas fa-globe-asia"></i> '.$time.'</p>
                        <p class="thread-heading">'.$content.'</p>
                    </div>
                </div>
                    ';
                }
                if ($noDiscuss){
                    echo
                    '
                    <div class="no-post-parent">
                    <div class="no-post-child-1">
                    <img src="Images/bethefirsttopost.svg" alt="" srcset="" class="no-post-img" draggable="false">
                    </div>
                    <div class="no-post-child-2">
                    <p class="no-post-title">No Discussions found!</p>
                    </div>
                    </div>
                    ';
                }

    ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>