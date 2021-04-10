<?php
ob_start();
?>
<link rel="stylesheet" href="./public/css/landing.css">
<!-- ************** CAROUSEL AREA ************* -->
<?php
if (isset($_GET['account'])) {
    if ($_GET['account'] == "deleted") { ?>
    <div id="accountDeletedMsg">Your Account Has Been Deleted!</div>
    <?php
    } else {
        return null;
    }
}
?>

<div id="wrapper">

<div id="carousel">
    <img src="./public/images/dogCarousel4.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarouselCat.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarousel3.jpg" alt="" class="carouselImg">
    <div id="carouselTextBox">
            <p>LOVE PETS? SO DO WE!</p>
            <div id="carouselButton" class="button"><p><a href="#content1">LEARN MORE</a></p></div>
    </div>
    <div id="mobileCarouselContent">
        <h2>Tomorrow Starts Here.</h2>
        <h4>Where Will Pet Venture Take You?</h4>
        <a href="#content1"><i class="fas fa-chevron-down"></i></a>
    </div>
</div>

<div id="mobileCarousel">
    <!-- <img src="./public/images/portraitCarousel.jpg" alt=""> -->
</div>



<!-- ************************* CONTENT 1 AREA **************** -->
<div id="content1" class="content">
    <div id="content1container">
        <div class="contentBox">
            <div class="imageBall"></div>
            <span class="bar"></span>
            <h3>Meet Friends</h3>
            <p>Meet new friends and fellow pet owners in your city.</p>
        </div>

        <div class="contentBox">
            <div class="imageBall ball2"></div>
            <span class="bar"></span>
            <h3>Make Memories</h3>
            <p>Form friendships and memories at unique events with your pet-owning friends.</p>
        </div>

        <div class="contentBox">
            <div class="imageBall ball3"></div>
            <span class="bar"></span>
            <h3>Create Events</h3>
            <p>With our groundbreaking event creation feature, you're in the drivers seat!</p>
        </div>
    </div>

    <div class="button2 button"><p><a href="index.php?action=aboutUs">LEARN MORE</a></p></div>
</div>


<!-- ************************* CONTENT 2 AREA **************** -->
<div id="content2" class="content">
    <div class="contentBox boxAppearBefore">
        <h3>Awesome Location Features</h3>
        <p>Our platform uses the latest mapping technology to create your own custom itinerary to share with fellow users. You can pin multiple locations and stop-off points!</p>
    </div>
    <img id="mapImg" src="./public/images/mapPreview.png" alt="">
</div>


<!-- ************************* CONTENT 3 AREA **************** -->
<div id="content3" class="content">
    <p id="content3text">+20,000 Profiles</p>
    <div id="leftRightArrow"><i class="fas fa-arrow-circle-left leftArrow"></i> <i class="fas fa-arrow-circle-right rightArrow"></i></div>
    <div id="profileContainer">
        <img class="content3image" src="./public/images/profilePreview.png" alt="">
        <img class="content3image" src="./public/images/profilePreview4.png" alt="">
        <img class="content3image" src="./public/images/profilePreview2.png" alt="">
        <img class="content3image" src="./public/images/profilePreview3.png" alt="">
        <img class="content3image" src="./public/images/profilePreview5.png" alt="">
        <img href="idex.php?action=registration" class="content3image" src="./public/images/profilePreview6.png" alt="">


    </div>
</div>


<!-- ************************* CONTENT 4 AREA **************** -->
<div id="content4" class="content">
    <img class="largeImage" src="./public/images/contactPageMobile.jpg">
    <section id="content4section">
        <article class="content4article">
            <h5>About Us</h5>
            <p>Founded by a group of bored expats and Koreans, we came up with the original idea of creating a social media platform for pet owners. Our ambition got the best of us, with many big ideas for this project. However, we soon discovered coding isn't as easy as it seems. A humbling experience.</p>
        </article>
        <article class="content4article">
            <h5>Manage Your Pets Seamlessly</h5>
            <p>You can easily add and modify an unlimited number of pets with the click of a button. If your pet loses weight, just adjust it. If your pet changes gender, you can change that too. You can even delete your beloved pet if you so please.</p>
        </article>
