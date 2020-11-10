<?php
//TODO: Default image URL
$DEFAULT_IMAGE_URL = "./private/profile/defaultProfile.png";
$sessionImageURL = isset($_SESSION['imageURL']) ? $_SESSION['imageURL'] : $DEFAULT_IMAGE_URL;

// TODO: Use $style for additional css
$style = NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <!-- FONT LINKS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,900;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Franco -->
    <meta name="google-signin-client_id" content="659257235288-dmc48l918ev0pi5073mmg5st88bsesvl.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js?onload=initGoogle" async defer></script> 
    <script src='https://developers.kakao.com/sdk/js/kakao.min.js?onload=initKakao'></script>
    <?= ($style) ? $style : ""; ?>
    <!-- TODO: Change to a variable -->
    <title>Project Poodle</title>
</head>

<body>
    <header>
    <div class="headerWrapper">   
        <div id="headerLeft">
                <img src="./public/images/dogLogo.png" alt="LOGO" height="40" width="40">
            </div>
            <div id="middleHeader">
  <!-- TO DO: ADD PAWPRINT ANIMATION FOR DESKTOP  -->
            </div>
            <div id="headerRight">
                <div class="desktopWrapper">
                    <ul>
                        <li><a href="index.php?action=aboutUs">About Us</a></li>
                        <li><a href="#">Partners</a></li>
                        <li id="contactLink"><a href="index.php?action=contactPage">Contact</a></li>
                        <?php
                        if (!isset($_SESSION['id'])) {?>
                            <img src="" alt="default"><li id="desktopLogInLink"><a href="index.php?action=login">Sign In</a></li>
                            <li><a href="index.php?action=registration">Sign Up</a></li>
                            <?php 
                        } else {
                        ?>
                            <img src="" alt="default">
                            <li>
                                <a id="desktopLogin" href="index.php?action=petPreview">
                                    <?php echo $_SESSION['name'] ?>
                                </a>
                            </li>
                            <li><a href="index.php?action=logout">Sign Out</a></li> 
                        <?php
                        }
                        ?>
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
                            <img src=<?= $sessionImageURL;?> alt="default">
                            <a id="mobileLogin" href="index.php?action=petPreview">

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
                        <li><a href="index.php?action=aboutUs">About Us</a></li>
                        <li><a href="#">Partners</a></li>
                        <li><a href="index.php?action=contactPage">Contact</a></li>
                        <?php
                        if (!isset($_SESSION['id'])) {?>
                        <li><a href="index.php?action=login">Sign In</a></li>
                        <li><a href="index.php?action=registration">Sign Up</a></li>
                        <?php 
                        } else {
                        ?>
                        <form id="signOutForm" method="POST">
                        </form>
                        <!-- Franco -->
                        <!-- <li><a href="index.php?action=logout">Sign Out</a></li>  -->
                        <li><a href="#" onclick="signAllOut()">Sign Out</a></li>
                        <?php }
                        ?>
                    </ul>
                </div>
                <!-- The following script controls menu animation on Click -->

                <!-- //Franco -->
                <script src="./public/js/googlelogin.js"></script>
                <script src="./public/js/kakaologin.js"></script>
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

                    //Franco 
                    // function signAllOut(){

                    //     //sign out from google
                    //     googleSignOut();
                    //     logoutWithKakao();

                    //     const form = document.querySelector("#signOutForm");
                    //     form.action = "index.php?action=logout";
                    //     form.submit();
                    // }

                    function initGoogle(){
                        const CLIENT_ID = '659257235288-dmc48l918ev0pi5073mmg5st88bsesvl.apps.googleusercontent.com';
                        gapi.load('auth2', function() {
                        gapi.auth2.init({client_id:CLIENT_ID});
                         });
                    }

                    function initKakao(){
                        Kakao.init("cea8248c64bf22c135e642408c2fb6c2");
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
    <script src="./public/js/carousel.js"></script>
</body>

</html>