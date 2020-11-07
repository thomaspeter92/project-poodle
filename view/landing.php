<?php
ob_start();
?>

<div id="carousel">
    <img src="./public/images/dogCarousel4.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarousel2.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarousel3.jpg" alt="" class="carouselImg">

    <div id="carouselTextBox">
            <p>I LOVE DOGS! WOOF!</p>
            <div id="carouselButton" class="button"><p>LEARN MORE</p></div>
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

    <div class="button2 button"><p>LEARN MORE</p></div>
</div>

<div id="content2" class="content">
    <div class="contentBox boxAppearBefore">
        <h3>Awesome Location Features</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam unde, nisi soluta ea quibusdam debitis suscipit, quis nemo mollitia possimus commodi. Laboriosam ab rem eos assumenda, quo molestias quae voluptas.</p>
    </div>
    <img id="mapImg" src="./public/images/googleMapPreview.png" alt="">
</div>

<div id="content3" class="content">
    <p id="content3text">+20,000 Profiles</p>
    <div class="content3inner content3inner1"></div>
    <div class="content3inner"></div>
    <div class="content3inner"></div>
</div>

<!-- *****************EXPANDING CONTENT CONTAINER ***************** -->

<div id="content4" class="content">
    <div id="insideContainer">
        <div class="inside inside1">
            <h3>I LOVE DOGS</h3><i class="fas fa-arrow-circle-down"></i>
            <div class="insideContent">
                <article>
                    <h4>I'm Lovin It</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati consequuntur doloremque temporibus porro dolorum minima id quo aliquam aspernatur molestiae cupiditate repellendus, similique laborum ab, dolore iure quaerat inventore mollitia!</p>
                </article>
            </div>


        </div>
        <div class="inside inside2">
            <h3>DOGS ARE AMAZING</h3><i class="fas fa-arrow-circle-down"></i>
            <div class="insideContent">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis dolorem architecto iure modi nobis, aliquid ex. Exercitationem quo quos laudantium nihil ullam cumque? At dolores voluptates quod laborum. Omnis, maxime?</p>
            </div>

        </div>
        <div class="inside inside3">
            <h3>I WANT A DOG</h3><i class="fas fa-arrow-circle-down"></i>
            <div class="insideContent">
                <div class="insideContentText">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet repudiandae consequatur cumque sequi nulla aliquam maiores tempora labore ipsa fugit exercitationem, culpa possimus pariatur dicta a iusto molestiae delectus dolorem.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require("template.php");

?>