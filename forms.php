<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  $to = "katamamusoke@gmail.com";
  $subject = "Message from Contact Form";
  $body = "Name: $name\nEmail: $email\nMessage: $message";

  if (mail($to, $subject, $body)) {
    echo "Message sent successfully.";
  } else {
    echo "Error sending message.";
  }
}
?>
