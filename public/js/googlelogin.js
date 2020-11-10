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
    //     if(gapi){
        // var auth2 = gapi.auth2.getAuthInstance();
        // auth2.signOut().then(function () {
        //     console.log("disconnected");
        // });

        // auth2.disconnect();
    // }
    gapi.load('auth2', function() {
        gapi.auth2.init({
            client_id: 'CLIENT_ID.apps.googleusercontent.com',
            scope: 'profile'
        });
        console.log(gapi);
        var auth2 = gapi.auth2.getAuthInstance();
        console.log(gapi);
        auth2.signOut().then(function () {
            console.log("disconnected");
        });

        auth2.disconnect();
    });
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


// var googleUser = {};
// var startApp = function() {
//   gapi.load('auth2', function(){
//     // Retrieve the singleton for the GoogleAuth library and set up the client.
//     auth2 = gapi.auth2.init({
//       client_id: '659257235288-dmc48l918ev0pi5073mmg5st88bsesvl.apps.googleusercontent.com',
//       cookiepolicy: 'single_host_origin',
//       // Request scopes in addition to 'profile' and 'email'
//       //scope: 'additional_scope'
//     });
//     attachSignin(document.getElementById('customBtn'));
//   });
// };

// function attachSignin(element) {
//   console.log(element.id);
//   auth2.attachClickHandler(element, {},
//       function(googleUser) {
//         document.getElementById('name').innerText = "Signed in: " +
//             googleUser.getBasicProfile().getName();
//       }, function(error) {
//         alert(JSON.stringify(error, undefined, 2));
//       });
// }



