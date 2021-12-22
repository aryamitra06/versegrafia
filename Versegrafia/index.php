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

    <title>Versegrafia</title>
</head>

<body>
    <?php include 'Components/_nav.php'; ?>
    <div class="body-container">
        <div class="explore-container">
            <h3 class="explore-heading">
                Explore the Imagination!
            </h3>
            <h3 class="explore-paragraph">
                Pick your favourite photography topic and join discuss!
            </h3>
            <div class="explore-search">
            <form class="d-flex query-box" action= "query.php" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search anything you want!" aria-label="Search" name= "query">
            <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            </div>

            <div class="explore-card-container">

                <?php
                //<--- code to pull topics from 'topics' table ---> 
                         $sql = "SELECT * FROM `topics`"; 
                         $result = mysqli_query($connection, $sql);
                         while($row = mysqli_fetch_assoc($result)){
                            $id = $row['topic_id'];
                            $name = $row['topic_name'];
                            $desc = $row['topic_description'];
                            $type = $row['topic_type'];
                echo
                '
                <div class="container-card">
                    <div class="inside-card">
                        <img class="card-image" src="https://source.unsplash.com/1600x900/?photography,'.$type.'" alt="" srcset="" draggable="false">
                        <h3 class="card-title">' .$name. '</h3>
                        <h6 class="card-description">' .substr($desc, 0, 100). '...</h6>
                        <!-- href will move to a page where each of the topic card has different topic id -->
                        <a href="discuss.php?topicid='.$id.'"><button type="button" class="btn btn-light card-btn">Explore</button></a>
                    </div>
                </div>
                ';
                         }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>