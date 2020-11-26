
const createSignUpModal = () =>{
   
    //Close the menu
    const hoverWrapper = document.querySelector(".hoverWrapper"); 
    if (hoverWrapper){
       if (hoverWrapper.classList.contains("show")) toggleMenu();
    }

    
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=registration');
    xhr.onload = function () {
        if(xhr.status == 200){
            let signUpModal = new ModalLogin(xhr.responseText);
            signUpModal.generate('#gSigninBut','#googleHome');
            
            //Get the Google button from the HTML page and add to the modal page
            signUpModal.addExternalButton('#thirdPartyGoogle2','#gSigninBut','signup');

             const kakaoSignUpBtn = document.querySelector("#kakaoSignUp");
             if (kakaoSignUpBtn) {
                 kakaoSignUpBtn.addEventListener("click", () => signInWithKakao(true));
             }
             const regLoginBtn = document.querySelector("#regLogin");
             if (regLoginBtn) {
                regLoginBtn.addEventListener("click", () => createSignInModal());
             }
            new FormCheck().formCheck();// Marie ugly way of calling
            new RegistrationCheck().registrationCheck(); 
        }
    }
    xhr.send(null);
    
};

const createSignInModal = () =>{
    //Close the menu
    const hoverWrapper = document.querySelector(".hoverWrapper"); 
    if (hoverWrapper){
        if(hoverWrapper.classList.contains("show")) toggleMenu();
    }

    //Sign out google if there is no session but google signed in
    var xhr0 = new XMLHttpRequest();
    xhr0.open('POST','./././controller/sessionCheck.php');
    xhr0.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhr0.onload= function(){
        let value= xhr.responseText;
        if(!value){
            googleSignOut();
        }
    };
    xhr0.send();

    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=login');
    xhr.onload = function () {
        if(xhr.status == 200){
            let signInModal = new ModalLogin(xhr.responseText);
            signInModal.generate('#gSigninBut','#googleHome');

            //Get the Google button from the HTML page and add to the modal page
            signInModal.addExternalButton('#thirdPartyGoogle1','#gSigninBut','signin');

            const kakaoLoginBtn = document.querySelector("#kakaoLogin");
            if (kakaoLoginBtn) {
                kakaoLoginBtn.addEventListener("click", () => signInWithKakao(false));
            }

            const loginRegisterBtn = document.querySelector("#logRegister");
            if (loginRegisterBtn) {
                loginRegisterBtn.addEventListener("click", () => createSignUpModal());
            }

            const formSignIn = document.querySelector("#formSignIn");
            if (formSignIn) {
                formSignIn.addEventListener("submit", signIn);
            }
        }
        new FormCheck().formCheck();// Marie ugly way of calling
    }
    xhr.send(null);
};

/**
 * AJAX call to checking that the user is authenticated
 * @param { Event } e 
 */
const signIn = (e) => {
    const emailLogin = document.querySelector("#emailLogin");
    const passwordLogin = document.querySelector("#passwordLogin");

    if (emailLogin.classList.contains("red")) {
        const warningSpan = document.querySelector("#formSignIn .warning");
        warningSpan.innerHTML = "Please enter a correct email.";
        warningSpan.style.display = "inline";
        e.preventDefault();
        return;
    }

    if (emailLogin && passwordLogin) {
        const formData = new FormData();
        formData.append("action", "checkLogin");
        formData.append("emailLogin", emailLogin.value);
        formData.append("passwordLogin", passwordLogin.value);

        //TODO: Remove duplicate codes - signInUpModal.js
        const failedMsg = "Please enter a correct email and password.";
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php");
        xhr.addEventListener("load", () => {
            if (xhr.status === 200) {
                if (IsValidJSONString(xhr.responseText)) {
                    const result = JSON.parse(xhr.responseText);
                    if (result.isAuthenticated) window.href = "index.php?action=petPreview";
                    else showErrorForSigin(failedMsg);
                } 
                else showErrorForSigin("Please try it again."); //Error - result is not JSON string    
            } 
            else showErrorForSigin("Please try it again."); //Error - about response
        });
        xhr.send(formData);
    } else {    //Error - emailLogin or passwordLogin is not existed
        showErrorForSigin("Please try it again.");
    }
    e.preventDefault();
};

const showErrorForSigin = (msg) => {
    const warningSpan = document.querySelector("#formSignIn .warning");
    warningSpan.innerHTML = msg;
    warningSpan.style.display = "inline";
};

const signAllOut = () => {
    googleSignOut();
    signOutWithKakao();

    const form = document.querySelector("#signOutForm");
    form.action = "index.php?action=logout";
    form.submit();
};

/******************** Google ***********************/
/**
 * This function is invoked by <div id='gSigninBut'>
 * IMPORTANT: onGoogleSignIn is not invoked if it changes to arrow function
 * @param {*} googleUser 
 */
function onGoogleSignIn(googleUser) {
    signInWithGoogle(googleUser);
}

const signInWithGoogle = (googleUser) => {
    console.log("signInWithGoogle");
    var auth2 = gapi.auth2.getAuthInstance();
	if (auth2.isSignedIn.get()) {
        var googleBtn = document.querySelector("#gSigninBut");
        if(googleBtn){
            var signIn = googleBtn.classList.contains("signin");
            var signUp = googleBtn.classList.contains("signup");
            var attriValue;
            if(signIn === true) attriValue = false;
            if(signUp === true) attriValue = true;
            gRequestUserInfo(googleUser,attriValue);
        }
    }
}

