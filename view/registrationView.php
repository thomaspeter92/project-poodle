<?php $title = "registration" ?>
<?php ob_start(); ?>
<meta name="google-signin-client_id" content="659257235288-dmc48l918ev0pi5073mmg5st88bsesvl.apps.googleusercontent.com">
<!-- <script src="https://apis.google.com/js/api:client.js"></script> -->
<link rel="stylesheet" href="./public/css/googleStyle.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script> 
<?php $style=ob_get_contents();?>

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

      <!-- For google -->
      <div>
        <span>Sign up with Google:</span>
        <div id='signin' class="g-signin2" data-onsuccess="onGoogleSignUp"></div> 
    </div>
    <form id="googleForm" method="POST">
        <input type="hidden" id="googleName" name='googleName'>
        <input type="hidden" id="googleEmail" name='googleEmail'>
        <input type="hidden" id="googlePicture" name='googlePicture'>
        <input type="hidden" id="googleUserId" name='googleUserId'>
    </form>
    <button type='button' id='signOut' onclick='googleSignOut()'>SignOutGoogle</button>

    <div>
        <button type="button" name="kakaoSignUp" id="kakaoSignUp">Kakao Sign Up</button>
    </div>
    <?php require("./view/kakaoForm.php"); ?>
    <script src='https://developers.kakao.com/sdk/js/kakao.min.js'></script>
    <script src='./public/js/kakaologin.js'></script>
    <script src='./public/js/googlelogin.js'></script>
<?php 
$content = ob_get_clean();
require("template.php");
?>