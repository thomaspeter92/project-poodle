

function onGoogleSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log(profile.getName());
    gRequestUserInfo(googleUser,false);
}

function onGoogleSignUp(googleUser){
    var profile = googleUser.getBasicProfile();
    console.log(profile.getName());
    gRequestUserInfo(googleUser,true);
}
// Sign out the user
function googleSignOut() {
    console.log(gapi);
    gapi.auth2.init();
    var auth2 = gapi.auth2.getAuthInstance();
    console.log("2",auth2);
    if(auth2){
        auth2.signOut().then(function () {
            console.log("disconnected");
        });
        auth2.disconnect();
    }
 
}


function onFailure(error) {
    console.log(error);
}


function gRequestUserInfo(gUser,signUp){
    
    var profile = gUser.getBasicProfile();
    const form = document.querySelector("#googleForm");
    var temp = profile.getName().trim().split(" ");
    var name = temp[0];
    form.querySelector("#googleName").value = name;
    form.querySelector("#googleEmail").value = profile.getEmail();
    form.querySelector("#googlePicture").value = profile.getImageUrl();
    form.querySelector("#googleUserId").value = profile.getId();

        console.log(temp);
        console.log("name is :", name);
    if (signUp) {
        //TODO: Direct to user profile page?????
        form.action = "index.php?action=googleSignUp";
        console.log('signUp');
    } else {
        //TODO: Direct to user profile page???? or current page???
        form.action = "index.php?action=googleSignIn";
        console.log('signIN');

    }
    form.submit();
      
}

function signAllOut(){

    //sign out from google
    googleSignOut();
    logoutWithKakao();

    const form = document.querySelector("#signOutForm");
    form.action = "index.php?action=logout";
    form.submit();
}
