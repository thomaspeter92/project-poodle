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
        case "petprofile":
            // print_r($_REQUEST);
            showPetProfile($_REQUEST['petid']);
            break;
        case "petPreview":
            if(isset($_SESSION['id'])){
                showPetPreview($_SESSION['id']);
            }else{
                login();
            }
            
            //We have to check if it also works with our cookies 
            
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
        case "aboutUs":
            aboutUs();
            break;
        case "contactPage":
            contactPage();
            break;
        case "kakaoLogin":
            $kakaoSignUp = isset($_REQUEST["kakaoSignUp"]) ? $_REQUEST["kakaoSignUp"] : NULL;
            $kakaoNickname = isset($_REQUEST["kakaoNickname"]) ? $_REQUEST["kakaoNickname"] : NULL;
            $kakaoEmail = isset($_REQUEST["kakaoEmail"]) ? $_REQUEST["kakaoEmail"] : NULL;
            $kakaoid = isset($_REQUEST["kakaoid"]) ? $_REQUEST["kakaoid"] : NULL;
            $kakaoThumbnailURL = isset($_REQUEST["kakaoThumbnailURL"]) ? $_REQUEST["kakaoThumbnailURL"] : NULL;
            
            if ($kakaoNickname and $kakaoEmail) {
                if ($kakaoSignUp === "true") {
                    $memberData = array(
                        "name" => $kakaoNickname,
                        "password" => $kakaoid. "." .uniqid(),
                        "email" => $kakaoEmail,
                        "kakao" => 1, "google" => 0,
                        "imageURL" => $kakaoThumbnailURL,
                    );
                    signUpWith($memberData);
                 } 
                 else {
                    $memberData = array(
                        "name" => $kakaoNickname,
                        "email" => $kakaoEmail,
                        "kakao" => 1, "google" => 0,
                        "imageURL" => $kakaoThumbnailURL,
                    );
                    signInWith($memberData);
                 } 
            } else {
                throw new Exception("Kakao Sign Up is failed", 1000);
            }
        case "googleSignIn":
            $email = isset($_REQUEST['googleEmail']) ? $_REQUEST['googleEmail'] : NULL;
            $name = isset($_REQUEST['googleName']) ? $_REQUEST['googleName'] : NULL;
            $pictureURL = isset($_REQUEST['googlePicture']) ? $_REQUEST['googlePicture'] : NULL;
            $userId = isset($_REQUEST['googleUserId']) ? $_REQUEST['googleUserId'] : NULL;
            $memberData = array(
                "name" => $name,
                "email" => $email,
                "kakao" => 0, "google" => 1,
                "imageURL" => $pictureURL,
            );
            signInWith($memberData);
            break;
        case "googleSignUp":
            $email = isset($_REQUEST['googleEmail']) ? $_REQUEST['googleEmail'] : NULL;
            $name = isset($_REQUEST['googleName']) ? $_REQUEST['googleName'] : NULL;
            $pictureURL = isset($_REQUEST['googlePicture']) ? $_REQUEST['googlePicture'] : NULL;
            $userId = isset($_REQUEST['googleUserId']) ? $_REQUEST['googleUserId'] : NULL;

            //Register user as a member in database
            $memberData = array(
                "name" => $name,
                "password" => $userId. "." .uniqid(),
                "email" => $email,
                "kakao" => 0, "google" => 1,
                "imageURL" => $pictureURL,
            );
            signUpWith($memberData);
            break;
        default:
            landing();
            break;

    }
} catch (Exception $e) {

    require("./view/error.php");
}

