<?php $title= "About Us"?>
<?php ob_start();?>

<style>

.emptyHeader {
    height: 65px;
}
#img {
    height: 100%;
    left: 50%;
    /* min-height: 100vh; */
    min-width: 100vw;
    object-fit: cover;
    object-position: center;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    width: auto;
}

.textBlock h1 {
    color: white;
    font-family: monsterRatBold;
}
.textBlock h2 {
    color: white;
    font-family: monsterRatBold;
}

.textBlock2 p {
    color: white;
    font-family: monsterRatRegular;
}

.container {
    display: block;
    height: 100%;
    min-height: 100vh;
    /* max-height: 100vh; */
    overflow: hidden;
    position: relative;
    transition-duration: 0.5s;
    width: 100%;
}

.textBlock {
    position: absolute;
    width: 632px;
    top: 100px;
    left: 50%;
    transform: translate(-50%, -50%);
    /* right: 20px; */
    background-color: rgba(0, 0, 0, 0.5);
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
}

.textBlock2 {
    position: absolute;
    top: 600px;
    left: 50%;
    transform: translate(-50%, -50%);
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
    background-color: rgba(0, 0, 0, 0.5);
    width: 828px;
}


@media screen and (max-width: 1000px) {
    h1 {
        font-size: 1.5em;
    }
    .textBlock {
        width: 60%;
    }
    .textBlock2 {
        width: 80%;
    }
}

@media screen and (max-width: 600px) {
    h1 {
        font-size: 1.4em;
    }
    h2 {
        font-size: 1em;
    }
    .textBlock {
        top:130px;
        padding-left: 10px;
        padding-right: 10px;
    }
    .textBlock2 {
        top:650px;
    }
    p {
        font-size: .9em;
    }
}

@media screen and (max-width: 400px) {
    h2 {
        font-size: .9em;
    }
}

</style>
<div class="emptyHeader"></div>
<div class="container">
    <img id="img" class="bg" src="./public/images/aboutUsDesktop.jpg" alt="">
    <div class="textBlock">
        <h1>It's A Pet's World Out There</h1>
        <h2>We'll Connect You To It</h2>
    </div>


    <div class="textBlock2">
        <p>Just a team of pet lovers that want to meet with other pet lovers!</p>
        <p>Originally brought together by a desire to learn to code - fate had other plans.</p>
    </div>

</div>
<?php 
$content = ob_get_clean();
require("template.php");
?>