

function onGoogleSignIn(googleUser) {

    var googleBtn = document.querySelector("#gSigninBut");
    if(googleBtn){
        var signIn = googleBtn.classList.contains("signin");
        var signUp = googleBtn.classList.contains("signup");
        var attriValue;
        if(signIn === true) attriValue = false;
        if(signUp === true) attriValue = true;
        var profile = googleUser.getBasicProfile();
        // console.log("signIN",profile.getName());
        gRequestUserInfo(googleUser,attriValue);
    }

}


// Sign out the user
function googleSignOut() {
    // console.log(gapi);
    var auth2;
    if(gapi){
        gapi.auth2.init();
        auth2 = gapi.auth2.getAuthInstance();
        // console.log(auth2);
    }
    if(auth2){
        if(auth2.isSignedIn.get() == true){
            auth2.signOut().then(function () {
                // console.log("disconnected");
            });
        }
        auth2.disconnect();
       
        if(auth2.isSignedIn.get() == true) {

        }
    }
 
}


function onFailure(error) {
    // console.log(error);
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

            // console.log(temp);
            // console.log("name is :", name);
        if (signUp) {
            //TODO: Direct to user profile page?????
            form.action = "index.php?action=googleSignUp";
            // console.log('signUp!!');
     
        } else {
            //TODO: Direct to user profile page???? or current page???
            form.action = "index.php?action=googleSignIn";
            // console.log('signIN!!');
    
        }
        form.submit();
    }
}

function signAllOut(){

    //sign out from google
    // console.log("Google logging out");
    googleSignOut();
    // console.log("Kakao logging out");
    logoutWithKakao();

    const form = document.querySelector("#signOutForm");
    form.action = "index.php?action=logout";
    form.submit();
}
