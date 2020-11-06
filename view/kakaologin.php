<?php
// ob_start();
?>

<!-- <input type="button" name="kakaoLogin" id="kakaoLogin" value="Kakao Login"> -->
<!-- <a id="custom-login-btn">
    <img src="//k.kakaocdn.net/14/dn/btqCn0WEmI3/nijroPfbpCa4at5EIsjyf0/o.jpg" width="222" />
</a> -->
<!-- <div id="kakaoLoginContainer"></div> -->
<!-- <button type="button" name="kakaoDisconnect" id="kakaoDisconnect">Disconnect</button> -->
<!-- <br> -->
<!-- <button type="button" name="kakaoLogout" id="kakaoLogout">Logout</button> -->

<div>
    <button type="button" name="kakaoSignUp" id="kakaoSignUp">Kakao Sign Up</button>
</div>
<div>
    <button type="button" name="kakaoLogin" id="kakaoLogin"><img src="./public/images/kakaoLogin/en/kakao_login_large_narrow.png"></button>
</div>
<form id="kakaoLoginForm" action="index.php?action=kakaoResult" method="POST">
    <input type="hidden" name="kakaoNickname" id="kakaoNickname">
    <input type="hidden" name="kakaoEmail" id="kakaoEmail">
    <!-- <input type="hidden" name="kakaoid" id="kakaoid"> -->
</form>

<script src='https://developers.kakao.com/sdk/js/kakao.min.js'></script>
<script src='./public/js/kakaologin.js'></script>
<?php
// $content = ob_get_clean();
// require("template.php");
?>