<?php $title= "registration"?>
<?php ob_start(); ?>
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
<?php 
$content = ob_get_clean();
require("template.php");
?>