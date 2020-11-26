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
                 kakaoSignUpBtn.addEventListener("click", () => loginWithKakao(true));
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
                kakaoLoginBtn.addEventListener("click", () => loginWithKakao(false));
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

        const url = "index.php";
        const xhr = new XMLHttpRequest();
        xhr.open("POST", url);
        xhr.addEventListener("load", () => {
            console.log(xhr.status);
            if (xhr.status === 200) {
                if (IsValidJSONString(xhr.responseText)) {
                    const result = JSON.parse(xhr.responseText);
                    if (result.isAuthenticated) {
                        window.href = "index.php?action=petPreview";
                    } else {
                        showErrorForSigin("Please enter a correct email and password.");    
                    }
                } else {    //Error - result is not JSON string
                    showErrorForSigin("Please try it again.");
                }
            } else {    //Error - about response
                showErrorForSigin("Please try it again.");
            }
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

