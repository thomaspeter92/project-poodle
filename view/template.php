<?php
//TODO: Default image URL
define("DEFAULT_IMAGE_URL", "./private/defaultProfile.png");
$sessionImageURL = isset($_SESSION['imageURL']) ? $_SESSION['imageURL'] : DEFAULT_IMAGE_URL;


// this code pulls notifications from database
if(isset($_SESSION['id'])) {
    $notifications = checkNotifications($_SESSION['id']);

};
// echo "<pre>";
// print_r($notifications);
// echo "</pre>";

function time_elapsed_string($datetime, $full = false) {
    date_default_timezone_set('Asia/Seoul');
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

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
    
    <!-- COUNTDOWN SCRIPT -->
    <script src="./public/js/countdown.js"></script>
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
                    <?php if (!isset($_SESSION['id'])) { ?>
                    <div><img class="userImage" src="<?=$sessionImageURL;?>" alt="default"></div>
                    <div>
                    <a id="desktopLogInLink" href="#">Sign In</a>
                    <a id="desktopSignUpLink" href='#' class="headerSignUp">Sign Up</a> 
                    </div>
                    <?php } else {?>
                    <div class="userImageWrapper">
                        <div><img class="userImage" src="<?=$sessionImageURL;?>" alt="default"></div>
                        <!-- <div><i class="fas fa-star"></i></div> -->
                        <div class="starsDesktop">
                            <input type="hidden" class="starValue" value=<?= $_SESSION['rating']; ?>> </input>
                            <!-- <img class="" src="./public/images/star.png" alt="default">
                            <img class="" src="./public/images/star.png" alt="default">
                            <img class="" src="./public/images/star.png" alt="default">
                            <img class="" src="./public/images/star.png" alt="default">
                            <img class="" src="./public/images/star.png" alt="default"> -->
                        </div>
                    </div>
                    <div class="profileLink">
                        <a id="desktopLogin" href="index.php?action=petPreview"><?= $_SESSION['name']; ?></a>
                    </div>
                    <div class="notificationsDropdownDesktop">
                        <i class="far fa-bell"></i>
                        <span id="notificationNumber">
                            <?php 
                                $notificationNumber = 0; 
                                //Franco
                                if(is_array($notifications)){
                                for ($i=0;  $i<count($notifications); $i++) {
                                    if ($notifications[$i]['viewed'] == NULL) {
                                        if (isset($notifications[$i]['eventDate'])) {
                                            date_default_timezone_set('Asia/Seoul');
                                            $unixEvent = strtotime($notifications[$i]['eventDate']);
                                            $timeToEvent = $unixEvent-time();
                                            if ($timeToEvent<7200 AND $timeToEvent>0) {
                                                $notificationNumber++;
                                            } else {
                                                continue;
                                            }
                                        } else {
                                            $notificationNumber++;
                                        }                                    
                                    }
                                } 
                                echo $notificationNumber;
                            ?>
                        </span>
                        <div class="notificationsDropdownContentDesktop">
                            <?php

                                for ($i=0;  $i<count($notifications); $i++) {
                                    // notification for countdown
                                    // && $notifications[$i]['eventDate'] - time() > 0 && $notifications[$i]['eventDate' - time() < ]
                                    if (isset($notifications[$i]['eventDate'])) {
                                        date_default_timezone_set('Asia/Seoul');
                                        $unixEvent = strtotime($notifications[$i]['eventDate']);
                                        $timeToEvent = $unixEvent-time();
                                        if ($timeToEvent<7200 AND $timeToEvent>0) {
                                        echo '<a href="'.$notifications[$i]['href'].'">';
                                            echo '<div id="notificationDesktop">';
                                                echo '<div class="countdown" id="notificationMessageDesktop">';
                                                $message = $notifications[$i]['message'];
                                                $strongMessage = str_replace('#', '<strong>', $message);
                                                $endStrongMessage = str_replace('|', '</strong>', $strongMessage);
                                                $countdownStrongMessage = str_replace('*', '<span class="urgent" id="countdown'.$i.'"></span>',  $endStrongMessage);
                                                echo $countdownStrongMessage;
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</a>';
                                        ?>
                                        <script>countDownDate(<?=$unixEvent;?>, <?=$i;?>)</script>
                                        <?php
                                        } else {
                                            continue;
                                        }
                                    } else if (isset($notifications[$i]['href']) && !isset($notifications[$i]['eventDate'])) {
                                        // notification for attending or comment on an event
                                            echo '<a href="'.$notifications[$i]['href'].'">';
                                                echo '<div id="notificationDesktop">';
                                                    echo '<div id="notificationMessageDesktop">';
                                                    $message = $notifications[$i]['message'];
                                                    $strongMessage = str_replace('#', '<strong>', $message);
                                                    $endStrongMessage = str_replace('|', '</strong>', $strongMessage);
                                                    echo $endStrongMessage;
                                                    echo '</div>';
                                                    echo '<div id="notificationTimeDesktop">';
                                                    $notificationDate = $notifications[$i]['notificationDate'];
                                                    echo time_elapsed_string($notificationDate, true);
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</a>';
                                    } else {
                                        // notification for cancel
                                        echo '<div id="notificationDesktop">';
                                            echo '<div id="notificationMessageDesktop">';
                                            $message = $notifications[$i]['message'];
                                            $strongMessage = str_replace('#', '<strong>', $message);
                                            $endStrongMessage = str_replace('|', '</strong>', $strongMessage);
                                            echo $endStrongMessage;
                                            echo '</div>';
                                            echo '<div id="notificationTimeDesktop">';
                                            $notificationDate = $notifications[$i]['notificationDate'];
                                            echo time_elapsed_string($notificationDate, true);
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                };
                            } //is_array(no)
                            ?>
                        </div>
                    </div>
                    <div class="signOutWrapper">
                        <a href="#" class="signOut" onclick="signAllOut()">Sign Out</a>
                    </div>
                <?php }; ?>
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
                            <div class="starsMobile">
                                <input type="hidden" class="starValue" value=<?= $_SESSION['rating']; ?>> </input>
                                <!-- <img class="" src="./public/images/star.png" alt="default">
                                <img class="" src="./public/images/star.png" alt="default">
                                <img class="" src="./public/images/star.png" alt="default">
                                <img class="" src="./public/images/star.png" alt="default">
                                <img class="" src="./public/images/star.png" alt="default"> -->
                            </div>
                        </div>
                        <div class="profileLink">
                            <a class="mobileLogin" href="index.php?action=petPreview">
                                <?=$_SESSION['name']; ?>
                            </a> 
                        </div>
                        <div class="notificationsDropdownMobile">
                            <i class="far fa-bell"></i>
                            <span id="notificationNumber">
                                <?php 
                                    $notificationNumber = 0; 
                                    for ($i=0;  $i<count($notifications); $i++) {
                                        if ($notifications[$i]['viewed'] == NULL) {
                                            $notificationNumber++;
                                        }
                                    } 
                                    echo $notificationNumber;
                                ?>
                            </span>
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
                        <p><a href="./ArTest/captionAR.php">AR</a></p>
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



    <!-- NOTICE: Divs below are used for Google buttons -->
    <div id="googleHome">
        <div id='gSigninBut' class='g-signin2' data-onsuccess='onGoogleSignIn' style='position:absolute;top:-9999px;left:-9999px;'></div>
    </div>

    <!-- NOTICE: tempContainer is for getting viewport height -->
    <div id="tempContainer"></div>

    <!-- The following script controls menu animation on Click -->
    <script>
    {
        var showMenu = false;   // Set the initial state of the menu 
        var menuBtn = document.querySelector(".menu-btn"); 
        var hoverWrapper = document.querySelector(".hoverWrapper"); 
        
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

       
        var starsDivDesktop = document.querySelector(".starsDesktop");
        var starsDivMobile = document.querySelector(".starsMobile");
        var starValueInput = document.querySelector(".starValue");
        var starValue = starValueInput.value;
   
        for(var i=0; i<starValue; i++){
            starElement = document.createElement('img');
            starElement.src = "./public/images/star.png";
            starElement.alt = "star";   
            starsDivDesktop.appendChild(starElement);

        }
        for(var i=0; i<starValue; i++){
            starElement = document.createElement('img');
            starElement.src = "./public/images/star.png";
            starElement.alt = "star";  
            starsDivMobile.appendChild(starElement);
        }

    }
    </script> 
    <script src="./public/js/notifications.js"></script>
    <script src="./public/js/common.js"></script>
    <script src="./public/js/template.js"></script>
    <script src="./public/js/registrationCheck.js"></script>
    <script src="./public/js/formCheck.js"></script>
    <script src="./public/js/Modal.js"></script> 
    <script src="./public/js/ModalLogin.js"></script> 
    <script src="./public/js/signInUpModal.js"></script>
</body>

</html>