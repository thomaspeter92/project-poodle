

<?php $title= "registration"?>
<?php ob_start();?>
<meta name="google-signin-client_id" content="659257235288-dmc48l918ev0pi5073mmg5st88bsesvl.apps.googleusercontent.com">
<!-- <script src="https://apis.google.com/js/api:client.js"></script> -->
<link rel="stylesheet" href="./public/css/googleStyle.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./public/css/Modal.css"/>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');


    

    .registerDiv{
        background-color: lightgrey;
        font-weight: bold;
        margin: 2%;
        padding: 4%;
        border: 2px solid grey;
        border-radius: 5px;
    }

    

    .registerButtons{
        /* width: 80%; */
        display: flex;
        justify-content: center;
    }
    

    .registerSignInDiv{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spaceDiv{
        margin: 2%;
    }

    #subscribe{
        border-radius: 8px;
        font-weight: bold;
        font-family: 'Montserrat', sans-serif;
        border: 2px solid grey;
    }

    #login{
        border-radius: 5px;
        font-weight: bold;
        font-family: 'Montserrat', sans-serif;
        border: 2px solid grey;
    }

</style>
<?php $style = ob_get_contents();?>


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
    <div class = "registerDiv">
        <form method="POST" action="index.php" autocomplete="off">
            <input type="hidden" name="action" value="registrationInput">
            name: <input type="text" name="username" id="username" ><br/><br/>
            password: <input type="password"name="password" id="password"><br/><br/>
            confirm password: <input type="password" name="confirmpass" id="confirmpass"><br/><br/>
            email: <input type="text" name="email" id="email"><br/><br/>
            <div id="google"></div> <!--google login registration here-->
            <div id="kakao"></div> <!--kakao login registration here-->
            <br>
            <div class="registerButtons">
                <input type="submit" name="subscribe" id="subscribe" value="Sign Up"><br/><br/>
                
            </div>
        </form>
        
    </div>
    <div class=registerSignInDiv>
        
            <div class="orYouCan">OR YOU CAN...</div>
        
        <div class=spaceDiv></div>
        <a href="index.php?action=login">    
            <button name="login" id="login" value="Sign In">Sign In</button>
        </a>
    </div>
   

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