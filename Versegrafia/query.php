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
    <?php include 'Components/_nav.php'; 
    echo
    '<div class="body-container">
        <div class="query-container">
            <h3 class="query-heading">
                Showing results for <em><strong>'.$_GET['query'].'</strong></em>
            </h3>
        </div>
    </div>
    <br>';

    //getting query value parameter from the url
    $query = $_GET["query"];

    //looking for the gist_title and gist_description from the gists table against the query
    $sql = "select * from gists where match (gist_title, gist_description) against ('$query')"; 
    $result = mysqli_query($connection, $sql);
    $noSearchAlert = true;

    //fetching the value from the table gists
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['gist_title'];
        $desc = $row['gist_description']; 
        $gist_id= $row['gist_id'];
    
    //to locate the actual gist from the search list
        $url = "gist.php?gistid=". $gist_id;
        $noSearchAlert = false;

        echo
        '
        <div class="gist-section">
        <div class="thread">
            <a href = "'.$url.'"><div class="thread-question">
                <p class="thread-username">'. $title .'</p>
                <p class="thread-heading">'.$desc.'</p></a>
            </div>
        </div>
        </div>    
        ';
    }
    if($noSearchAlert == true)
    {
        include 'Components/Alerts/_noSearchResultAlert.php';
    }

    ?>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>