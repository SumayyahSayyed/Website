<?php
require_once __DIR__ . '/bootstrap.php';
// $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$manager = new MongoDB\Driver\Manager('mongodb+srv://SamSayyed:mySampassword123@mydatabasecluster.ib0uvs4.mongodb.net/');


session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>MeanArena</title>

    <style>
        .box-main {
            background-image: url(/Website/images/pic.png);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .background {
            background: transparent;
        }
        .text-footer {
            background-color: #1D3E53;
        }
        .firstHalf {

            padding-right: 230px;
        }
        form button {
            background-color: #77ABB7;
        }
        .contact {
            margin-top: 25px;
            background-color: #1D3E53;
        }
        .sectionSubteg {
            font-size: 17px;
            text-align: justify;

        }
        form {
            background: transparent;
        }
        form input,
        textarea {
            background-color: white;
        }
        .nav-list li a:hover,
        .nav-list li a.active {
            text-decoration: none;
            color: rgb(255, 255, 255);
            font-weight: bolder;
        }
        .navbar {
            width: 100%;
            background-color: #1D3E53;
            overflow: auto;
        }
        .navbar a {
            float: left;
            text-align: center;
            padding: 9px;
            color: white;
            text-decoration: none;
            font-size: 17px;
        }
        @media screen and (max-width: 500px) {
            .navbar a {
                float: none;
                display: block;
            }
        }
        .fa-user {
            padding-left: 653px;
        }
        form h3 {
            color: rgb(255 255 255);
            font-weight: 1000;
            margin-bottom: 30px;
            text-align: center;
            font-size: 25px;
        }
        .btn{
            padding: 4px 10px;
        }
        .navbar a:hover{
            color:#77ABB7;
        }
        .btn:hover{
            color: white;
        }
        .my-logo{
            width: 35px;
        }
    </style>
</head>

<body>
    <nav class="navbar background">
        <ul class="nav-list">
            <!-- <a href="index.php"> <img src="images/logo.png" alt="logo"></a>
                <li> <a href="#feature"> Feature </a></li>
            <li><a href="../Website/dashboard/dashboard.php">Dashboard</a></li> -->
            
            <a class="nav-list active" href="index.php"> <img src="images/logo.png" class="my-logo" alt="logo"> <span
                    class="d-none d-lg-block" style="font-size: 26px;
                color: white;
                font-weight: bolder; vertical-align: super; padding-left: 4px;">MeanArena</span></a>
            <div class="navbar" style="padding-left: 48px;">
                <a class="active" href="#feature"><i class="fa fa-fw fa-search"></i> Features
                </a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <a href="../Website/dashboard/dashboard.php"><i class="fa fa-fw fa-home"></i> Dashboard</a>
            </div>
        </ul>
        <?php
        
            // start the session
            
            if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true){
                echo '<a href="php/logout.php" class="rightnav" id=home>
                        <button class="btn btn-sm">Log Out</button>
                    </a>';
            }  else {
                echo '<a href="register/register.html"><i class="fa fa-fw fa-user" id=home></i> Sign Up</a>';
            }
        ?>
    </nav>
    <section class="background firstsection">
        <div class="box-main">
            <div class="firstHalf">
                <p class="text-big " style="font-size: 40px; font-weight: bolder;">Stuck with difficult words <br> while
                    reading articles?</p>
                <p class="text-small mb-4" style="margin-top: 14px;">MeanArena lets you save definitions and
                    translations <br> of wordsfrom any webpage</p>
                <div class="button" style="margin-top: 20px;">
                    <a class="btn"
                        style="color: black; border: 2px solid #77abb7; margin-top: 14px; background-color: #77abb7;">Install</a>
                    <a href="#contact" class="btn"
                        style="color: black; border: 2px solid #77abb7; margin-top: 14px; background-color: #77abb7; text-decoration: none;">Contact
                        Us</a>
                </div>
            </div>

            <div class="secondHalf">
                <!--<img src="7799135.jpg" alt="">-->
            </div>
        </div>
    </section>
    <h1 style="text-align: center; font-size: 40px;    font-weight: 700!important;">Cool Features</h1>
    <section class="secright" id="feature"
        style="margin-left:50px; margin-top:50px; background-color: rgb(255, 255, 255); border-radius: 0.380rem;">
        <div class="paras" style="background-color: rgb(255, 255, 255);">
            <p class="font-weight-bold mb-4 heading"
                style="background-color: rgb(255, 255, 255); font-size: 36px; font-weight: 700!important; margin-bottom: 1.5rem!important; line-height: 1.2; box-sizing: border-box;">
                Double-click search! </p>
            <p class="sectionSubteg text-small mb-4">Search just by selecting the word on any webpage.</p>
        </div>
        <div class="secright2-thumbnail">
            <!-- <img src="inaki-del-olmo-NIJuEQw0RKg-unsplash.jpg" alt="" class="imgfluid">-->
            <video style="margin-left: 10px; width: 135%;" autoplay src="images/2.mp4"></video>
        </div>
    </section>


    <section class="secleft"
        style="flex-direction: row-reverse; margin-left: 56%; background-color: rgb(255, 255, 255); border-radius: 0.38rem;">
        <div class="paras" style="background-color: rgb(255, 255, 255);">
            <p class="sectiontag text-big"
                style="background-color: rgb(255, 255, 255); font-size: 36px; font-weight: 700!important; margin-bottom: 1.5rem!important; line-height: 1.2; box-sizing: border-box;">
                YouTube Link! </p>
            <p class="sectionSubteg text-small"> Not only on web pages but it will also work in YouTube videos through transcripts.
            </p>
        </div>
        <div class="secleft-thumbnail">
            <!-- <img src="alexander-grey-O2u6gA2esAI-unsplash (1).jpg" alt="" class="imgfluid"> -->
            <video style="margin-left: -70%; width:158%;" autoplay src="images/3.mp4"></video>
        </div>

    </section>
    <section class="secright" style="margin-left:50px; background-color: rgb(255, 255, 255); border-radius: 0.380rem;">
        <div class="paras" style="padding:15px 65px;background-color: rgb(255, 255, 255);">
            <p class="sectiontag text-big"
                style="background-color: rgb(255, 255, 255); font-size: 36px; font-weight: 700!important; margin-bottom: 1.5rem!important; line-height: 1.2; box-sizing: border-box;">
                Track your Learning! </p>
            <p class="sectionSubteg text-small"> You will be given a dashboard where you can recall and delete those
                words which you have learned.
            </p>
        </div>
        <div class="secright1-thumbnail">
            <!-- <img src="elisa-calvet-b-S3nUOqDmUvc-unsplash.jpg" alt="" class="imgfluid"> -->
            <video style="margin-left: 10px; width:162%;" autoplay src="images/1.mp4"></video>
        </div>
    </section>
    <section class="secleft" 
    style="flex-direction: row-reverse; margin-left: 56%; background-color: rgb(255, 255, 255); border-radius: 0.38rem;">
        <div class="paras" style="background-color: rgb(255, 255, 255);">
            <p class="sectiontag text-big"
                style="background-color: rgb(255, 255, 255); font-size: 36px; font-weight: 700!important; margin-bottom: 1.5rem!important; line-height: 1.2; box-sizing: border-box;"> Web-page Scanning! </p>
            <p class="sectionSubteg text-small"> Scans the page and highlights those words which are already in your
                saved list.
            </p>
        </div>
        <div class="secleft-thumbnail">
            <!-- <img src="kimberly-farmer-lUaaKCUANVI-unsplash.jpg" alt="" class="imgfluid"> -->
            <video style="margin-left: -70%; width:158%;" autoplay src="images/3.mp4"></video>
        </div>
    </section>

    <section class="contact" id="contact">
        <form onsubmit="sendEmail(); reset(); return false;">
            <h3 style="margin-bottom: 20px;">GET IN TOUCH</h3>
            <input type="text" id="name" placeholder="Your Name" required>
            <input type="email" id="email" placeholder="Email ID" required>
            <input type="number" id="Phone" placeholder="Phone Number" required>
            <textarea id="message" rows="4" placeholder="How can we help you?"></textarea>
            <button type="submit">Send</button>
        </form>

    </section>
    <hr style="border-bottom: thin;">
    <script src=" https://smtpjs.com/v3/smtp.js"></script>
    <script>
        function sendEmail() {
            Email.send({
                secureToken: "7606b465-c3bc-4504-b098-58542af1d22c",
                Host: "smtp.elasticemail.com",
                Username: 'ashumar200@gmail.com',
                Password: "143D257C470F1361B5D866CD7E336D64C573",
                To: 'sumayyahsayyed26@gmail.com',
                From: document.getElementById("email").value,
                Subject: "New contact from Enquiry",
                Body: "your Name:" + document.getElementById("name").value
                    + "<br> Email ID: " + document.getElementById("email").value
                    + "<br> Phone Number: " + document.getElementById("Phone").value
                    + "<br> Message: " + document.getElementById("message").value
            }).then(
                message => alert("message sent successfully")
            );
        }
    </script>
    <footer class="background">
        <p class="text-footer">
            copyright &copy; 2027 - All rights reserved
        </p>
    </footer>
</body>

</html>