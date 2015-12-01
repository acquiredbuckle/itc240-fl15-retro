<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php 
if(isset($_POST['submit']))
{//data submitted
 
    /*
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    */
    /*$to = 'mthomp29@seattlecentral.edu';
    $message = process_post();
    $subject = 'Test from contact form';
    $replyTo = $_POST['Email'];
    
    safeEmail($to, $subject, $message, $replyTo='','html');*/
    
    echo '<p>Your data was submitted!</p>';
    
     //connect to the database in order to add contact data
    $iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

    //process each post var, adding slashes, using mysqli_real_escape(), etc.
    $Name = dbIn($_POST['Name'],$iConn);
    $Email = dbIn($_POST['Email'],$iConn);
    $Phone = dbIn($_POST['Phone'],$iConn);
    $Favfood = dbIn($_POST['Favfood'],$iConn);
    $Comments = dbIn($_POST['Comment'],$iConn);


    //place question marks in place of each item to be inserted
    $sql = "INSERT INTO test_Contacts (Name,Email,Phone,Favfood,Comment,DateAdded) VALUES(?,?,?,?,?,NOW())";
    $stmt = @mysqli_prepare($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
    
    /*
     * second parameter of the mysqli_stmt_bind_param below 
     * identifies each data type inserted: 
     *
     * i == integer
     * d == double (floating point)
     * s == string
     * b == blob (file/image)
     *
     *example: an integer, 2 strings, then a double would be: "issd"
     */
    
    mysqli_stmt_bind_param($stmt, 'ssiss',$Name,$Email,$Phone,$Favfood,$Comment);

    //execute sql command
    mysqli_stmt_execute($stmt) or die();
    
    //close statement
    @mysqli_stmt_close($stmt);
    
    //close connection
    @mysqli_close($iConn);
    
}else{//show form
    
 echo '
 <form method="post" action"' . THIS_PAGE . '">
 Name: <input type="text" name="Name" required="required" /><br />
 Email: <input type="text" name="Email" required="required" /><br />
 Phone: <input type="number" name="Phone" required="required" /><br />
 <h3>Favorite Food</h3>
 <textarea name="Favfood"></textarea><br />
 <h3>Comment</h3>
 <textarea name="Comment"></textarea><br />
 <input type="submit" value="Send" name="submit" />
 </form>
    ';
    
}
    
    
    
?>
<?php include 'includes/footer.php';?>