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
    
    const signUpWithKakao = () => {
        Kakao.Auth.loginForm({
            success: function(authObj) {
                console.log("Login Success!!");
                console.log(authObj);
                requestUserInfo(true);
            },
            fail: function(err) {
                console.log("Login Failed!!");
                console.log(error);
            },
        });
    };

    const loginWithKakao = () => {
        Kakao.Auth.loginForm({
            success: function(authObj) {
                console.log("Login Success!!");
                console.log(authObj);
                requestUserInfo();
            },
            fail: function(err) {
                console.log("Login Failed!!");
                console.log(error);
            },
        });
    };

    const requestUserInfo = (signUp) => {
        Kakao.API.request({
            url: '/v2/user/me',
            success: function(response) {
                const id = response.id;
                const nickname = response.properties.nickname;
                const email = response.kakao_account.email;
                console.log("[requestUserInfo]");
                console.log(response);
                console.log(id, nickname, email);

                if (signUp) {
                    const form = document.querySelector("#kakaoLoginForm");
                    // form.querySelector("#kakaoid").value = id;
                    form.querySelector("#kakaoNickname").value = nickname;
                    form.querySelector("#kakaoEmail").value = email;
                    form.submit();
                }
            },
            fail: function(error) {
                console.log("[requestUserInfo]");
                console.log(error);
            }
        });
    };

    const logoutWithKakao = () => {
        if (!Kakao.Auth.getAccessToken()) {
            console.log("[logoutWithKakao]");
            alert("Not logged in");
            return;
        }
        Kakao.Auth.logout(() => {
            console.log("[logoutWithKakao]");
            console.log('logout ok\naccess token -> ' + Kakao.Auth.getAccessToken());
        });
    };

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
        kakaoSignUpBtn.addEventListener("click", signUpWithKakao);
    }

    const kakaoLoginBtn = document.querySelector("#kakaoLogin");
    // const kakaoLoginBtn = document.querySelector("#custom-login-btn");
    if (kakaoLoginBtn) {
        kakaoLoginBtn.addEventListener("click", loginWithKakao);
    }

    const kakaoLogoutBtn = document.querySelector("#kakaoLogout");
    if (kakaoLogoutBtn) {
        kakaoLogoutBtn.addEventListener("click", logoutWithKakao);
    }

    // const kakaoDisconnectBtn = document.querySelector("#kakaoDisconnect");
    // if (kakaoDisconnectBtn) {
    //     kakaoDisconnectBtn.addEventListener("click", disconnectWithKakao);
    // }
}

// const loginWithKakao = () => {
//     Kakao.Auth.login({
//         success: (authObj) => {
//             console.log("Login Success!!");
//             console.log(authObj);
//             console.log(JSON.stringify(authObj));
//             console.log(authObj.access_token);
//             console.log(authObj.refresh_token);
//             console.log(Kakao.Auth.getAccessToken());
//         }, 
//         fail: (err) => {
//             console.log("Login Fail!!!");
//             console.error(err);
//             // JSON.stringify(err)
//         }
//     });

// try {
//     return new Promise((resolve, reject) => {
//         console.log(Kakao);
//         if (!Kakao) {
//             reject("Kakao instance does not existed.");
//         } 
//         Kakao.Auth.login({
//             success: (authObj) => {
//                 console.log("Login Success!!");
//                 console.log(authObj);
//                 console.log(JSON.stringify(authObj));
//                 console.log(authObj.access_token);
//                 console.log(authObj.refresh_token);
//             }, 
//             fail: (err) => {
//                 console.log("Login Fail!!!");
//                 console.error(err);
//                 // JSON.stringify(err)
//             }
//         });
//     });
// } catch (err) {
//     console.log("Catch!!!");
//     console.error(err);
// }
// };
