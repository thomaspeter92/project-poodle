<!-- <script src="https://apis.google.com/js/platform.js"></script> -->
    <div id="SignUpMain">
        <div class = "registerDiv">
        
            <form method="POST" action="index.php" autocomplete="off" id='formSignUp'>

                <input type="hidden" name="action" value="registrationInput" required>
                <div class='subSection'>
                    <label for="username" class="form_col">Name :</label>
                    <input type="text" name="username" id="username" class="loginInput" required>
                </div>
                <div class='subSection'>
                    <label for="password" class="form_col">Password :</label>
                    <input type="password"name="password" class="loginInput" id="password" required>
                </div>
                <div class='subSection'>
                    <label for="confirmpass" class="form_col">Confirm password :</label>
                    <input type="password" name="confirmpass" class="loginInput" id="confirmpass" required>
                </div>
                <div class='subSection'>
                    <label for="email" class="form_col">Email :</label>
                    <input type="text" name="email" id="email" class="loginInput" required>
                </div>
                <div class='subSection'>
                <input type="submit" name="subscribe" id="subscribe" value="Sign Up" class="loginButton">
                </div>
            </form>
            <div class="thirdParty">
                <div id='thirdPartyGoogle2'>
                    <div class='divText'>Sign up with Google :</div>
  
                </div>

                <div id='thirdPartyKakao2'>
                    <div class='divText'>Sign up with Kakao :</div>
                    <div class="buttonK" id="kakaoSignUp">
                        <img id="kakaoLogo" src="./public/images/kakaoLogin/en/kakao_login_medium.png">
                    </div>
                </div>
            </div>
            <hr/>
            <div class=registerSignInDiv>
                
                <div id="withUs">Already with us? </div>
                <button name="login" id="regLogin" value="Sign In" class="loginButton">Sign In</button>

            </div>
        </div>
    </div>

    <?php require("kakaoForm.php"); ?>
    <?php require("googleForm.php"); ?>