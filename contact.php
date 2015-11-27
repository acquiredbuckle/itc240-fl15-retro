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
    $to = 'mthomp29@seattlecentral.edu';
    $message = process_post();
    $subject = 'Test from contact form';
    $replyTo = $_POST['Email'];
    
    safeEmail($to, $subject, $message, $replyTo='','html');
    
}else{//show form
    
 echo '
 <form method="post" action"' . THIS_PAGE . '">
 Name: <input type="text" name="Name" required="required" /><br />
 Email: <input type="email" name="Email" required="required" /><br />
 <br /> 
 <h3>Order</h3>
 Burger <input type="checkbox" name="order" value="burger"><br />
 Fries <input type="checkbox" name="order" value="fries"><br />
 Milkshake <input type="checkbox" name="order" value="milkshake"><br />
 <br />
 <h3>Payment Method</h3>
 Visa <input type="radio" name="payment" value="visa"><br />
 Mastercard <input type="radio" name="payment" value="mastercard"><br />
 Cash <input type="radio" name="payment" value="cash"><br />
 <br />
 <h3>Comments</h3>
 <textarea name="Comments"></textarea><br />
 <input type="submit" value="Send" name="submit" />
 </form>
    ';
    
}
    
    
    
?>
<?php include 'includes/footer.php';?>