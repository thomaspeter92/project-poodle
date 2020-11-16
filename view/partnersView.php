<?php
$title = "Partners";
$style = "<link rel='stylesheet' href='./public/css/partners.css'>";
ob_start();
?>
<section>
    <div></div>
    <!-- <img id="img" class="bg" src="./public/images/partners/partnersPageBackground.jpg" alt=""> -->
    <div id="contents">
        <div id="textBlocks">
            <div class="textBlock">
                <h1>We Work With the Best Partners</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <div id="partners">
            <div id="partner1" class="partner">
                <a href="http://www.wcoding.com/" title="wcoding">
                    <img src="./public/images/partners/wcoding.png" alt="">
                </a>
            </div>
            <div id="partner2" class="partner">
                <a href="https://www.instagram.com/lechienblancseoul/" title="lechienblanc">
                    <img src="./public/images/partners/leChienBlanc.png" alt="Le Chien Blanc">
                </a>
            </div>
            <div id="partner3" class="partner">
                <a href="#" title="partner3">
                    <img src="./public/images/partners/partner3.jpg" alt="partner3">
                </a>
            </div>
            <div id="partner4" class="partner">
                <a href="#" title="partner4">
                    <img src="./public/images/partners/partner4.jpg" alt="partner4">
                </a>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require("template.php");
?>

