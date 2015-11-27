<?php
//customer_view.php - shows deatils of a single customer
?>
<?php include 'includes/config.php';?>
<?php

//process querystring here
if(isset($_GET['id']))
{//process data
    //cast the data to an integer, for security
    $id = (int)$_GET['id'];
}else{//redirect to safe page
    header('location:movie_list.php');
}

$sql = "select * from Movies where MovieID = $id";

//we connect to the database here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract data here
$result = mysqli_query($iConn,$sql);
    
if(mysqli_num_rows($result) > 0)
{//show records
    
    while($row = mysqli_fetch_assoc($result))
        {
            $Movie = stripslashes($row['Movie']);
            $Rating = stripslashes($row['Rating']);
            $ReleaseYear = stripslashes($row['ReleaseYear']); 
            $Description = stripslashes($row['Description']); 
            $title = "Title Page for " . $Movie;
            $pageID = $Movie;
            $Feedback = '';//no feedback neccessary
        }  
    
}else{//inform no records
    $Feedback = '<p>This movie does not exist.</p>';
}
?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
if($Feedback == '')
{//if data exists, show it
    
    echo '<table border="1" style="width:100%">';
    echo '<tr>';
    echo '<th>Poster</th>';
    echo '<th>Movie</th>';
    echo '<th>Rating</th>';
    echo '<th>Description</th>';
    echo '<th>Release Year</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td><img src="uploads/movie' . $id . '.jpg"></td>';
    echo '<td><b>' . $Movie. '</b></td>';
    echo '<td><b>' . $Rating. '</b></td>';
    echo '<td><b>' . $ReleaseYear. '</b></td>';
    echo '<td><b>' . $Description. '</b></td>';
    echo '</tr>';
    echo '</table>';
    
   /* echo '<table border="1" style="width:100%">';
    echo '<tr>';
    echo '<th>Movie <b>' . $Movie. '</b><br /> ';
    echo 'Rating: <b>' . $Rating . '</b><br /> ';
    echo 'Release Year: <b>' . $ReleaseYear . '</b><br /> ';
    echo 'Description: <b>' . $Description . '</b><br /> ';
    echo '</p>'; */
        
}else{//warn user no data
    echo $Feedback;
}
                
echo '<p><a href="movie_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connect to mysql
@mysqli_close($iConn);
    
?>
<?php include 'includes/footer.php';?>