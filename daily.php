<?php include 'includes/config.php';?>

<?php 

if(isset($_GET['day']))
{//show the selected day

    $myDay = $_GET['day'];

}else{//show today
    
    $myDay = date('l');

}

switch($myDay)
{
    case 'Sunday':
       $img = 'rainier_lake.jpg';
	   $alt = 'Mount Rainier';
       $dayOfWeek = "Wednesday";
        
    case 'Monday':
        $img = 'monday.jpg';
        $alt = 'Bill Murray Monday';
        break;
    
    case 'Tuesday':
        $img = 'blossom_stairway.jpg';
        $alt = 'Cherry Blossom Covered Stairway';
        break;  
    
     case 'Wednesday':
        $img = 'waterfall.jpg';
        $alt = 'Waterfall in forest';
        break;  
    
     case 'Thursday':
        $img = 'spaceneedle_donut.jpg';
	    $alt = 'Space Needle from Voluteer Park';
        break;  
    
     case 'Friday':
        $img = 'pugetsoundboats.jpg';
	    $alt = 'Puget Sound with sailboats';
        break;  
    
     case 'Saturday':
        $img = 'pugetsound_market.jpg';
	    $alt = 'Public Market Sign';
        break;  
        
}


?>

<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<p>It's a lovely <?=$myDay?>!</p>
<img src="images/<?php echo $img; ?>" alt="<?php echo $alt; ?>">

<p><a href="daily.php?day=Sunday">Sunday</a></p>
<p><a href="daily.php?day=Monday">Monday</a></p>
<p><a href="daily.php?day=Tuesday">Tuesday</a></p>
<p><a href="daily.php?day=Wednesday">Wednesday</a></p>
<p><a href="daily.php?day=Thursday">Thursday</a></p>
<p><a href="daily.php?day=Friday">Friday</a></p>
<p><a href="daily.php?day=Saturday">Saturday</a></p>



<h1>Daily Special Email</h1>

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
 
 <h3>Email Frequency</h3>
 Daily <input type="radio" name="frequency" value="daily"><br />
 Weekly <input type="radio" name="frequency" value="weekly"><br />
 <br />
 <h3>Comments</h3>
 <textarea name="Comments"></textarea><br />
 <input type="submit" value="Send" name="submit" />
 </form>
    ';
    
}
    
    
    
?>


<?php include 'includes/footer.php';?>