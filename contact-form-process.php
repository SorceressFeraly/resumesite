<!DOCTYPE html>
<html lang="en">
    <?php
        include("head.php")
    ?>
<body>
    <div class = "container">
        
        <?php include("header.php") ?>
        
        <?php include("nav.php") ?>



<?php
    if (isset($_POST['email']))
    {
        
        $email_to = "leila.hallenberg@gmail.com";

        function problem($error)
        {
            echo "We are very sorry, but there were error(s) found with the form you submitted. ";
            echo "These errors appear below.<br><br>";
            echo $error . "<br><br>";
            echo "Please go back and fix these errors.<br><br>";
            exit();
        }

        // Check that all fields are filled in
        if (!isset($_POST['email']) || !isset($_POST['name']) || !isset($_POST['message']))
        {
            problem("Sorry, but there appears to be a problem.");
        }

        $name = $_POST['name']; // required
        $email = $_POST['email']; // required
        $message = $_POST['message']; // required
    
        $error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

        if (!preg_match($email_exp, $email)) {
            $error_message .= 'The Email address you entered does not appear to be valid.<br>';
        }
        $string_exp = "/^[A-Za-z .'-]+$/";

        if (!preg_match($string_exp, $name)) {
            $error_message .= 'The Name you entered does not appear to be valid.<br>';
        }

        if (strlen($message) < 2) {
            $error_message .= 'The Message you entered do not appear to be valid.<br>';
        }
    
        if (strlen($error_message) > 0) {
            problem($error_message);
        }

        // Create email
        $email_message = "Form details below.\n\n";

        // Remove elements that could impact security 
        function clean_string($string)
        {
            $bad = array("content-type", "bcc:", "to:", "cc:", "href");
            return str_replace($bad, "", $string);
        }

        $email_message .= "Name: " . clean_string($name) . "\n";
        $email_message .= "Email: " . clean_string($email) . "\n";
        $email_message .= "Message: " . clean_string($message) . "\n";

        $email_subject = "Website Contact " . clean_string($name);

        // create email headers
        $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
?>
        <main>
            <h1>
                Thank you! 
            </h1>
            <p>
                I will review your message and hopefully be in touch soon!
            </p>
        </main>
<?php
}
?>

        <?php include("footer.php") ?>
    </div>

</body>
</html>