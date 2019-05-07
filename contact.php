<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:700|Raleway:200" rel="stylesheet">
    <link rel="stylesheet" href="css_reset.css">
    <link rel="stylesheet" href="style.css">
</head>
<body id="contactPage">
    <?php 
      require('Includes/header.php');
      if (!array_key_exists('Submitted', $_POST))
       {
    ?>
    <div class="contactHeader">
        <h1 class="contactHeading">Reach Out</h1>
    </div>
    <section class="contact" id="contact">
    <div id="form-message"></div>
        <form method="POST" action="contact.php" class="contactForm" id="contactForm">
            <input type="hidden" name="Submitted" value="true"><br>
            <input id="firstName" type="text" name="fname" placeholder="First Name">
            <input id="lastName" type="text" name="lname" placeholder="Last Name">
            <input id="contactEmail" type="email" name="email" placeholder="Email">
            <textarea id="message" class="message" name="message"></textarea>
            <input id="contactSubmit" type="submit" value="Submit">
        </form>
    </section>
   

<?php 
} else {
    require("Includes/class.phpmailer.php");
    $to = 'example@email.com';
    $from = 'example@email.com';
    $ReplyTo = $_POST['email'];
    $fromName = $_POST['fname'] . ' ' . $_POST['lname'];
    $subject = 'Contact Form Submission';
    $message = $_POST['message'];
    $host = 'mail.example.com';
    $html = false;

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = $host;

    $mail->SMTPAuth=true;
    $mail->Username = 'example@email.com';
    $mail->Password = 'example_password';
  

    $mail->From = $from;
    $mail->FromName = $fromName;
    $mail->AddReplyTo($ReplyTo, $fromName);
    $mail->AddAddress($to);
   

    $mail->WordWrap = 50;
    $mail->IsHTML($html);

    $mail->Subject = $subject;
    $mail->Body = $message;

    if($mail->Send())
    {
        echo 'Message Sent';
    } 
    else 
    {
        echo 'Message Not Sent<br>';
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

include('Includes/footer.php');
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="pet-shop.js"></script>
</body>
</html>
