<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	//Πέρνόυμε τις τιμές από την φόρμα..
	
	$name = htmlspecialchars($_POST["name"]);
	$email = htmlspecialchars($_POST["email"]);
	$phone = htmlspecialchars($_POST["phone"]);
	$pizza = htmlspecialchars($_POST["pizza"]);
	$drink = htmlspecialchars($_POST["drink"] ?? 'Κανένα');
	$payment = htmlspecialchars($_POST["payment"]);
	$comments = htmlspecialchars($_POST["order"]);
	
	//ημερομηνια και ώρα
	$datetime = date("Y-m-d H:i:s");
	
	// Το περιεχόμενο της παραγγελίας
	$orderData = "-------------------------\n";
    $orderData .= "Ημερομηνία: $datetime\n";
    $orderData .= "Όνομα: $name\n";
    $orderData .= "Email: $email\n";
    $orderData .= "Τηλέφωνο: $phone\n";
    $orderData .= "Πίτσα: $pizza\n";
    $orderData .= "Ποτό: $drink\n";
    $orderData .= "Πληρωμή: $payment\n";
    $orderData .= "Σχόλια/Διεύθυνση: $comments\n";
	
	//email της πιτσαρίας
	$to = "sttriantafillos.gr"; // το μαιλ σου
	$subject = "ΝΕΑ ΠΑΡΑΓΓΕΛΙΑ από το website";
	
	// Αποθήκευση στο order.txt
	$file = 'orders.txt';
	
	//Μήνυμα 
	
	 // Έλεγχος αν είναι εγγράψιμο
    if (is_writable($file)) {
        file_put_contents($file, $orderData . "\n", FILE_APPEND);
    } else {
        die("Δεν ήταν δυνατή η αποθήκευση της παραγγελίας. Ελέγξτε τα δικαιώματα του orders.txt");
    }

    // 4. Αποστολή email στον πελάτη (αν χρειάζεται)
    $subject = "Επιβεβαίωση Παραγγελίας – PiZza Piazza di Napoli";
    $headers = "From: pizzapiazza@yourdomain.com\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    $message = "Αγαπητέ/ή $name,\n\nΕυχαριστούμε για την παραγγελία σου!\n\n" . $orderData;

    mail($email, $subject, $message, $headers);

    // 5. Επιβεβαίωση στον χρήστη
    echo "<h2>Η παραγγελία σας καταχωρήθηκε με επιτυχία!</h2>";
    echo "<p>Θα επικοινωνήσουμε σύντομα μαζί σας.</p>";
    echo "<a href='index.html'>Επιστροφή στην αρχική</a>";
}
?>