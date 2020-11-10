// Kakao Login
{
    Kakao.cleanup();
    console.log(Kakao.isInitialized());
    Kakao.init("cea8248c64bf22c135e642408c2fb6c2");
    console.log(Kakao.isInitialized());

    // if (document.querySelector("#kakaoLoginContainer")) {
    //     Kakao.Auth.createLoginButton({
    //         container: "#kakaoLoginContainer",
    //         success: function(response) {
    //             console.log("Login Success!!");
    //             console.log(response);
    //             requestUserInfo();
    //         },
    //         fail: function(error) {
    //             console.log("Login Failed!!");
    //             console.log(error);
    //         },
    //     });
    // }
    
    const loginWithKakao = (signUp) => {
        //TODO: try/catch for fail
        Kakao.Auth.loginForm({
            success: function(authObj) {
                // console.log("Login Success!!");
                // console.log(authObj);
                requestUserInfo(function(id, nickname, email) {
                    const form = document.querySelector("#kakaoForm");
                    form.querySelector("#kakaoNickname").value = nickname;
                    form.querySelector("#kakaoEmail").value = email;
                    form.querySelector("#kakaoid").value = id;
                    (signUp) ? 
                        form.querySelector("#kakaoSignUp").value = true :
                        form.querySelector("#kakaoSignUp").value = false;
                    //TODO: Direct to user profile page?????
                    form.action = "index.php?action=kakaoLogin";
                    form.submit();       
                });
            },
            fail: function(err) {
                console.log("Login Failed!!");
                console.log(error);
            },
        });
    };

    const requestUserInfo = (callback) => {
        //TODO: try/catch for fail
        Kakao.API.request({
            url: '/v2/user/me',
            success: function(response) {
                const id = response.id;
                const nickname = response.properties.nickname;
                const email = response.kakao_account.email;
                callback(id, nickname, email);
            },
            fail: function(error) {
                console.log("[requestUserInfo]");
                console.log(error);
            }
        });
    };

    // const logoutWithKakao = () => {
    //     //Franco
    //     if (Kakao){
    //     if (!Kakao.Auth.getAccessToken()) {
    //         console.log("[logoutWithKakao]");
    //         alert("Not logged in");
    //         return;
    //     }
    //     Kakao.Auth.logout(() => {
    //         console.log("[logoutWithKakao]");
    //         console.log('logout ok\naccess token -> ' + Kakao.Auth.getAccessToken());
    //     });
    //     } //Franco
    // };

    function logoutWithKakao (){
        //Franco
        if (Kakao){
        if (!Kakao.Auth.getAccessToken()) {
            console.log("[logoutWithKakao]");
            alert("Not logged in");
            return;
        }
        Kakao.Auth.logout(() => {
            console.log("[logoutWithKakao]");
            console.log('logout ok\naccess token -> ' + Kakao.Auth.getAccessToken());
        });
        } //Franco
    }

    // For deleting account of Poodle
    const disconnectWithKakao = () => {
        Kakao.API.request({
            url: "/v1/user/unlink",
            success: function(response) {
                console.log("[disconnectWithKakao]");
                console.log(response);
            },
            fail: function(error) {
                console.log("[disconnectWithKakao][Error]");
                console.log(error);
            }
        });
    };

    const kakaoSignUpBtn = document.querySelector("#kakaoSignUp");
    if (kakaoSignUpBtn) {
        kakaoSignUpBtn.addEventListener("click", () => loginWithKakao(true));
    }

    const kakaoLoginBtn = document.querySelector("#kakaoLogin");
    // const kakaoLoginBtn = document.querySelector("#custom-login-btn");
    if (kakaoLoginBtn) {
        kakaoLoginBtn.addEventListener("click", () => loginWithKakao(false));
    }

    const kakaoLogoutBtn = document.querySelector("#kakaoLogout");
    if (kakaoLogoutBtn) {
        kakaoLogoutBtn.addEventListener("click", logoutWithKakao);
    }

    //TODO: Disconnect button for deleting account
    // const kakaoDisconnectBtn = document.querySelector("#kakaoDisconnect");
    // if (kakaoDisconnectBtn) {
    //     kakaoDisconnectBtn.addEventListener("click", disconnectWithKakao);
    // }
}

