
/**
 * @desc - this function is called when a user is successful with Google Sign-in authentication
 * @param {*} googleUser 
 */
function onGoogleSignIn(googleUser) {

    var googleBtn = document.querySelector("#gSigninBut");
    if(googleBtn){
        var signIn = googleBtn.classList.contains("signin");
        var signUp = googleBtn.classList.contains("signup");
        var attriValue;
        if(signIn === true) attriValue = false;
        if(signUp === true) attriValue = true;
        var profile = googleUser.getBasicProfile();
        gRequestUserInfo(googleUser,attriValue);
    }

}


/**
 * @desc - signs out of application if google Sign-in authentication was used
 */
function googleSignOut() {
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
       
        if(auth2.isSignedIn.get() == true) {

        }
    }
 
}


/**
 * @desc - function retrieves user profile information after signing in or signing up with Google Sign-in authentication and send info to back-end server
 * @param {*} gUser - user object from google from which profile info can be obtained
 * @param {*} signUp - true if signup was performed, false if signin was performed
 */
function gRequestUserInfo(gUser,signUp){
    
    var profile = gUser.getBasicProfile();
    const form = document.querySelector("#googleForm");
    if(form){
        var temp = profile.getName().trim().split(" ");
        var name = temp[0];
        form.querySelector("#googleName").value = name;
        form.querySelector("#googleEmail").value = profile.getEmail();
        form.querySelector("#googlePicture").value = profile.getImageUrl();
        form.querySelector("#googleUserId").value = profile.getId();
        if (signUp) {
            form.action = "index.php?action=googleSignUp";
     
        } else {
            form.action = "index.php?action=googleSignIn";
        }
        form.submit();
    }
}

/**
 * @desc - function signs out of Google, Kakao and call back-end method to close session
 *      - function can be called whichever sign-in methods have been used 
 * 
 */
function signAllOut(){

    //sign out from google
    googleSignOut();

    logoutWithKakao();

    const form = document.querySelector("#signOutForm");
    form.action = "index.php?action=logout";
    form.submit();
}
