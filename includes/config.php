<?php
//config.php

//database credentials here
include 'credentials.php';

//This defines the current file name
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//echo THIS_Page;

//This allows us to add unique info to our pages
switch(THIS_PAGE)
{
    case "template.php":
        $title = "My Template Title Tag";
        $pageID = "My Template Page ID";
        break;
        
    case "daily.php":
        $title = "Daily Special";
        $pageID = "Daily Special";
        break;
    
    case "contact.php":
        $title = "Contact us";
        $pageID = "Contact us!";
        break; 
    
    case "index.php":
        $title = "Retro Diner";
        $pageID = "Welcome to Retro Diner!";
        break;     
        
    case "movie_list.php":
        $title = "Movie Night!";
        $pageID = "Movies!";
        break;      
    default:
        $title = THIS_PAGE;
        $pageID = "Retro Diner";

}//end switch

//here are our nav pages
$nav1['index.php'] = 'Home';
$nav1['template.php'] = 'Template';
$nav1['daily.php'] = 'Daily';
$nav1['movie_list.php'] = 'Movies';
$nav1['contact.php'] = 'Contact';

/*
<ul class="navigation">
				<li>
					<a href="index.html">Home</a>
				</li>
				<li>
					<a class="active" href="about.html">About</a>
				</li>
				<li>
					<a href="burger.html">Menu</a>
				</li>
				<li>
					<a href="contact.html">Contact</a>
				</li>
				<li>
					<a href="blog.html">Blog</a>
				</li>
			</ul>


foreach($nav1 as $link => $label)
{
    echo "link is $link and label is $label<br />";

}
*/

//echo $title;

//die;


/* creates links inside the header.php file


<li><a href="LINK">Label</a></li>

<li><a class="active" href="LINK">Label</a></li>
*/

function makeLinks($arr, $prefix='', $suffix='', $exception='')
{
    $myReturn = '';
    foreach($arr as $link => $label)
    {
        if(THIS_PAGE == $link){//current file gets active class
            $myReturn .= $exception . '<a href="' . $link . '">' . $label . '</a>' . $suffix;
        }else{
            $myReturn .= $prefix . '<a href="' . $link . '">' . $label . '</a>' . $suffix;
        }

    }

    return $myReturn;
}//end makelinks

/*
Allows us to send an email that respects the server domain spoofing polices of 
hosts like DH.

$response = safeEmail($to, $subject, $message, $replyTo='','html');

if($response)
{
    echo 'hopefully HTML email sent!<br />';
}else{
   echo 'Trouble with HTML email!<br />'; 
}

*/
function safeEmail($to, $subject, $message, $replyTo = '',$contentType='text')
{
    $fromAddress = "Automated Email <noreply@" . $_SERVER["SERVER_NAME"] . ">";

    if(strtolower($contentType)=='html')
    {//change to html format
        $contentType = 'Content-type: text/html; charset=iso-8859-1';
    }else{
        $contentType = 'Content-type: text/plain; charset=iso-8859-1';
    }
    
    $headers[] = "MIME-Version: 1.0";//optional but more correct
    //$headers[] = "Content-type: text/plain; charset=iso-8859-1";
    $headers[] = $contentType;
    //$headers[] = "From: Sender Name <sender@domain.com>";
    $headers[] = 'From: ' . $fromAddress;
    //$headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
    //$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
    
    if($replyTo !=''){
        $headers[] = 'Reply-To: ' . $replyTo;   
    }
    
    
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/". phpversion();
    
    $headers = implode(PHP_EOL,$headers);

    
    return mail($to, $subject, $message, $headers);

}//end safeEmail()

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
}