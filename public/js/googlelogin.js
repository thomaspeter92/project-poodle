

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


// Sign out the user
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


function onFailure(error) {

}


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
            //TODO: Direct to user profile page?????
            form.action = "index.php?action=googleSignUp";
     
        } else {
            //TODO: Direct to user profile page???? or current page???
            form.action = "index.php?action=googleSignIn";
        }
        form.submit();
    }
}

function signAllOut(){

    //sign out from google

    googleSignOut();

    logoutWithKakao();

    const form = document.querySelector("#signOutForm");
    form.action = "index.php?action=logout";
    form.submit();
}
