<?php 
if(isset($_POST['submit'])){
    $to = "emilytmdr@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address

    $name=$_POST['name'];
    $parts = explode(" ", $name);
    if (count($parts)>1){
        $last_name = array_pop($parts);
        $first_name = implode(" ", $parts);
    }
    else{
        $first_name = $name;
        $last_name = " ";
    }

    $subject = "Contact from Website";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    if($from != null){
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
   // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
    }

    header("Location:index.html");
    
    }
?>