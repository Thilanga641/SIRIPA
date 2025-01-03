<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="contact.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .success-message {
            background-color: #d4edda;
            color:rgb(72, 156, 92);
            padding: 15px;
            margin: 10px auto;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            text-align: center;
            max-width: 600px;
        }
    </style>
  </head>
  <body>
  <?php
    // Check if a success message exists in the session
    if (isset($_SESSION['message'])) {
        echo "<div class='success-message'>" . $_SESSION['message'] . "</div>";
        
        // Clear the message from the session
        unset($_SESSION['message']);
    }
    ?>

<div class="contact-section">

  <h1>Contact Us</h1>
  
  <form class="contact-form" action="contact_connect.php" method="post">
  <input type="text" name="name" class="contact-form-text" placeholder="Your name" required>
  <input type="email" name="email" class="contact-form-text" placeholder="Your email" required>
  <input type="text" name="phone" class="contact-form-text" placeholder="Your phone" required>
  <textarea name="message" class="contact-form-text" placeholder="Your message" required></textarea><br><br>
  <input type="submit" class="contact-form-btn" value="Send">
</form>
</div>

</body>
</html>
