function onGoogleSignIn(googleUser) {
    gRrequestUserInfo = (googleUser,false);
}

function onGoogleSignUp(googleUser){
    gRrequestUserInfo = (googleUser,true);
}
// Sign out the user
function googleSignOut() {
    
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log("disconnected");
    });

    auth2.disconnect();
}


function onFailure(error) {
    console.log(error);
}
// //////////////////////////////////////////////////
const signUpWithGoogle = () => {

    gRequestUserInfo(true);
};

const loginWithGoogle = () => {

    gRequestUserInfo();

};

const gRrequestUserInfo = (gUser,signUp) => {
    var profile = gUser.getBasicProfile();

    const form = document.querySelector("#googleForm");
    form.querySelector("#googleName").value = profile.getName();
    form.querySelector("#googleEmail").value = profile.getEmail();
    form.querySelector("#googlePicture").value = profile.getImageUrl();
    form.querySelector("#googleUserId").value = profile.getId();
    form.submit();
            
    if (signUp) {
        //TODO: Direct to user profile page?????
        form.action = "index.php?action=googleSignUp";
        // form.action = "kakaologinResult.php?signUp=true";
    } else {
        //TODO: Direct to user profile page???? or current page???
        form.action = "index.php";
        // form.action = "kakaologinResult.php";
    }
    form.submit();
        },
        fail: function(error) {
            console.log("[requestUserInfo]");
            console.log(error);
        }
    });
};




//   function renderButton() {
//     gapi.signin2.render('my-signin2', {
//       'scope': 'profile email',
//       'width': 240,
//       'height': 50,
//       'longtitle': true,
//       'theme': 'dark',
//       'onsuccess': onGoogleSignIn,
//       'onfailure': onFailure
//     });
//   }

