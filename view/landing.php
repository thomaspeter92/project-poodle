<?php
ob_start();
?>


<!-- <div id="carousel">
    <img src="./public/images/dogCarousel1.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarousel2.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarousel3.jpg" alt="" class="carouselImg">
    <img src="./public/images/dogCarousel4.jpg" alt="" class="carouselImg">

    <div id="box"></div>

</div> -->

<div><h2>TOMAS 1</h2></div>
<div><h2>TOMAS 2</h2></div>
<div id="last"><h2>TOMAS 3</h2></div>


<?php
$content = ob_get_clean();
require("template.php");

?>