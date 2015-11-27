<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
$sql = "select * from test_Customers";

//we connect to the database here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract data here
$result = mysqli_query($iConn,$sql);
    
if(mysqli_num_rows($result) > 0)
{//show records
    
    while($row = mysqli_fetch_assoc($result))
        {
    
            echo '<p>';
            echo 'FirstName: <b>' . $row['FirstName'] . '</b> ';
            echo 'LastName: <b>' . $row['LastName'] . '</b> ';
            echo 'Email: <b>' . $row['Email'] . '</b> ';
            echo '</p>'; 
        
            echo '<a href="customer_view.php?id=' . $row['CustomerID'] . '">' . $row['FirstName'] . '</a>';
    
        }  
    
}else{//inform no records
    
    echo '<p>Currently no customer records!</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connect to mysql
@mysqli_close($iConn);
    
?>
<?php include 'includes/footer.php';?>