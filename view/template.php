<?php

// TODO: Use $style for additional css
$style = NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">

    <?= ($style) ? $style : ""; ?>
    <!-- TODO: Change to a variable -->
    <title>Project Poodle</title>
</head>

<body>
    <header>
    <div class="headerWrapper">   
        <div id="headerLeft">
                <img src="#" alt="LOGO">
            </div>
            <div id="middleHeader">
  <!-- TO DO: ADD PAWPRINT ANIMATION FOR DESKTOP  -->
            </div>
            <div id="headerRight">
                <div class="desktopWrapper">
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Partners</a></li>
                        <li id="contactLink"><a href="#">Contact</a></li>
                        <li id="desktopLogInLink"><a href="index.php?action=login">Sign In</a></li>
                        <li><a href="index.php?action=registration">Sign Up</a></li>
                    </ul>
                </div>        
                <div id="mobileLogin">
                        <?php
                        if (!isset($_SESSION['id'])) {?>
                            <img src="" alt="default">
                            <a id="mobileLogin" href="index.php?action=login">Sign In</a> 
                        <?php 
                        } else {
                        ?>
                            <img src="" alt="default">
                            <a id="mobileLogin" href="index.php?action=petPreview&ownerId=<?php echo $_SESSION['id'] ?>">
                                <?php echo $_SESSION['name'] ?>
                            </a> 
                        <?php
                        }
                        ?>
                </div>
                <div class="menu-btn"> 
                        <div class="btn-line"></div> 
                        <div class="btn-line"></div> 
                        <div class="btn-line"></div>
                </div> 
                <div class="hoverWrapper">
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">Contact</a></li>
                        <?php
                        if (!isset($_SESSION['id'])) {?>
                        <li><a href="index.php?action=login">Sign In</a></li>
                        <li><a href="index.php?action=registration">Sign Up</a></li>
                        <?php 
                        } else {
                        ?>
                        <li><a href="index.php?action=logout">Sign Out</a></li>
                        <?php }
                        ?>
                    </ul>
                </div>
                <!-- The following script controls menu animation on Click -->
                <script> 
                    // select dom items 
                    const menuBtn =  
                        document.querySelector(".menu-btn"); 
                
                    const hoverWrapper =  
                        document.querySelector(".hoverWrapper"); 
                
                
                    // Set the initial state of the menu 
                    let showMenu = false; 
                
                    menuBtn.addEventListener("click", toggleMenu); 
                
                    function toggleMenu() { 
                        if (!showMenu) { 
                            menuBtn.classList.add("close"); 
                            hoverWrapper.classList.add("show"); 
                            showMenu = true; 
                        } else { 
                            menuBtn.classList.remove("close"); 
                            hoverWrapper.classList.remove("show"); 
                            showMenu = false; 
                        } 
                    } 
                </script> 
            </div>
        </div> 
    </header>

    <!-- TODO: Add Content -->
    <?= $content; ?>

    <!-- FOOTER START -->
    <footer>
        <ul class="footer">
            <li>Home</li>
            <li>Privacy & Legal</li>
            <li>Contact</li>
            <li>Career</li>
        </ul>
        <ul id="social-icons-list">
            <li>
                <a href="http://www.facebook.com/" title="facebook">
                    <span class="social icon-social-facebook-large">Facebook</span>
                </a>
            </li>
            <li>
                <a href="http://www.instagram.com/" title="instagram">
                    <span class="social icon-social-instagram-large">Instagram</span>
                </a>
            </li>
            <li>
                <a href="http://twitter.com/" title="twitter">
                    <span class="social icon-social-twitter-large">Twitter</span>
                </a>
            </li>
            <li>
                <a href="http://www.youtube.com/" title="youtube">
                    <span class="social icon-social-youtube-large">Youtube</span>
                </a>
            </li>
            <!-- Meet the team link -->
        </ul>    
        <p>
        © 2020 XXXXXXXX.com is a registered trademark. All rights reserved. 
        Macys.com, LLC, 151 West 34th Street, New York, NY 10001. Macy's 
        Credit and Customer Service, PO Box 8113, Mason, Ohio 45040. 
        Request our corporate name & address by email.
        </p>

    </footer>
</body>

</html>