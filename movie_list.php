<?php
//customer_list.php - shows a list of customer data

require 'includes/config.php';

$sql = "select * from Movies";

$title = 'Movie List/View Pager';

# END CONFIG AREA ---------------------------------------------------

include 'includes/header.php'; #header must appear before any HTML is printed by PHP
?>
<h1><?=$pageID?></h1>
<h3 align="center"><?=$title;?></h3>

<?php
#reference images for pager
$prev = '<img src="' . VIRTUAL_PATH . 'images/arrow_prev.gif" border="0" />';
$next = '<img src="' . VIRTUAL_PATH . 'images/arrow_next.gif" border="0" />';

#Create a connection
# connection comes first in mysqli (improved) function
$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

# Create instance of new 'pager' class
$myPager = new Pager(10,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
    
if(mysqli_num_rows($result) > 0)
{#records exist - process
	if($myPager->showTotal()==1){$itemz = "movie";}else{$itemz = "movies";}  //deal with plural
    echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';
    echo '<table border="1" style="width:100%">';
    echo '<tr>';
    echo '<th>Poster</th>';
    echo '<th>Movie</th>';
    echo '<th>Rating</th>';
    echo '<th>Release Year</th>';
    echo '<th>Description</th>';
    echo '</tr>';
    
	while($row = mysqli_fetch_assoc($result))
	{# process each row
        echo '<tr>';
        echo '<td width="(100/5)%"><img src="uploads/movie' . $row['MovieID'] . '.jpg"></td>';
        echo '<td width="(100/5)%"><a href="' . VIRTUAL_PATH . 'movie_view.php?id=' . (int)$row['MovieID'] . '">' . dbOut($row['Movie']) . '</a></td>';
        echo '<td width="(100/5)%"><b>' . $row['Rating'] . '</b></td>';
        echo '<td width="(100/5)%"><b>' . $row['ReleaseYear'] . '</b></td>';
        echo '<td width="(100/5)%"><b>' . $row['Description'] . '</b></td> ';
        echo '</tr>';
	}
    echo '</table>';
    echo $myPager->showNAV('<p align="center">','</p>');
}else{#no records
    echo "<p align=center>Aw snap! No movies?  What will we watch?!</p>";	
}


//release web server resources
@mysqli_free_result($result);

//close connect to mysql
@mysqli_close($iConn);
    
?>
<?php include 'includes/footer.php';?>