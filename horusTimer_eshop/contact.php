<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$fname = htmlspecialchars(trim($_POST["fname"]));
	$lname = htmlspecialchars(trim($_POST["lname"]));
	$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$message = htmlspecialchars(trim($_POST["message"]));
	
	$to = "info@horustimershop.gr";
	$subject = "Website Message";
	$headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";
	
	$body = "Όνομα: $fname\nΕπώνυμο: $lname\nEmail: $email\nΜήνυμα:\n$message";
	
	
		if(mail($to, $subject, $body, $headers)) {
			
			echo "Το μηνυμα σας εστάλη με επιτυχια!";
		} else {
			
			echo "Υπηρξε σφάλμα κατά την αποστολή. Παρακαλώ προσπαθησε πάλι.";
		}
	}
	
	?>