</section>
</div>

<div id="expandingSection" class="content">
    <div id="expandingContainer">
            <div class="insideContainer inside1">
                <h3>AR Features</h3><i class="fas fa-arrow-circle-down downArrow"></i>
                <div class="insideContent">
                    <img src="./public/images/ARexample.png" alt="" style="width: 300px; height: 200px"> 
                    <article>
                        <p>With our amazing AR features you can explore a range of exciting posibilities! Just locate the unique QR code and you're on your way to collecting a free reward from one of our many partner vendors! You also get to see cute animations!</p>
                    </article>
                </div>


            </div>
            <div class="insideContainer inside2">
                <h3>Stay Notified</h3><i class="fas fa-arrow-circle-down downArrow"></i>
                <div class="insideContent">
                        <img src="./public/images/notificationExample.png" alt="" style="width: 300px; height: auto"> 
                        <p>Stay in the know with our high-tech notifcation system designed by our in-house notifcation expert. Never worry about missing an event, or a message from your friend. By using our unique notification system, you're connected 24 hours a day!</p>
                </div>

            </div>
            <div class="insideContainer inside3">
                <h3>Rate Peers & Pets</h3><i class="fas fa-arrow-circle-down downArrow"></i>
                <div class="insideContent">
                    <div class="insideContentText">
                        <img src="./public/images/ratingExample.png" alt="" style="width: 300px; height: auto"> 
                        <p>Let your friends and pets know what you think of them with our amazing rating system. You can have piece of mind letting others know exactly what you think of them, their pets, and the events that they host. </p>
                    </div>
                </div>
            </div>
        </div>
        <img class="largeImage" src="./public/images/portraitDog3.jpg" alt="">
</div>

<div id="content5" class="content">
    <div class="content5div">
        <h5>Introducing New Ways to Meet Friends and Enjoy Time With Your Pets...</h5>
    </div>
    <div class="content5div theCard">
        <div class="theFront">
            <h5>Browse Events Nearby</h5>
            <p>See what events are upcoming in your area, and communicate with other attendees!</p>
            <i class="fas fa-arrow-circle-right arrowBall"></i>
        </div>
        <div class="theBack">
            <img src="./public/images/eventsView.png" alt="">
        </div>
    </div>
    <div class="content5div theCard">
        <div class="theFront">
            <h5>Manage Your Pets With Ease</h5>
            <p>Add and modify your pets easily with our pet management system!</p>
            <i class="fas fa-arrow-circle-right arrowBall"></i>
        </div>
        <div class="theBack">
            <img src="./public/images/editPetView.png" alt="">
        </div>
    </div>
    <div class="content5div">
    </div>
    <div class="content5div theCard">
        <div class="theFront">
            <h5>Interact with Other Owners</h5>
            <p>Stay in contact with others and share your thoughts on events you attend.</p>
            <i class="fas fa-arrow-circle-right arrowBall"></i>
        </div>
        <div class="theBack">
            <p>You can edit and delete your comments with ease.</p>
            <img src="./public/images/commentExample.png" alt="">
        </div>
    </div>
    <div class="content5div theCard">
        <div class="theFront">
            <h5>Find Walkers and Sitters</h5>
            <p>With our unique pet tracking system, you can check your pets wellbeing 24/7!</p>
            <i class="fas fa-arrow-circle-right arrowBall"></i>
        </div>
        <div class="theBack">Back of the card</div>
    </div>
    <div class="content5div theCard">
        <div class="theFront">
        <h5>Browse Pet-Friendly Businesses</h5>
            <p>With our unique pet tracking system, you can check your pets wellbeing 24/7!</p>
            <i class="fas fa-arrow-circle-right arrowBall"></i>
        </div>
        <div class="theBack">Back of the card</div>
    </div>
</div>
</div>

<script src="./public/js/carousel.js"></script>
<script>
{
    alert("NOTICE: This is a website prototype.\n\nPlease do not enter your private information!");
}
</script>
<?php
$content = ob_get_clean();
require("template.php");

?>
