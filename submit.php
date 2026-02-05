<?php
// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form data safely
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $involvement = htmlspecialchars($_POST['involvement']);

    // ======== UPDATE THIS EMAIL ========
    $to = "goitsem07@gmail.com"; // Replace with your church email
    // ====================================

    // Email subject and body
    $subject = "New Church Partnership Submission";
    $message = "New Church Partnership Submission:\n\n";
    $message .= "Name: $firstName $lastName\n";
    $message .= "Email: $email\n";
    $message .= "How they want to be involved:\n$involvement\n";

    // Headers
    $headers = "From: elshaddai2ndchurch@gmail.com\r\n"; // sender
    $headers .= "Reply-To: $email\r\n"; // reply to visitor

    // Send the email
    $success = mail($to, $subject, $message, $headers);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F4EFEA; /* beige */
            color: #2F3E3E;
            text-align: center;
            padding: 80px 20px;
        }
        h1 {
            color: #4F7C7A; /* muted teal */
            font-size: 36px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 25px;
        }
        a {
            text-decoration: none;
            color: #C26A5A; /* terracotta */
            font-weight: 600;
        }
        a:hover {
            color: #A4574A; /* darker terracotta */
        }
    </style>
</head>
<body>
    <?php if(isset($success) && $success): ?>
        <h1>Thank You!</h1>
        <p>Your submission has been received. We will contact you soon.</p>
        <p><a href="index.html">Go back to the Partnership Page</a></p>
    <?php else: ?>
        <h1>Oops!</h1>
        <p>Something went wrong while sending your form. Please try again later.</p>
        <p><a href="index.html">Go back to the Partnership Page</a></p>
    <?php endif; ?>
</body>
</html>
