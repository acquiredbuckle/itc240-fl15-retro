<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
$sql = "select * from Movies";

//we connect to the database here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract data here
$result = mysqli_query($iConn,$sql);
    
if(mysqli_num_rows($result) > 0)
{//show records
    echo '<table border="1" style="width:100%">';
            echo '<tr>';
            echo '<th>Poster</th>';
            echo '<th>Movie</th>';
            echo '<th>Rating</th>';
            echo '<th>Release Year</th>';
            echo '<th>Description</th>';
            echo '</tr>';
    
    while($row = mysqli_fetch_assoc($result))
        {
            echo '<tr>';
            echo '<td width="(100/5)%"><img src="uploads/movie' . $row['MovieID'] . '.jpg"></td>';
            echo '<td width="(100/5)%"><a href="movie_view.php?id=' . $row['MovieID'] . '">' . $row['Movie'] . '</a></td>';
            echo '<td width="(100/5)%"><b>' . $row['Rating'] . '</b></td>';
            echo '<td width="(100/5)%"><b>' . $row['ReleaseYear'] . '</b></td>';
            echo '<td width="(100/5)%"><b>' . $row['Description'] . '</b></td> ';
            echo '</tr>';
            
        

    
        }  
        echo '</table>';
    
}else{//inform no records
    
    echo '<p>Currently no movies!</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connect to mysql
@mysqli_close($iConn);
    
?>
<?php include 'includes/footer.php';?>