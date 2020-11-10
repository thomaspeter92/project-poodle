
<?php ob_start(); ?>
<!-- <meta name="google-signin-client_id" content="659257235288-dmc48l918ev0pi5073mmg5st88bsesvl.apps.googleusercontent.com"> -->
<!-- <script src="https://apis.google.com/js/api:client.js"></script> -->
<link rel="stylesheet" href="./public/css/googleStyle.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
<!-- <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>  -->
<?php $style=ob_get_contents();?>

<?php ob_start();?>
    <br>
    <br>
    <br>
    <br>
    <?php
        if(isset($_GET['error'])) {
            echo " something went wrong please try to log again";
        }
    ?>
    <form method="POST" action="index.php" autocomplete="off">
        <input type="hidden" name="action" value="checkLogin">
        email: <input type="text" name="emailLogin" id="emailLogin" value=<?php echo isset($_COOKIE['username'])? $_COOKIE['username']: " ";?>><br/><br/>
        password: <input type="password" name="passwordLogin" id="passwordLogin" value=<?php echo isset($_COOKIE['password'])? $_COOKIE['password']: " ";?>><br/><br/>
        <a href="index.php">
            <button name="connect" id="connect">connect</button>
        </a>
        <div id="google"></div> <!--google login here-->
        <div id="kakao"></div> <!--kakao login here-->
    </form>
    <a href="http://localhost/projectPoodle/index.php?action=registration">
        <button name="login" id="login" >register</button>
    </a> 

    <!-- For google -->
    <div id='signin' class="g-signin2" data-onsuccess="onGoogleSignIn"></div>
    <form id="googleForm" method="POST">
        <input type="hidden" id="googleName" name='googleName'>
        <input type="hidden" id="googleEmail" name='googleEmail'>
        <input type="hidden" id="googlePicture" name='googlePicture'>
        <input type="hidden" id="googleUserId" name='googleUserId'>
    </form>
    
    <button id='getInfo' onclick='sendProfileInfo()'>SHow User Info</button>
    <button type='button' id='signOut' onclick='googleSignOut()'>SignOut</button>
    <button type='button' id='endSession'>End Session</button>

     <!-- <div id="gSignInWrapper">
        <div id="customBtn" class="customGPlusSignIn g-signin2" data-onsuccess="onGoogleSignIn">
            <div id='gIcon' class='icon'></div>
            <span class="buttonText">   Sign In</span>
        </div>
    </div>
    <div id="name"></div>
    <script>startApp();</script>  -->

    <div>
        <button type="button" name="kakaoLogin" id="kakaoLogin"><img src="./public/images/kakaoLogin/en/kakao_login_large_narrow.png"></button>
    </div>
    <?php require("./view/kakaoForm.php"); ?>
    <!-- <script src='https://developers.kakao.com/sdk/js/kakao.min.js'></script> -->
    <script src='./public/js/kakaologin.js'></script>
    <script src='./public/js/googlelogin.js'></script>
<?php
$content = ob_get_clean();
require("template.php");
?>

