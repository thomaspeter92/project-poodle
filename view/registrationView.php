<?php $title= "registration"?>
<?php ob_start(); ?>
    <form method="POST" action="index.php" autocomplete="off">
        login: <input type="text" name="username" id="username" ><br/><br/>
        password: <input type="password"name="password" id="password"><br/><br/>
        confirm password: <input type="password" name="confirmpass" id="confirmpass"><br/><br/>
        email: <input type="text" name="email" id="email"><br/><br/>
        <div id="google"></div> <!--google login registration here-->
        <div id="kakao"></div> <!--kakao login registration here-->
    </form>
    <a href = index.php>
            <input type="submit" name="subscribe" id="subscribe" value="subscribe"><br/><br/>
    </a>
<?php 
$content = ob_get_clean();
require("template.php");
?>