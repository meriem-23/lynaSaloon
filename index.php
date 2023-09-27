<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lyna B MakeUp</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <section class="background" id="header">
        <video autoplay muted loop id="background-video">
            <source src="img&vid/background.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <nav>
            <img src="img&vid/logo.png" alt="Your Logo" id="logo">
            <i class="fas fa-bars" id="menuIcon" onclick="toggleMenu()"></i>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="#header">HOME</a></li>
                    <li><a href="">ABOUT</a></li>
                    <li><a href="">FEEDBACK</a></li>
                    <li><a href="">CONTACT</a></li>
                </ul>
                <span class="close-icon" onclick="toggleMenu()"><i class="fas fa-times"></i></span>
            </div>
        </nav>
        <div class="text-box">
            <h1>Welcome to your beauty space, lady</h1>
            <p><br>Step into our salon and savor the art of makeup and hairstyles.<br> Uncover your unique elegance with our skilled stylists,<br> and secure your reservation today for a transformative experience.<br> We're here to enhance your beauty journey.<br><br></p>
            <a href="#reserve" class="hero-btn">Reserve your spot</a>
        </div>
        <!-- Your content goes here -->
    </section>
    <section class="reservation" id="reserve">
        <video autoplay muted loop id="backgroundVideo">
            <source src="img&vid/background.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="textBox">
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/htdocs/HSalon/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/HSalon/PHPMailer/src/SMTP.php';
require 'C:/xampp/htdocs/HSalon/PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $age = $_POST["age"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $userType = $_POST["user-type"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'saloonlyna@gmail.com'; // Replace with your Gmail email
        $mail->Password = 'rumn grur fint nkis'; // Replace with your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Compose the email
        $mail->setFrom('saloonlyna@gmail.com', 'saloonlyna');
        $mail->addAddress('meriemibtihel23@gmail.com', 'meriem');
        $mail->isHTML(true);
        $mail->Subject = 'New Reservation';
        
        // Compose the email body with user data
        $message = "Name: $name<br>";
        $message .= "Phone Number: $phone<br>";
        $message .= "Age: $age<br>";
        $message .= "Date: $date<br>";
        $message .= "Time: $time<br>";
        $message .= "User Type: $userType<br>";

        $mail->Body = $message;

        // Send the email
        $mail->send();
        echo "Your reservation has been received. We will contact you shortly";
    } catch (Exception $e) {
          echo "Oops! Something went wrong. Please try again";
    }
    
}
?>

            <form action="index.php" method="post">
                <div class="form-box">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="form-box">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number">
                </div>
                <div class="form-box">
                    <label for="age">Age:</label>
                    <input type="text" id="age" name="age" placeholder="Enter your age">
                </div>
                <div class="form-box">
                    <label for="date">Select a Date:</label>
                    <input type="date" id="date" name="date">
                </div>
                <label for="time">Select a Time:</label>
                <input type="time" id="time" name="time" required>
                <div class="form-box">
                    <label for="user-type">Select your Type:</label>
                    <select id="user-type" name="user-type">
                        <option value="bride">Bride</option>
                        <option value="guest">Guest</option>
                    </select>
                </div>
                <button type="submit" class="reserve-btn">Reserve Now</button>
            </form>
        </div>
        <div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <p id="popup-message"></p>
    </div>
</div>

    </section>
<script>
    var navLinks = document.getElementById("navLinks");
        var menuIcon = document.getElementById("menuIcon");

         function toggleMenu() {
            if (navLinks.style.right === "0px") {
                navLinks.style.right = "-150px";
            } else {
                navLinks.style.right = "0px";
            }
        }//+ do (home ,about health fitness contact) in the right top corner + do logo.png in the top left corner of the website  and give me the html and css code  of those changes 

        function toggleMenuIconVisibility() {
            var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

            if (screenWidth > 700) {
                menuIcon.style.display = "none"; // Hide the menu icon for screens wider than 700px
                navLinks.style.right = "0"; // Ensure the menu is shown
            } else {
                menuIcon.style.display = "block"; // Show the menu icon for screens 700px or narrower
                navLinks.style.right = "-150px"; // Ensure the menu is hidden initially
            }
        }

        // Call the function to toggle menu icon visibility initially
        toggleMenuIconVisibility();

        // Add an event listener to handle resizing of the window
        window.addEventListener("resize", toggleMenuIconVisibility);

</script>  
    <script>
   // Function to open the popup and display the message
function openPopup(message) {
    var popup = document.getElementById("popup");
    var popupMessage = document.getElementById("popup-message");

    popupMessage.innerHTML = message;
    popup.style.display = "block";
}

// Function to close the popup
function closePopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";
}

    </script>
</body>
</html>
