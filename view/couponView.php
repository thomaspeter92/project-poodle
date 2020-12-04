<?php $title= "coupon"?>
<?php ob_start(); ?>
<style>
    .coupon{
        padding-top: 4em;
        text-align: center;
        margin-top: 0;
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
        <h1 class="coupon">Congrats, here's your coupon!<i class="fas fa-ticket-alt"></i></h1>
    </div>
</body>

<?php
$content = ob_get_clean();
require("template.php");
?>