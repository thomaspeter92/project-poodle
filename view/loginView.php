    <style>
        .modalSubDiv{
            /* margin: 15% 10% 30% 10%; */
            width:50%;
            height:fit-content;
            margin: auto;
            background-image: none;
            background-color: white;
        }
        
        hr{
            height:2px;
            border-width:0;
            color:gray;
            width:90%;
            background-color: gray;
        }
        .registerDiv{
            background-image: none;
            background-color: white;
            padding: 2%;
            border-radius: 5px;
            display:flex;
            flex-direction: column;
            align-items: center;
            height:100%; 
        }

        .registerSignInDiv{
            width:60%;
            display: flex;
            justify-content: center;
            align-items: center;
        }



        #login{
            border-radius: 5px;
            font-weight: bold;
            font-family: 'Montserrat', sans-serif;
            border: 2px solid grey;
        }

        #SignInMain{
            width:100%;
            height:100%;
        }
        #formSignIn{
            width:90%;
            height:45%;
            padding-top:6%
        }

        #formSignUp{
            width:100%;
            height:45%;
            padding-top:6%
        }
        .modalDivContent{
            margin:0;
            width: 100%;
            height:100%;

        }
        .thirdParty{
            width:100%;
            align-items: center;
            display:flex;
            flex-direction:column;
            justify-content: space-around;
            height:35%; 
            margin:5px 0;
        }
        #thirdPartyGoogle2{
            height:100%;
        }
        #thirdPartyGoogle1, #thirdPartyKakao1{
            margin-top:3px;
        }
        #thirdPartyKakao1:hover, #thirdPartyKakao2:hover{
            cursor:pointer;
        }
        .subSection{
            width:100%;
            margin:4px 0;
            display:flex;
            align-items:center;
            justify-content: center;
        }

        .divText{

            width: 100%;
            margin:10px 0 2px 0;
            font-size: 1em;
        }
        .form_col {
            display: inline-block;
            margin: 10px 15px 10px 0;
            padding: 3px 0px;
            width: 21%; 
            height:30%;
            text-align: right;
            font-size: 1em;
        }
    
        .buttonK{
            display:inline-block;
            height:43px;
            width:88px;
        }

        .divInvisible{
            opacity:0;
        }

        #anchorNoDecor{
            text-decoration: none;
            color:#ffffff;
        }

        #withUs{
            margin-right:5px;
            font-size: 1em;
        }
        .loginInput {
            width:48%;
            border-radius:42px;
            border-style: none;
            border: 1px solid lightgrey;
            padding: 5px;
            font-size: 1em;
        }
        .loginInput:focus {
            outline: none;
        }
        

        .loginButton{
            margin: 0;
            width: auto;
            height: 5vh;
            margin-bottom: 0;
            background-color: #72ddf7;
            border-radius:5vh;
            cursor:pointer;
            color:#ffffff;
            font-size:1em;
            padding:8px 50px;
            border-style: none;
            box-shadow: 5px 10px 18px #acacac;
            text-align: center;
        }
        
        .loginButton:focus {
            outline: none;
        }

    @media (max-width: 900px) {
        .modalSubDiv{
            width:80%;
            height:fit-content;
            margin: 1% 10% 20% 10%;
        }

        .loginButton{
            font-size:0.9em;
            padding:4px 10px;
        }

        .loginInput {
            padding: 2px;
            font-size: 0.9em;
        }
        .form_col {
            font-size:0.9em;
            width: 25%; 
        }
        .divText{
            margin:4px 0 2px 0;
            font-size: 0.9em;
        }
        #withUs{
            font-size: 0.9em;
        }
        .modalButtonClose{
            top: 4%;

        }

    }
    </style>
    
    
    
    <div id="SignInMain">
        <div class = "registerDiv">
            <form method="POST" action="index.php" autocomplete="off" id='formSignIn'>
                <input type="hidden" name="action" value="checkLogin">
                <div class='subSection'>
                    <label for="emailLogin" class="form_col">Email :</label> 
                    <input type="text" name="emailLogin" id="emailLogin" class="loginInput email" required>
                </div>
                <div class='subSection'>
                    <label for="passwordLogin" class="form_col">Password :</label>
                    <input type="password" name="passwordLogin" id="passwordLogin" class="loginInput required" required>
                </div>
                <div class='subSection'>
                    <span class="warning">Please enter a correct email and password.</span>
                </div>
                <div class='subSection'>
                    <button type="submit" name="connect" id="connect" class='loginButton submitButton'>Sign In</button>
                </div>
            </form>            
            <div class='thirdParty'>
                <div><span>OR</span></div>
                <div id='thirdPartyGoogle1'>
                    <div id="gSignInWrapper">
                        <div id="googleCustomBtn" class="customGPlusSignIn signin">
                            <span class="icon"></span>
                            <span class="buttonText">Sign In</span>
                        </div>
                    </div>
                </div>

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



