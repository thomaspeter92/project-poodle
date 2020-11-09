<?php
ob_start();
?>

<!-- ************** CAROUSEL AREA ************* -->

<div id="carousel">
    <img src="./public/images/dogCarousel4.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarousel2.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarousel3.jpg" alt="" class="carouselImg">

    <div id="carouselTextBox">
            <p>I LOVE DOGS! WOOF!</p>
            <div id="carouselButton" class="button"><p>LEARN MORE</p></div>
    </div>
</div>


<!-- ************************* CONTENT 1 AREA **************** -->
<div id="content1" class="content">
    <div id="content1container">
        <div class="contentBox">
            <div class="imageBall"></div>
            <span class="bar"></span>
            <h3>Meet Friends</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

        <div class="contentBox">
            <div class="imageBall ball2"></div>
            <span class="bar"></span>
            <h3>Make Memories</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>

        <div class="contentBox">
            <div class="imageBall ball3"></div>
            <span class="bar"></span>
            <h3>Create Events</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    <div class="button2 button"><p>LEARN MORE</p></div>
</div>


<!-- ************************* CONTENT 2 AREA **************** -->
<div id="content2" class="content">
    <div class="contentBox boxAppearBefore">
        <h3>Awesome Location Features</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam unde, nisi soluta ea quibusdam debitis suscipit, quis nemo mollitia possimus commodi. Laboriosam ab rem eos assumenda, quo molestias quae voluptas.</p>
    </div>
    <img id="mapImg" src="./public/images/googleMapPreview.png" alt="">
</div>


<!-- ************************* CONTENT 3 AREA **************** -->
<div id="content3" class="content">
    <p id="content3text">+20,000 Profiles</p>
    <div class="content3inner">
        <div class="clickMe"></div>
        <section class="content3hidden">
            <div class="profileImageBall"></div>
            <h5>Betty Boop</h5>
            <p>"I'm a kind dog looking to have fun with another cute pup!"</p>
            <p>Friendliness: *****</p>
            <p>Fitness Level: ***</p>
        </section>
    </div>
    <div class="content3inner">
        <div class="clickMe"></div>
        <section class="content3hidden">
            <div class="profileImageBall"></div>
            <h5>Baby</h5>
            <p>"I'm a kind dog looking to have fun with another cute pup!"</p>
            <p>Friendliness: *****</p>
            <p>Fitness Level: ***</p>
        </section>
    </div>
    <div class="content3inner">
        <div class="clickMe"></div>
        <section class="content3hidden">
            <div class="profileImageBall"></div>
            <h5>Lil Pup</h5>
            <p>"I'm a kind dog looking to have fun with another cute pup!"</p>
            <p>Friendliness: *****</p>
            <p>Fitness Level: ***</p>
        </section>
    </div>
</div>


<!-- ************************* CONTENT 4 AREA **************** -->
<div id="content4" class="content">
    <div id="expandingContainer">
        <div class="insideContainer inside1">
            <h3>VR Features</h3><i class="fas fa-arrow-circle-down"></i>
            <div class="insideContent">
                <article>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati consequuntur doloremque temporibus porro dolorum minima id quo aliquam aspernatur molestiae cupiditate repellendus, similique laborum ab, dolore iure quaerat inventore mollitia!</p>
                </article>
            </div>


        </div>
        <div class="insideContainer inside2">
            <h3>Create Events</h3><i class="fas fa-arrow-circle-down"></i>
            <div class="insideContent">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis dolorem architecto iure modi nobis, aliquid ex. Exercitationem quo quos laudantium nihil ullam cumque? At dolores voluptates quod laborum. Omnis, maxime? Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, ex. Explicabo eaque provident odit doloremque consequatur deserunt error mollitia cumque debitis eius dolor ullam suscipit perferendis porro expedita, quasi amet! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, pariatur! Sapiente vero delectus quas optio officiis iusto!</p>
            </div>

        </div>
        <div class="insideContainer inside3">
            <h3>Meet Other Owners</h3><i class="fas fa-arrow-circle-down"></i>
            <div class="insideContent">
                <div class="insideContentText">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet repudiandae consequatur cumque sequi nulla aliquam maiores tempora labore ipsa fugit exercitationem, culpa possimus pariatur dicta a iusto molestiae delectus dolorem.</p>
                </div>
            </div>
        </div>
    </div>


    <section id="content4section">
        <article class="content4article">
            <h5>About Us</h5>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente alias ab, mollitia natus est ea maxime doloremque iusto tempore fugiat accusamus id tempora! Quam sunt, voluptatibus aperiam incidunt soluta sit!</p>
        </article>
        <article class="content4article">
            <h5>Manage Your Pets Seamlessly</h5>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente alias ab, mollitia natus est ea maxime doloremque iusto tempore fugiat accusamus id tempora! Quam sunt, voluptatibus aperiam incidunt soluta sit!</p>
        </article>
</section>
</div>

<div id="content5" class="content">
    <div class="content5div"></div>
    <div class="content5div"></div>
    <div class="content5div"></div>
    <div class="content5div"></div>
    <div class="content5div"></div>
    <div class="content5div"></div>
</div>

<?php
$content = ob_get_clean();
require("template.php");

?>