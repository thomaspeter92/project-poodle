<?php
// TODO: Use $style for additional css
$style = NULL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">

    <?= ($style) ? $style : ""; ?>
    <!-- TODO: Change to a variable -->
    <title>Project Poodle</title>
</head>

<body>
    <!-- TODO: main menu -->
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
                        <li id="desktopLogInLink"><a href="#">Log In</a></li>
                        <li><a href="#">Sign Up</a></li>
                    </ul>
                </div>        
                <div id="mobileLogin">
                        <img src="" alt="default">
                        <a id="mobileLogin" href="#">Log In</a> 
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
                        <li><a href="#">Sign In</a></li>
                        <li><a href="#">Create Account</a></li>
                    </ul>
                </div>
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
    <!-- maybe include or variable depending on -->
    <!-- TODO: Add Content -->
    <?= $content; ?>
    <!-- TODO: Add Footer -->
    <footer>
        <ul class="footer">
            <li>Home</li>
            <li>Privacy & Legal</li>
            <li>Contact</li>
            <li>Career</li>
            <!-- Meet the team link -->
            <!-- <li>SOCIAL MEDIA LINKS</li> -->
        </ul>
    </footer>
</body>

</html>