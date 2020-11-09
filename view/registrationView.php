<?php $title = "registration" ?>
<?php ob_start(); ?>
    <br>
    <br>
    <br>
    <br>
    <?php
        if(isset($_GET['error'])){
            echo "please more sure you entered everything correctly";
        }
    ?>
    <form method="POST" action="index.php" autocomplete="off">
        <input type="hidden" name="action" value="registrationInput">
        name: <input type="text" name="username" id="username" ><br/><br/>
        password: <input type="password"name="password" id="password"><br/><br/>
        confirm password: <input type="password" name="confirmpass" id="confirmpass"><br/><br/>
        email: <input type="text" name="email" id="email"><br/><br/>
        <div id="google"></div> <!--google login registration here-->
        <div id="kakao"></div> <!--kakao login registration here-->
        <input type="submit" name="subscribe" id="subscribe" value="subscribe"><br/><br/>
    </form>
    <a href="index.php?action=login">    
        <button name="login" id="login" value="Sign In">Sign In</button>
    </a>
    <div>
    <button type="button" name="kakaoSignUp" id="kakaoSignUp">Kakao Sign Up</button>
    </div>
    <form id="kakaoForm" method="POST">
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