const gRequestUserInfo = (gUser,signUp) => {
    var profile = gUser.getBasicProfile();
    const form = document.querySelector("#googleForm");
    if(form){
        var temp = profile.getName().trim().split(" ");
        var name = temp[0];
        
        const formData = new FormData();
        (signUp) ?
            formData.append("action", "googleSignUp") :
            formData.append("action", "googleSignIn");
        formData.append("googleName", name);
        formData.append("googleEmail", profile.getEmail());
        formData.append("googleUserId", profile.getId());
        //TODO: test if the image is not set
        formData.append("googlePicture", profile.getImageUrl());

        const failedMsg = "Your Google account is not signed up yet. Please sign up first.";
        //TODO: Remove duplicate codes
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php");
        xhr.addEventListener("load", () => {
            if (xhr.status === 200) {
                if (IsValidJSONString(xhr.responseText)) {
                    const result = JSON.parse(xhr.responseText);
                    if (result.isAuthenticated) window.href = "index.php?action=petPreview";
                    else failGoogleSignIn(failedMsg);
                } 
                else failGoogleSignIn("Please try it again."); //Error - result is not JSON string    
            } 
            else failGoogleSignIn("Please try it again."); //Error - about response
        });
        xhr.send(formData);
    }
};

const googleSignOut = () => {
    var auth2;
    if(gapi){
        gapi.auth2.init();
        auth2 = gapi.auth2.getAuthInstance();
    }
    if(auth2){
        if(auth2.isSignedIn.get() == true){
            auth2.signOut().then(function () {
            });
        }
        auth2.disconnect();
    }
};

const failGoogleSignIn = (erroMsg) => {
    showErrorForSigin(erroMsg);
    googleSignOut();
};
/***************************************************/

/********************* Kakao ***********************/
function initKakao(){
    Kakao.cleanup();
    Kakao.init("cea8248c64bf22c135e642408c2fb6c2");
}

const signInWithKakao = (signUp) => {
    Kakao.Auth.loginForm({
        success: (authObj) => {
            requestUserInfo((id, nickname, email, thumbnailURL) => {
                const formData = new FormData();
                formData.append("action", "kakaoLogin");
                (signUp) ? 
                    formData.append("kakaoSignUp", "true") :
                    formData.append("kakaoSignUp", "false");
                formData.append("kakaoNickname", nickname);
                formData.append("kakaoEmail", email);
                formData.append("kakaoid", id);
                if (thumbnailURL) {
                    formData.append("kakaoThumbnailURL", thumbnailURL);
                }

                const failedMsg = "Your Kakao account is not signed up yet. Please sign up first.";
                
                //TODO: Remove duplicate codes
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "index.php");
                xhr.addEventListener("load", () => {
                    if (xhr.status === 200) {
                        if (IsValidJSONString(xhr.responseText)) {
                            const result = JSON.parse(xhr.responseText);
                            if (result.isAuthenticated) window.href = "index.php?action=petPreview";
                            else failKakaoSignIn(failedMsg);
                        } 
                        else failKakaoSignIn("Please try it again."); //Error - result is not JSON string    
                    } 
                    else failKakaoSignIn("Please try it again."); //Error - about response
                });
                xhr.send(formData);
            });
        },
        fail: (err) => {
            failKakaoSignIn("Please try it again.");
        },
    });
};

const requestUserInfo = (callback) => {
    Kakao.API.request({
        url: '/v2/user/me',
        success: (response) => {
            const id = response.id;
            const nickname = response.properties.nickname;
            const email = response.kakao_account.email;
            const thumbnailURL = response.properties.thumbnail_image;
            callback(id, nickname, email, thumbnailURL);
        },
        fail: (error) => {
            showErrorForSigin("Please try it again.");
        }
    });
};

const failKakaoSignIn = (erroMsg) => {
    showErrorForSigin(erroMsg);
    signOutWithKakao();
};

const signOutWithKakao = () => {
    if (Kakao){
        if (Kakao.Auth.getAccessToken()) {
            Kakao.Auth.logout(() => {
            });
        }
    }
};

// For deleting account of Poodle
const disconnectWithKakao = () => {
    Kakao.API.request({
        url: "/v1/user/unlink",
        success: function(response) {
            // console.log("[disconnectWithKakao]");
            // console.log(response);
        },
        fail: function(error) {
            // console.log("[disconnectWithKakao][Error]");
            // console.log(error);
        }
    });
};
/***************************************************/

initKakao();

var dSignUpBut =  document.querySelector("#desktopSignUpLink");
if (dSignUpBut) {
    dSignUpBut.addEventListener("click", createSignUpModal);
}

var mSignUpBut =  document.querySelector("#mobileSignUpLink");
if (mSignUpBut) {
    mSignUpBut.addEventListener("click", createSignUpModal); 
}

var dSignInBut =  document.querySelector("#desktopLogInLink");
if (dSignInBut) {
    dSignInBut.addEventListener("click", createSignInModal);
}
var mSignInBut1 =  document.querySelector("#mobileLogInLink1");
if (mSignInBut1) {
    mSignInBut1.addEventListener("click", createSignInModal);
}

var mSignInBut2 =  document.querySelector("#mobileLogInLink2");
if (mSignInBut2) {
    mSignInBut2.addEventListener("click", createSignInModal);  
}

