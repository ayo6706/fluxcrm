<?php

include "db.php";



ini_set("include_path", '/home2/vadtonte/php:' . ini_get("include_path") );
$currentDate = date('Y-m-d'); //this will get the current date ie when this was posted 2107-07-06



	  $remind_query1 = "SELECT * FROM event WHERE adminalert= '$currentDate' "; //Sql query to find users that reminders dates match current date.
    
	if($run1 = $conn->query($remind_query1))
    {
	 $rows = $run1->num_rows;
      
      for ($j = 0; $j < $rows; ++$j)//loop through each user in results and send a reminder email.
      {
      	$run1->data_seek($j);
      	$row = $run1->fetch_array(MYSQLI_NUM);
      	
      	
      	
		  

        error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

        
        require_once "Mail.php";
        
        $host = "ssl://mail.repotecc.com";
        $username = "ayomide@repotecc.com";
        $password = "Vadtontech1953.";
        $port = "465";
        $to = "ayo6706@gmail.com"; //gets the user email address
    
        $email_from = "ayomide@repotecc.com";
        $email_subject = "Subject Line Here:" ;
        $email_body = "Hi ".$row[3]."\nguy a reminder that am testing you about your event coming up  on the ".$row[7].",\n"
		."Please get ready thank you\n"."\nThank You"."\nBridges Nursery";
        $email_address = "ayomide@repotecc.com";
        
        $headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address);
        $smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
        $mail = $smtp->send($to, $headers, $email_body);
        
        
        if (PEAR::isError($mail)) {
        echo("<p>" . $mail->getMessage() . "</p>");
        } else {
        echo("<p>Message successfully sent!</p>");
        }





      }
		
	}


?>