<?php
ob_start();
?>

<!-- **** PLACEHOLDER FOR JOHNS HEADER!!! *** -->


<div id="carousel">
    <img src="./public/images/dogCarousel4.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarousel2.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarousel3.jpg" alt="" class="carouselImg">
    <!-- <img src="./public/images/dogCarousel1.jpg" alt="" class="carouselImg"> -->

    <div id="carouselTextBox">
            <p>I LOVE DOGS! WOO!</p>
            <p id="carouselButton"> LINK HERE</p>
    </div>
</div>


<div id="content1" class="content">
    <div id="contentContainer">
        <div class="contentBox">
            <div class="imageBall"></div>
            <span></span>
            <h3>Meet Friends</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

        <div class="contentBox">
            <div class="imageBall ball2"></div>
            <span></span>
            <h3>Make Memories</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

        <div class="contentBox">
            <div class="imageBall ball3"></div>
            <span></span>
            <h3>Create Events</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    <div class="button2"><p>LEARN MORE</p></div>
</div>

<div id="content2" class="content">
    <div class="contentBox boxAppearBefore">
        <h3>Awesome Location Features</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam unde, nisi soluta ea quibusdam debitis suscipit, quis nemo mollitia possimus commodi. Laboriosam ab rem eos assumenda, quo molestias quae voluptas.</p>
    </div>
    <div><img src="./public/images/googleMapPreview.png" alt=""></div>
    <div class="sideContentBefore">
        <h2>SIGN UP TO OUR NEWSLETTER</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas magnam expedita voluptatem minima omnis? Ad incidunt minima natus enim quis quasi dolorem vitae sunt rem cumque. Voluptatum cupiditate id atque!</p>
    </div>
</div>

<div id="content3" class="content">
    <div class="content3inner">
        <div id="divdiv"></div>
    </div>
    <div class="content3inner">
        <div></div>
    </div>
    <div class="content3inner">
        <div></div>
    </div>
</div>



<!-- *** SECOND OPTION WITH PARALLAX SCROLLING ***** -->
<!-- <div><h2>TOMAS 1</h2></div>
<div><h2>TOMAS 2</h2></div>
<div id="last"><h2>TOMAS 3</h2></div> -->


<?php
$content = ob_get_clean();
require("template.php");

?>