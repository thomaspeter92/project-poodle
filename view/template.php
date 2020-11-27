<?php
//TODO: Default image URL
$DEFAULT_IMAGE_URL = "./private/defaultProfile.png";
$sessionImageURL = isset($_SESSION['imageURL']) ? $_SESSION['imageURL'] : $DEFAULT_IMAGE_URL;

// $notificationManager = new NotificationManager();


// TODO: Use $style for additional css
// $style = NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/Modal.css"/>
    <link rel="stylesheet" href="./public/css/login.css"/>
    <link rel="stylesheet" href="./public/css/form.css"/>

    <!-- FONT LINKS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,600;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <?= isset($style) ? $style : ""; ?>
    <!-- TODO: Change to a variable -->
    <title>Project Poodle</title>

    <style>
        #desktopSignUpLink:hover{
            cursor:pointer;
        }
        #desktopLogInLink:hover{
            cursor:pointer;
        }

    </style>
</head>

<body>
    <header>
        <div class="headerWrapper">
            <div id="headerLeft">
                <a href="index.php?action=landing"><img src="./public/images/logoHeader.png"></a>
            </div>
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
                <?php if (!isset($_SESSION['id'])): ?>
                    <div><img class="userImage" src="<?=$sessionImageURL;?>" alt="default"></div>
                    <div>
                    <a id="desktopLogInLink" href="#">Sign In</a>
                    <a id="desktopSignUpLink" href='#' class="headerSignUp">Sign Up</a> 
                    </div>
                <?php else :?>
                    <div class="userImageWrapper">
                        <div><img class="userImage" src="<?=$sessionImageURL;?>" alt="default"></div>
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
                        <a id="mobileLogin" href="index.php?action=petPreview"><?= $_SESSION['name']; ?></a>
                    </div>
                    <div class="notifications">
                        <i class="far fa-bell"></i>
                        <span id="notificationNumber">1</span>
                    </div>
                    <div class="signOutWrapper">
                        <a href="#" class="signOut" onclick="signAllOut()">Sign Out</a>
                    </div> 
                <?php endif; ?>
                </div>  
                <div id="mobileWrapper">
                <?php if (!isset($_SESSION['id'])): ?>
                    <div class="userImageWrapper">
                        <img class="userImage" src="<?=$sessionImageURL;?>" alt="default">
                    </div>
                <?php else: ?>  
                    <div class="mobileLoggedIn">
                        <div class="userImageWrapper">
                            <img class="userImage" src="<?=$sessionImageURL;?>" alt="default">
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
                                <?= $_SESSION['name']; ?>
                            </a> 
                        </div>
                        <div class="notifications">
                            <i class="far fa-bell"></i>
                            <span id="notificationNumber">1</span>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <div class="menu-btn"> 
                    <div class="btn-line"></div> 
                    <div class="btn-line"></div> 
                    <div class="btn-line"></div>
                </div> 
                <div class="hoverWrapper">
                    <div class="menuItems">
                    <?php if (!isset($_SESSION['id'])): ?>
                        <p id="mobileLogInLink1"><a href="#">Sign In</a></p>
                        <p id="mobileSignUpLink"><a href="#">Sign Up</a></p>
                    <?php else: ?>
                        <form id="signOutForm" method="POST">
                        </form>
                        <p><a href="#"  onclick="signAllOut()">Sign Out</a></p>
                    <?php endif; ?>
                        <p><a href="index.php?action=events">Events</a></p>
                        <p><a href="index.php?action=aboutUs">About Us</a></p>
                        <p><a href="index.php?action=partners">Partners</a></p>
                        <p><a href="index.php?action=contactPage">Contact</a></p>
                    </div>
                </div>
            </div>
        </div> 
    </header>

    <!-- TODO: Add Content -->
    <div id="templateContent"><?= $content; ?></div>

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

    <!-- NOTICE: tempContainer is for getting viewport height -->
    <div id="tempContainer"></div>

    <!-- The following script controls menu animation on Click -->
    <script>
    {
        let showMenu = false;   // Set the initial state of the menu 
        const menuBtn = document.querySelector(".menu-btn"); 
        const hoverWrapper = document.querySelector(".hoverWrapper"); 
        
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
    }
    </script> 
    <script src="./public/js/common.js"></script>
    <script src="./public/js/template.js"></script>
    <script src="./public/js/registrationCheck.js"></script>
    <script src="./public/js/formCheck.js"></script>
    <script src="./public/js/Modal.js"></script> 
    <script src="./public/js/ModalLogin.js"></script> 
    <script src="./public/js/signInUpModal.js"></script>
</body>

</html>