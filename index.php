<!-- index.php -->

<?php
session_start();
require("./controller/controller.php");
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "landing";

try {
    switch ($action) {
        case "landing":
            landing();
            break;
        case "login":
            login();
            break;
        case "checkLogin":
            if (!empty($_REQUEST['emailLogin']) && !empty($_REQUEST['passwordLogin'])) {
                checkLogin($_REQUEST);
            } else {
                header("Location: index.php?action=login&error=login");
            }
            break;
        case "registration":
            registration();
            break;
        case "registrationInput":
            if (!empty($_REQUEST['username']) && !empty($_REQUEST['password']) && !empty($_REQUEST['email'])) {
                $memberData = array(
                    "name" => $_REQUEST['username'],
                    "password" => $_REQUEST['password'],
                    "email" => $_REQUEST['email'],
                    "kakao" => 0, "google" => 0,
                );
                signUpWith($memberData);
            } else {
                header("Location: index.php?action=registration&error=registration");
            }
            break;
        case "logout":
            logout();
            break;
        case "kakaoLogin":
            $kakaoSignUp = isset($_REQUEST["kakaoSignUp"]) ? $_REQUEST["kakaoSignUp"] : NULL;
            $kakaoNickname = isset($_REQUEST["kakaoNickname"]) ? $_REQUEST["kakaoNickname"] : NULL;
            $kakaoEmail = isset($_REQUEST["kakaoEmail"]) ? $_REQUEST["kakaoEmail"] : NULL;
            $kakaoid = isset($_REQUEST["kakaoid"]) ? $_REQUEST["kakaoid"] : NULL;
            
            if ($kakaoNickname and $kakaoEmail) {
                if ($kakaoSignUp === "true") {
                    $memberData = array(
                        "name" => $kakaoNickname,
                        "password" => $kakaoid. "." .uniqid(),
                        "email" => $kakaoEmail,
                        "kakao" => 1, "google" => 0,
                    );
                    signUpWith($memberData);
                 } 
                 else {
                    $memberData = array(
                        "name" => $kakaoNickname,
                        "email" => $kakaoEmail,
                        "kakao" => 1, "google" => 0,
                    );
                    signInWith($memberData);
                 } 
            } else {
                throw new Exception("Kakao Sign Up is failed", 1000);
            }
            break;
        default:
            landing();
            break;
    }
} catch (Exception $e) {
    require("./view/error.php");
}
