<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor\autoload.php';


	//getting data from contact form fields
	$name = $_POST['name'];
	$email = $_POST['email'];
	$services = $_POST['services'];
	$company = $_POST['company'];
	$message = $_POST['message'];
		  		
	
	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Contact Us</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name: </strong>".$name."</td>";
	$body .= "<td style='border:none;'><strong>Email: </strong>".$email."</td>";
	$body .= "<td style='border:none;'><strong>Phone number: </strong>".$services."</td>";
	$body .= "</tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject: </strong>".$company."</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>".$message."</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";
    
		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = 2;                                                        // Enable verbose debug output
			$mail->isSMTP();                                                                // Send using SMTP
            $mail->Host = 'smtp.gfg.com';
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'user@gfg.com';                                                         //SMTP Username
            $mail->Password   = 'password';                                                         //SMTP Password     
            $mail->SMTPSecure = 'tls';         
            $mail->Port       = 587;

			//Recipients
			$mail->setFrom($email, $name);
			$mail->addAddress('emmamariejeanne@gmail.com', 'You');    // recipient email address here


			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = "Contact us request from " .$name ;
			$mail->Body    = $body;
			$mail->AltBody = strip_tags($body);

			$mail->send();
					
			echo "Your mail has been sent successfully. ";


			
			
		} catch (Exception $e) {
			echo "Message could not be sent. Contact us for more details please.";


		}
    
    ?>
