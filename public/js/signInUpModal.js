
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
            closeModalLogin();
            
            let signUpModal = new ModalLogin(xhr.responseText);
            signUpModal.generate(closeModal);
            
            const kakaoSignUpBtn = document.querySelector("#kakaoSignUp");
            if (kakaoSignUpBtn) {
                kakaoSignUpBtn.addEventListener("click", () => signInWithKakao(true));
            }
            const regLoginBtn = document.querySelector("#regLogin");
            if (regLoginBtn) {
                regLoginBtn.addEventListener("click", () => createSignInModal());
            }
            initGoogle();
            initKakao();

            new FormCheck().formCheck();// Marie ugly way of calling
            new RegistrationCheck().registrationCheck(); 
        }
    }
    xhr.send(null);
};

const createSignInModal = () => {
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
            // googleSignOut();
        }
    };
    xhr0.send();

    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'index.php?action=login');
    xhr.onload = function () {
        if(xhr.status == 200){
            closeModalLogin();
            
            let signInModal = new ModalLogin(xhr.responseText);
            signInModal.generate(closeModal);

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
            initGoogle();
            initKakao();
        }
        new FormCheck().formCheck();// Marie ugly way of calling
    }
    xhr.send(null);
};

const closeModalLogin = () => {
    const signUpModal = document.querySelector(".modalLoginMainDiv");
    if (signUpModal) 
        document.body.removeChild(signUpModal);
};

const closeModal = () => {
    removeScript(GOOGLE_SCRIPT_ID);
    removeScript(KAKAO_SCRIPT_ID);
};

const initGoogle = () => {
    loadScript(GOOGLE_SCRIPT_ID, GOOGLE_URL, () => {
        gapi.load('auth2', function(){
            auth2 = gapi.auth2.init({
            client_id: '659257235288-dmc48l918ev0pi5073mmg5st88bsesvl.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            // Request scopes in addition to 'profile' and 'email'
            //scope: 'additional_scope'
            });
            attachSignin(document.getElementById('googleCustomBtn'));
        });
    });
}

/**
 * Initialize for using Kakao API for sign-in after loading script from KAKAO_URL
 */
const initKakao = () => {
    loadScript(KAKAO_SCRIPT_ID, KAKAO_URL, () => {
        const APP_KEY_FOR_JAVASCRIPT = "cea8248c64bf22c135e642408c2fb6c2";
        Kakao.cleanup();
        Kakao.init(APP_KEY_FOR_JAVASCRIPT);
    });
}

const signAllOut = () => {
    loadScript(GOOGLE_SCRIPT_ID, GOOGLE_URL, () => {
        googleSignOut();
    });
    loadScript(KAKAO_SCRIPT_ID, KAKAO_URL, () => {
        signOutWithKakao();
    });

    const form = document.querySelector("#signOutForm");
    form.action = "index.php?action=logout";
    form.submit();
};

const showErrorForSignIn = (msg) => {
    const warningSpan = document.querySelector("#formSignIn .warning");
    if (warningSpan) {
        warningSpan.innerHTML = msg;
        warningSpan.style.display = "inline";
    } else {
        var oldEmailError = document.querySelector('.emailError');
        if(oldEmailError){
            oldEmailError.remove();
        }
        var emailError = document.createElement('p');
        emailError.className = "emailError";
        emailError.style= "text-align: center; color: #FF3864; font-size: .5em;";
        var emailErrorText = document.createTextNode('The email is already signed up, please sign in.');
        var form = document.querySelector('form');
        emailError.appendChild(emailErrorText);
        form.insertBefore(emailError, form.lastChild);
    }
};

/******************** Normal Sign-in ***********************/
/**
 * AJAX call to checking that the user is authenticated
 * @param { Event } e Event object from sign-in form in loginView.php
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
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php");
        xhr.addEventListener("load", () => {
            if (xhr.status === 200) {
                if (IsValidJSONString(xhr.responseText)) {
                    const result = JSON.parse(xhr.responseText);
                    if (result.signedIn) window.location.href = "index.php?action=petPreview";
                    else if (result.google) showErrorForSignIn("You account has been signed up with Google.");
                    else if (result.kakao) showErrorForSignIn("You account has been signed up with Kakao.");
                    else showErrorForSignIn("Please enter a correct email and password.");
                } 
                else showErrorForSignIn("Please try it again."); //Error - result is not JSON string    
            } 
            else showErrorForSignIn("Please try it again."); //Error - about response
        });
        xhr.send(formData);
    } else {    //Error - emailLogin or passwordLogin is not existed
        showErrorForSignIn("Please try it again.");
    }
    e.preventDefault();
};
/***************************************************/

