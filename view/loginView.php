<?php ?>

    <div id="SignInMain">
        <div class = "registerDiv">
            <form method="POST" action="index.php" autocomplete="off" id='formSignIn'>
                <input type="hidden" name="action" value="checkLogin">
                <div class='subSection'>
                    <label for="emailLogin" class="form_col">Email :</label> 
                    <input type="text" name="emailLogin" id="emailLogin" class="loginInput" required>
                </div>
                <div class='subSection'>
                    <label for="passwordLogin" class="form_col">Password :</label>
                    <input type="password" name="passwordLogin" id="passwordLogin" class="loginInput" required>
                </div>
                <div class='subSection'>
                    <button name="connect" id="connect" class='loginButton'> <a href="index.php" id='anchorNoDecor'>Sign In</a></button>
                </div>
            </form>            
            <div class='thirdParty'>
                <div><span>OR</span></div>
                <div id='thirdPartyGoogle1'></div>

                <div id='thirdPartyKakao1'>
                    <div class="buttonK" id="kakaoLogin">
                        <img id="kakaoLogo" src="./public/images/kakaoLogin/en/kakao_login_medium.png">
                    </div>
                </div>
            </div>
            <hr>
            <div class='subSection'>
                <div id="withUs">Not with us yet?  </div>
                <button name="login" id="logRegister" class='loginButton'>Sign Up</button>
            </div>

        </div>
    </div>
    
    <?php require("kakaoForm.php"); ?>
    <?php require("googleForm.php"); ?>


