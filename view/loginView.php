<?php $title= "login"?>
<?php ob_start();?>
    <form method="POST" action="index.php" autocomplete="off">
        login: <input type="text" name="usernameLogin" id="usernameLogin" value=<?php echo isset($_COOKIE['username'])? $_COOKIE['username']: " ";?>><br/><br/>
        password: <input type="password" name="passwordLogin" id="passwordLogin" value=<?php echo isset($_COOKIE['password'])? $_COOKIE['password']: " ";?>><br/><br/>
        <input type="checkbox" name="remember" id="remember"> remember me <br/>
        <a href="">
        <button name="connect" id="connect">connect</button>
        </a>
        <div id="google"></div> <!--google login here-->
        <div id="kakao"></div> <!--kakao login here-->
    </form>
    <a href="http://localhost/projectPoodle/index.php?action=registration">
        <button name="login" id="login" >register</button>
    </a> 
<?php
$content = ob_get_clean();
require("template.php");
?>
