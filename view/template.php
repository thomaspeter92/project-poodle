<?php
//TODO: Default image URL
$DEFAULT_IMAGE_URL = "./private/profile/defaultProfile.png";
$sessionImageURL = isset($_SESSION['imageURL']) ? $_SESSION['imageURL'] : $DEFAULT_IMAGE_URL;

// TODO: Use $style for additional css
// $style = NULL;
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
    <?= isset($style) ? $style : ""; ?>
    <!-- TODO: Change to a variable -->
    <title>Project Poodle</title>
</head>

<body>
    <header>
        <div class="headerWrapper">
        <?php
        if (!isset($_SESSION['id'])) { ?>
            <div id="headerLeft">
                <a href="index.php?action=landing"><img src="./public/images/logoHeader.png"></a>
                <!-- <img src="./public/images/dogLogo.png" alt="LOGO" height="40" width="40"> -->
            </div>
        <?php
        }else{
        ?>
            <div id="headerLeft">
                <a href="index.php?action=petPreview"><img src="./public/images/logoHeader.png"></a>
                <!-- <img src="./public/images/dogLogo.png" alt="LOGO" height="40" width="40"> -->
            </div>
        <?php
        }
        ?>
            <div id="middleHeader">
  <!-- TO DO: ADD PAWPRINT ANIMATION FOR DESKTOP  -->
            </div>
            <div id="headerRight">
                <div class="desktopWrapper">
                        <div class="headerLinks">
                            <a href="index.php?action=events">Events</a>
                            <a href="index.php?action=aboutUs">About Us</a>
                            <a href="index.php?action=partners">Partners</a>
                            <a href="index.php?action=contactPage">Contact</a>
                        </div>
                        <?php
                        if (!isset($_SESSION['id'])) {?>
                            
                            <div><img class="userImage" src="./public/images/adminPlaceholder.png" alt="default"></div>
                            <div>
                                <a href="index.php?action=login">Sign In</a>
                                <a class="headerSignUp" href="index.php?action=registration">Sign Up</a>
                            </div>
                            <?php 
                        } else {
                        ?>
                            <div class="userImageWrapper">
                                <div><img class="userImage" src="./public/images/adminPlaceholder.png" alt="default"></div>
                                <!-- <div><i class="fas fa-star"></i></div> -->
                                <div class="stars">
                                    <img class="" src="./public/images/star.png" alt="default">
                                    <img class="" src="./public/images/star.png" alt="default">
                                    <img class="" src="./public/images/star.png" alt="default">
                                    <img class="" src="./public/images/star.png" alt="default">
                                    <img class="" src="./public/images/star.png" alt="default">
                                </div>
                            </div>
                            <div>
                                <a id="mobileLogin" href="index.php?action=petPreview"><?php echo $_SESSION['name'] ?></a>
                            </div>
                            <div>
                                <i class="far fa-bell"></i>
                            </div>
                            <div class="signOutWrapper">
                                <!-- <a class="signOut" href="#" onclick="signAllOut()">Sign Out</a> -->
                                <a class="signOut" href="index.php?action=logout">Sign Out</a>  
                            </div> 
                        <?php
                        }
                        ?>
                </div>  
                <div id="mobileWrapper">
                        <?php
                        if (!isset($_SESSION['id'])) {?>
                            <div class="userImageWrapper">
                                <img class="userImage" src="./public/images/adminPlaceholder.png" alt="default">
                            </div>
                            <div class="mobileSignInWrapper">
                                <a class="mobileSignIn" href="index.php?action=login">Sign In</a> 
                            </div>
                        <?php 
                        } else {
                        ?>  
                            <div class="mobileLoggedIn">
                                <div class="userImageWrapper">
                                    <img class="userImage" src="./public/images/adminPlaceholder.png" alt="default">
                                    <!-- <div class="userImage"> -->
                                    <!-- <div><img src=<?= $sessionImageURL;?> alt="default"></div> -->
                                    <div class="stars">
                                        <img class="" src="./public/images/star.png" alt="default">
                                        <img class="" src="./public/images/star.png" alt="default">
                                        <img class="" src="./public/images/star.png" alt="default">
                                        <img class="" src="./public/images/star.png" alt="default">
                                        <img class="" src="./public/images/star.png" alt="default">
                                    </div>
                                </div>
                                <div>
                                    <a href="index.php?action=petPreview">
                                        <?php echo $_SESSION['name'] ?>
                                    </a> 
                                </div>
                                <div>
                                    <i class="far fa-bell"></i>
                                </div>
                            </div>
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
                    <div class="menuItems">
                        <?php
                        if (!isset($_SESSION['id'])) {?>
                            <p><a href="index.php?action=login">Sign In</a></p>
                            <p><a href="index.php?action=registration">Sign Up</a></p>
                        <?php 
                        } else {
                        ?>
                        <p><a href="index.php?action=logout">Sign Out</a></p>
                         <!-- <p><a href="#" onclick="signAllOut()">Sign Out</a></p> -->
                        <?php }
                        ?>
                        <p><a href="index.php?action=events">Events</a></p>
                        <p><a href="index.php?action=aboutUs">About Us</a></p>
                        <p><a href="index.php?action=partners">Partners</a></p>
                        <p><a href="index.php?action=contactPage">Contact</a></p>
                    </div>
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
        <div id="partner-icons-list">
            <div id="icon-partner-wcoding-large">
                <a href="http://www.wcoding.com/" title="wcoding">
                    <img src="./public/images/partners/wcoding1.png" alt="wcoding">
                </a>
            </div>
            <div id="icon-partner-lechienblanc-large">
                <a href="https://www.instagram.com/lechienblancseoul/" title="lechienblanc">
                    <img src="./public/images/partners/leChienBlanc.jpg" alt="lechienblanc">
                </a>
            </div>
        </div>
    </footer>
</body>

</html>