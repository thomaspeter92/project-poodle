<?php $title= "claimed"?>
<?php ob_start(); ?>
<style>
    .congrats{
        padding-top: 4em;
        text-align: center;
        /* margin-top: auto;
        margin-bottom: auto;
        height: 20%;
        vertical-align: middle; */
    }
    .congratsDiv{
        display: flex;
        justify-content: center;
        align-items: center;
        border: 2px solid black;
        background-image: url("../public/images/qrBackground.jpeg")
    }
</style>
<body>
    <div class="congratsDiv">
        <h1 class="congrats">Sorry, you already claimed this coupon <i class="far fa-sad-tear"></i></h1>
        <!-- <?php echo $_SESSION['points']; ?> -->
        <!-- <h2 class="yourPoints">you have <?php echo $_SESSION['points'];?> points!</h2> -->
    </div>
</body>

<?php
$content = ob_get_clean();
require("template.php");
?>