<?php
    include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $title; ?></title>
</head>

<body>
    <header>
        <div class="logo"><a href=".">My Portfolio</a></div>
        <div class="toggle"></div>
        <div class="navigation ">
            <ul>
                <li><a href=".">Home</a></li>
                <li><a href="mywork.php">My Work</a></li>
                <li><a href="contact.php">Contact Me</a></li>
            </ul>
            <div class="social-bar">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/ionut.vasilache.7" target="_blank">
                            <img src="images/facebook.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/vasilachepogi" target="_blank">
                            <img src="images/twitter.png" alt="">
                        </a>
                    </li>
                </ul>
                <a href="mailto:vasilacheorionut@gmail.com" class="email-icon">
                    <img src="images/email.png" alt="">
                </a>
            </div>
        </div>
    </header>