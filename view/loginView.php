
<?php ob_start(); ?>

<!-- <link rel="stylesheet" href="./public/css/googleStyle.css"> -->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./public/css/Modal.css"/>
<style>
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
<?php $style=ob_get_contents();?>

<?php ob_start();?>

    <?php
        if(isset($_GET['error'])) {
            echo " something went wrong please try to log again";
        }?>
 
    <div id="main">
        <form method="POST" action="index.php" autocomplete="off">
            <input type="hidden" name="action" value="checkLogin">

            <label for="emailLogin" class="form_col">Email :</label> 
            <input type="text" name="emailLogin" id="emailLogin" value=<?php echo isset($_COOKIE['username'])? $_COOKIE['username']: " ";?>><br/><br/>
            <label for="passwordLogin" class="form_col">Password :</label>
            <input type="password" name="passwordLogin" id="passwordLogin" value=<?php echo isset($_COOKIE['password'])? $_COOKIE['password']: " ";?>><br/><br/>
            <a href="index.php">
                <button name="connect" id="connect" class='button1'>Connect</button>
            </a>
        </form>
        <a href="http://localhost/projectPoodle/index.php?action=registration">
            <button name="login" id="login" class='button1'>Register</button>
        </a> <br/><br/>

        <!-- For google -->
        <div id='signin' class="g-signin2 button1" data-onsuccess="onGoogleSignIn"></div>
        <form id="googleForm" method="POST">
            <input type="hidden" id="googleName" name='googleName'>
            <input type="hidden" id="googleEmail" name='googleEmail'>
            <input type="hidden" id="googlePicture" name='googlePicture'>
            <input type="hidden" id="googleUserId" name='googleUserId'>
        </form>

        <div class="button2" id="kakaoLogin">
            <img id="kakaoLogo" src="./public/images/kakaoLogin/en/kakao_login_medium.png">
        </div>
    </div>
    

    <?php require("./view/kakaoForm.php"); ?>
    <script src='./public/js/kakaologin.js'></script>
    <script src='./public/js/googlelogin.js'></script>
    <script src="./public/js/Modal.js"></script>
<?php
$content = ob_get_clean();
require("template.php");
?>

