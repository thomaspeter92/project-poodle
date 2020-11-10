<?php $title= "login"?>


<?php ob_start();?>
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

    #connect{
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
    <div class="registerDiv">
    <form method="POST" action="index.php" autocomplete="off">
        <input type="hidden" name="action" value="checkLogin">
        email: <input type="text" name="emailLogin" id="emailLogin" value=<?php echo isset($_COOKIE['username'])? $_COOKIE['username']: " ";?>><br/><br/>
        password: <input type="password" name="passwordLogin" id="passwordLogin" value=<?php echo isset($_COOKIE['password'])? $_COOKIE['password']: " ";?>><br/><br/>
        
        <br>
        <div class="registerSignInDiv">
        <a href="index.php">
            <button name="connect" id="connect">connect</button>
        </a>
        </div>
        <div id="google"></div> <!--google login here-->
        <div id="kakao"></div> <!--kakao login here-->
    </form>
    </div>
    <br>
    <div class="registerSignInDiv">
    <a href="http://localhost/projectPoodle/index.php?action=registration">
        <button name="login" id="login" >register</button>
    </a> 
    </div>
<?php
$content = ob_get_clean();
require("template.php");
?>