/******************** Google ***********************/
const attachSignin = (element) => {
    auth2.attachClickHandler(element, {},
        (googleUser) => {
            var signIn = element.classList.contains("signin");
            var signUp = element.classList.contains("signup");
            var attriValue;
            if(signIn === true) attriValue = false;
            if(signUp === true) attriValue = true;
            var profile = googleUser.getBasicProfile();
            gRequestUserInfo(googleUser,attriValue);
        }, 
        (error) => {
            console.log(error);
            //alert(JSON.stringify(error, undefined, 2));
        });
};

const gRequestUserInfo = (gUser,signUp) => {
    var profile = gUser.getBasicProfile();
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

    //TODO: Remove duplicate codes
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php");
    xhr.addEventListener("load", () => {
        if (xhr.status === 200) {
            if (IsValidJSONString(xhr.responseText)) {
                const result = JSON.parse(xhr.responseText);
                if (result.signedIn) {
                    if (result.signedUp)
                        alert("Thank you for joining us!!!");
                    window.location.href = "index.php?action=petPreview";
                }
                if (result.alreadySignedUp) {
                    failGoogleSignIn("You account has been already signed up. Please try to sign in.");
                } else {
                    if (result.kakao) failGoogleSignIn("You account has been signed up with Kakao.");
                    else if (!result.google && !result.kakao) failGoogleSignIn("You account has not been signed up with Google.");
                    else failGoogleSignIn("Your Google account is not signed up yet. Please sign up first.");
                }
            } 
            else failGoogleSignIn("Please try it again."); //Error - result is not JSON string    
        } 
        else failGoogleSignIn("Please try it again."); //Error - about response
    });
    xhr.send(formData);
};

const googleSignOut = () => {
    if(gapi){
        const auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            
        });
        auth2.disconnect();
    }
};

const failGoogleSignIn = (erroMsg) => {
    showErrorForSignIn(erroMsg);
    googleSignOut();
};
/***************************************************/

/********************* Kakao ***********************/
/**
 * Sign in & Sign up with Kakao account
 * @param {boolean} signUp Whether to sign up when signing in with Kakao
 */
const signInWithKakao = (signUp) => {
    Kakao.Auth.loginForm({
        success: (authObj) => {
            requestUserInfo((id, nickname, email, thumbnailURL) => {
                const formData = new FormData();
                formData.append("action", "kakaoSignIn");
                (signUp) ? 
                    formData.append("kakaoSignUp", "true") :
                    formData.append("kakaoSignUp", "false");
                formData.append("kakaoNickname", nickname);
                formData.append("kakaoEmail", email);
                formData.append("kakaoid", id);
                if (thumbnailURL) {
                    formData.append("kakaoThumbnailURL", thumbnailURL);
                }

                //TODO: Remove duplicate codes
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "index.php");
                xhr.addEventListener("load", () => {
                    if (xhr.status === 200) {
                        if (IsValidJSONString(xhr.responseText)) {
                            const result = JSON.parse(xhr.responseText);
                            if (result.signedIn) {
                                if (result.signedUp)
                                    alert("Thank you for joining us!!!");
                                window.location.href = "index.php?action=petPreview";
                            } else {
                                if (result.alreadySignedUp) {
                                    failKakaoSignIn("You account has been already signed up. Please try to sign in.");
                                } else {
                                    if (result.google) failKakaoSignIn("You account has been signed up with Google.");
                                    else if (!result.google && !result.kakao) failKakaoSignIn("You account has not been signed up with Kakao.");
                                    else failKakaoSignIn("Your Kakao account is not signed up yet. Please sign up first.");
                                }
                            }
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

/**
 * Request user information of Kakao account
 * @param {function} callback Informs that requesting is finished with the information
 */
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
            showErrorForSignIn("Please try it again.");
        }
    });
};

/**
 * If sign-in is failed, show error message about Kakao
 * @param {string} erroMsg Error message to be displayed in sign-in modal
 */
const failKakaoSignIn = (erroMsg) => {
    showErrorForSignIn(erroMsg);
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

/**
 * Call this function when deleting account of Project Poodle
 */
const disconnectWithKakao = () => {
    Kakao.API.request({
        url: "/v1/user/unlink",
        success: function(response) {
        },
        fail: function(error) {
        }
    });
};
/***************************************************/

const GOOGLE_URL = "https://apis.google.com/js/api:client.js";
const KAKAO_URL = "https://developers.kakao.com/sdk/js/kakao.min.js";
const KAKAO_SCRIPT_ID = "kakaoScript";
const GOOGLE_SCRIPT_ID = "googleScript";

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

