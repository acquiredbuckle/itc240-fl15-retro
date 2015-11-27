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
    header('location:customer_list.php');
}

$sql = "select * from test_Customers where CustomerID = $id";

//we connect to the database here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract data here
$result = mysqli_query($iConn,$sql);
    
if(mysqli_num_rows($result) > 0)
{//show records
    
    while($row = mysqli_fetch_assoc($result))
        {
            $FirstName = stripslashes($row['FirstName']);
            $LastName = stripslashes($row['LastName']);
            $Email = stripslashes($row['Email']); 
            $title = "Title Page for " . $FirstName;
            $pageID = $FirstName;
            $Feedback = '';//no feedback neccessary
        }  
    
}else{//inform no records
    $Feedback = '<p>This customer does not exist.</p>';
}
?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
if($Feedback == '')
{//if data exists, show it
    echo '<p>';
    echo 'FirstName: <b>' . $FirstName. '</b> ';
    echo 'LastName: <b>' . $LastName . '</b> ';
    echo 'Email: <b>' . $Email . '</b> ';
    echo '</p>'; 
        
//echo '<a href="customer_view.php?id=' . $row['CustomerID'] . '">' . $row['FirstName'] . '</a>';
}else{//warn user no data
    echo $Feedback;
}
                
echo '<p><a href="customer_list.php">Go Back</a></p>';

//release web server resources
@mysqli_free_result($result);

//close connect to mysql
@mysqli_close($iConn);
    
?>
<?php include 'includes/footer.php';?>