<?php

	use PHPMailer\PHPMailer\PHPMailer;
    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $from = $_POST['email'];
        echo $from;
        $message = $_POST['message'];
       
       
	//require_once 'Mailer/PHPMailerAutoload.php';
    
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
	require_once "PHPMailer/OAuth.php";
	require_once "PHPMailer/POP3.php";
	
 $mail = new PHPMailer;
                         $mail->isSMTP();
                         $mail->Host = 'smtp.gmail.com';
                         $mail->SMTPAuth = true;
                         $mail->Username = 'bepperssocial@gmail.com';
                         $mail->Password = 'ncpyjkhujlyovatg';
                         $mail->SMTPSecure = 'tls';
                         $mail->Port = 587;
                         $mail->setFrom('bepperssocial@gmail.com', 'noreplay');
                         $mail->addAddress("bepperssocial@gmail.com");
                         // $mail->AddAttachment($path.$filename, $filename);
                         $mail->isHTML(true);
                         $mail->Subject = ("Booking Request From $name");
        $mail->Body = ("Customer Details:<br>
							Name:         $name <br>
							Email:        $from <br> 
							message:     $message  <br> 
							"); 
                         $mail->SMTPOptions = array(
                         'ssl' => array(
                         'verify_peer' => false,
                         'verify_peer_name' => false,
                         'allow_self_signed' => true)
                         );
                         if ($mail->send()) {
							
            echo "Thanks for Writting to us!" ;
           
        } else {
            echo "Something went wrong!" ;
            // $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
		
}
?>