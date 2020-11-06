<?php $title = "login" ?>
<?php ob_start(); ?>
<?php
if (isset($_GET['error'])) {
    echo " something went wrong please try to log again";
}
?>
<form method="POST" action="index.php" autocomplete="off">
    <input type="hidden" name="action" value="checkLogin">
    email: <input type="text" name="emailLogin" id="emailLogin" value=<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : " "; ?>><br /><br />
    password: <input type="password" name="passwordLogin" id="passwordLogin" value=<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : " "; ?>><br /><br />
    <input type="checkbox" name="remember" id="remember"> remember me <br />
    <a href="index.php">
        <button name="connect" id="connect">connect</button>
    </a>
    <div id="google"></div>
    <!--google login here-->
    <div id="kakao"></div>
    <!--kakao login here-->
</form>
<a href="http://localhost/projectPoodle/index.php?action=registration">
    <button name="login" id="login">register</button>
</a>
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
$content = ob_get_clean();
require("template.php");
?>