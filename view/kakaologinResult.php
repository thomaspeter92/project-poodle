<?php
ob_start();
?>

<button type="button" name="kakaoLogout" id="kakaoLogout">Logout</button>

<script src='https://developers.kakao.com/sdk/js/kakao.min.js'></script>
<script src='./public/js/kakaologin.js'></script>
<?php
$content = ob_get_clean();
require("template.php")
?>