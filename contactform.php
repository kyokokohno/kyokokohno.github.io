<?php
    $errors = '';
    $myemail = 'kyokokohno@gmail.com';//<-----Put Your email address here.
    if(empty($_POST['lastname'])  ||
    empty($_POST['firstname'])  ||
       empty($_POST['email']) ||
       empty($_POST['subject']))
    {
        $errors .= "\n Error: all fields are required";
    }
    $lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $email_address = $_POST['email'];
    $message = $_POST['subject'];
    if (!preg_match(
    "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
    $email_address))
    {
        $errors .= "\n Error: Invalid email address";
    }
    
    if( empty($errors))
    {
    $to = $myemail;
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. ".
    " Here are the details:\n Name: $ fname $lname \n ".
    "Email: $email_address\n Message \n $message";
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
    header('Location: contact-thanks.html');
    }
    ?>