<?php $title= "coupon"?>
<?php ob_start(); ?>
<style>
    .coupon{
        padding-top: 4em;
        text-align: center;
        margin-top: 0;
    }
</style>
<body>
    <div>
        <h1 class="coupon">Congrats, here's your coupon!</h1>
    </div>
</body>

<?php
$content = ob_get_clean();
require("template.php");
?>