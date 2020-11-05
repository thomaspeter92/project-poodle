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
                <div class="paw-print-1">
                    <div class="pad large"></div>
                    <div class="pad small-1"></div>
                    <div class="pad small-2"></div>
                    <div class="pad small-3"></div>
                    <div class="pad small-4"></div>
                </div>
                
                <div class="paw-print-2">
                    <div class="pad large"></div>
                    <div class="pad small-1"></div>
                    <div class="pad small-2"></div>
                    <div class="pad small-3"></div>
                    <div class="pad small-4"></div>
                </div>    
                
                <div class="paw-print-3">
                    <div class="pad large"></div>
                    <div class="pad small-1"></div>
                    <div class="pad small-2"></div>
                    <div class="pad small-3"></div>
                    <div class="pad small-4"></div>
                </div>    
                    
                <div class="paw-print-4">
                    <div class="pad large"></div>
                    <div class="pad small-1"></div>
                    <div class="pad small-2"></div>
                    <div class="pad small-3"></div>
                    <div class="pad small-4"></div>
                </div>
                
                <div class="paw-print-5">
                    <div class="pad large"></div>
                    <div class="pad small-1"></div>
                    <div class="pad small-2"></div>
                    <div class="pad small-3"></div>
                    <div class="pad small-4"></div>
                </div>
                    
                <div class="paw-print-6">
                    <div class="pad large"></div>
                    <div class="pad small-1"></div>
                    <div class="pad small-2"></div>
                    <div class="pad small-3"></div>
                    <div class="pad small-4"></div>
                </div>
                    
                <div class="paw-print-7">
                    <div class="pad large"></div>
                    <div class="pad small-1"></div>
                    <div class="pad small-2"></div>
                    <div class="pad small-3"></div>
                    <div class="pad small-4"></div>
                </div>

                <div class="paw-print-8">
                    <div class="pad large"></div>
                    <div class="pad small-1"></div>
                    <div class="pad small-2"></div>
                    <div class="pad small-3"></div>
                    <div class="pad small-4"></div>
                </div>
            </div>
            <div id="headerRight">
                <div id="hamburger">
                    <div class="nav-icon">
                        <div class="line"></div>
                    </div>
                    <div class="hoverwrapper">
                        <ul>
                            <li><a href="#">Login</a></li>
                            <!-- Will need to make this dynamic if wanted -->
                            <li><a href="#">Contact</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#">Counseling</a></li>
                            <li><a href="#">Visit</a></li>
                            <li><a href="#">Apply</a></li>
                        </ul>
                    </div>
                </div> 
                <?php
                if (isset($_SESSION)) {
                    // Call Database for Image, Username, and Ratings
                    // Insert Information
                }   else {
                ?>
                <img src="#" alt="defaultPic">
                <!-- Include Randomizer for default logo -->
                <?php
                }
                ?>
            </div>
        </div> 
    </header>
    <!-- maybe include or variable depending on -->
    <!-- TODO: Add Content -->
    <?= $content; ?>
    <!-- TODO: Add Footer -->
</body>

</html>