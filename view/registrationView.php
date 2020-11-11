<?php $title = "registration" ?>
<?php ob_start(); ?>
<link rel="stylesheet" href="./public/css/googleStyle.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./public/css/Modal.css"/>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');


    body{

    }

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
    div#main{
        padding-top:10vh;
    }
    .form_col {
        display: inline-block;
        margin-right: 15px;
        padding: 3px 0px;
        width: 200px;
        min-height: 1px;
        text-align: right;
    }
    .button1{
        height:33px;
        width: 120px;
        margin-left:200px;
        background-color: #72ddf7;
        border-radius:5px;
        border-color: #72ddf7;
        color:#222222;
        box-shadow:1px 1px 2px #AAAAAA;
    }
    .button2{
        height:45px;
        width: 90px;
        margin-left:200px;
        border-radius:5px;
        box-shadow:1px 1px 2px #AAAAAA;
    }
    .button1:hover, .button2:hover{
        cursor: pointer;
        box-shadow: 0 0 15px rgb(75,150,246);
    }

    .button1:before, .button2:before{
        content:'';
        transition:0.5s;
        transform:scale(0.9);
        z-index:-1; 
    }

    .button1:hover:before, .button2:hover:before{
        transform:scale(1.5);
        box-shadow: 0 0 20px rgb(75,150,246);
    }
</style>
<?php $style = ob_get_contents();?>


<?php ob_start(); ?>

    <?php
        if(isset($_GET['error'])){
            echo "please more sure you entered everything correctly";
        }
    ?>
<div id="main">
    <div class = "registerDiv">
    
        <form method="POST" action="index.php" autocomplete="off">
            <input type="hidden" name="action" value="registrationInput">
            <label for="username" class="form_col">Name :</label>
            <input type="text" name="username" id="username" ><br/><br/>
            <label for="password" class="form_col">Password :</label>
            <input type="password"name="password" id="password"><br/><br/>
            <label for="confirmpass" class="form_col">Confirm password :</label>
            <input type="password" name="confirmpass" id="confirmpass"><br/><br/>
            <label for="email" class="form_col">Email :</label>
            <input type="text" name="email" id="email"><br/><br/>

            <input type="submit" name="subscribe" id="subscribe" value="Subscribe" class="button1"><br/>
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
            <div id='signin' class="g-signin2 button1" data-onsuccess="onGoogleSignUp"></div> 
        </div>
        <form id="googleForm" method="POST">
            <input type="hidden" id="googleName" name='googleName'>
            <input type="hidden" id="googleEmail" name='googleEmail'>
            <input type="hidden" id="googlePicture" name='googlePicture'>
            <input type="hidden" id="googleUserId" name='googleUserId'>
        </form>
        <!-- <button type='button' id='signOut' style="display:inline-block" onclick='googleSignOut()'>SignOutGoogle</button> -->

        <div class="button2" id="kakaoSignUp">
            <img id="kakaoLogo" src="./public/images/kakaoLogin/en/kakao_login_medium.png">
        </div>
    </div>
    <?php require("./view/kakaoForm.php"); ?>
    <script src='https://developers.kakao.com/sdk/js/kakao.min.js'></script>
    <script src='./public/js/kakaologin.js'></script>
    <script src='./public/js/googlelogin.js'></script>
<?php 
$content = ob_get_clean();
require("template.php");
?>