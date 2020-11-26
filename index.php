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
            // isThatReallyMyDog($_SESSION['id', $_REQUEST['petid'])
            showPetProfile($_REQUEST['petid']);
            break;
        case "petPreview":
            if(isset($_SESSION['id'])){
                // THIS ALSO SHOWS OWNER PROFILE PIC
                showPetPreview($_SESSION['id']);    
            }else{
                header("Location: index.php?action=login&error=login");
            }
            break;
        case "login":
            login();
            break;
        case "checkLogin":
            if (!empty($_REQUEST['emailLogin']) && !empty($_REQUEST['passwordLogin'])) {
                checkLogin($_REQUEST);
            }else {
                header("Location: index.php?action=login&error=login");
            }
            break;
        case "registration":
            registration();
            break;
        case "signUp":
            if (!empty($_REQUEST['username']) && !empty($_REQUEST['password']) && !empty($_REQUEST['confirmpass']) && !empty($_REQUEST['email'])) {
                $memberData = array(
                    "name" => $_REQUEST['username'],
                    "password" => $_REQUEST['password'],
                    "confirmpass" => $_REQUEST['confirmpass'],
                    "email" => $_REQUEST['email'],
                    "kakao" => 0, "google" => 0,
                );
                signUpWith($memberData);
            }else {
                header("Location: index.php?action=petPreview&error=incomplete");
            }
            break;
        case "logout":
            logout();
            break;
        case "addEditInput":
            displayAddEditInput(!empty($_REQUEST['petId']) ? $_REQUEST['petId'] : '');
            break;
        case "addEditPet":
            if (!empty($_REQUEST['name']) AND !empty($_REQUEST['type']) AND !empty($_REQUEST['breed']) AND !empty($_REQUEST['age'])) {
                petAddEdit($_REQUEST);
            } else {

            }
            break;
        case "delPet":
            deletePet($_REQUEST['petId']);
            break;
        case "aboutUs":
            aboutUs();
            break;
        case "partners":
            showPartnersPage();
            break;
        case "contactPage":
            contactPage();
            break;
        case "legalPage":
            legalPage();
            break;
        case "kakaoSignIn":
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
            break;
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
        case "events":
            $sessionID = (isset($_SESSION['id'])) ? $_SESSION['id'] : NULL;
            showUpcomingEventsList($sessionID);
            break;
        case "searchEvents";
            $search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : NULL;
            $option = isset($_REQUEST["option"]) ? $_REQUEST["option"] : NULL;
            showSearchedEventsList($search, $option);
            break;
        case "accountView":
            if(isset($_SESSION['id'])){
                accountView($_SESSION['id']);
            }else{
                login();
            }
            break;
        case "checkChangeAccount":
            if(!isset($_SESSION['id'])){
                header("Location: index.php?action=petPreview&error=notSignedIn");
            }
            else if (empty($_REQUEST['nameInput']) || empty($_REQUEST['emailInput'])) {
                $result = "emptyField";
            } else {
                $result = checkChangeAccount($_REQUEST, $_FILES, $_SESSION['id']);
            }
            echo $result;
            break;
        case "checkChangePassword":
            if(!isset($_SESSION['id'])){
                header("Location: index.php?action=petPreview&error=notSignedIn");
            }
            else if (empty($_REQUEST['currentPW']) || empty($_REQUEST['newPW']) || empty($_REQUEST['confirmPW'])) {
                $result = "emptyPW";
            } else if($_REQUEST['newPW'] !== $_REQUEST['confirmPW']) {
                $result = "matchPW";
            } else {
                $result = checkChangePW($_REQUEST, $_SESSION['id']);
            }
            
            echo $result;
            break;
        case "removeProfilePic":
            if(!isset($_SESSION['id'])){
                header("Location: index.php?action=petPreview&error=notSignedIn");
            } else {
                $result = removeProPic($_SESSION['id']);
                echo $result;
            }
            break;
        case "deleteAccountCheck":
            if(!isset($_SESSION['id'])){
                header("Location: index.php?action=petPreview&error=notSignedIn");
            } else {
                $result = deleteAccountCheck($_SESSION['id']);
                echo $result;
            }
            break;
        case "showEventDetail" :
            isset($_REQUEST['eventId']) ? showEventDetail($_REQUEST) : landing();
            break;
        case "eventCommentPost" :
            eventCommentPost($_REQUEST);
            break;
        case "deleteEventComment" :
            deleteEventComment($_REQUEST['commentId']);
            break;
        case "editEventComment" :
            editEventComment($_REQUEST);
            break;
        case 'loadComments' :
            loadComments($_REQUEST);
            break;
        case "attendEvent" :
            attendEvent($_REQUEST);
            break;
        case "unattendEvent" :
            attendEvent($_REQUEST);
            break;
        case "addEditEvent" :
            displayAddEditEvent(!empty($_REQUEST['eventId']) ? $_REQUEST['eventId'] : '');

            break;

        case "updateEventDetails" :
            // updateEventDetails($eventId = isset($_REQUEST['eventId']) ? $_REQUEST['eventId'] : "" );

            if (!empty($_REQUEST['eventName']) && !empty($_REQUEST['eventGuestLimit']) && !empty($_REQUEST['eventDate']) && !empty($_REQUEST['eventTime']) && !empty($_REQUEST['eventExpiryDate']) && !empty($_REQUEST['eventExpiryTime']) && !empty($_REQUEST['eventDescription'])) {
                $eventData = array(
                "eventName" => $_REQUEST['eventName'],
                "eventGuestLimit" => $_REQUEST['eventGuestLimit'],
                "eventDate" => $_REQUEST['eventDate'],
                "eventTime" => $_REQUEST['eventTime'],
                "eventExpiryDate" => $_REQUEST['eventExpiryDate'],
                "eventExpiryTime" => $_REQUEST['eventExpiryTime'],
                "eventDescription" => $_REQUEST['eventDescription'],
                "hostId" => $_SESSION['id'],
                "eventId" => $_REQUEST['eventId'],
                "itinerary" => $_REQUEST['itinerary'],
                "eventPicture" => $_REQUEST['eventPicture']);

                addEditEventDetails($eventData);
            }
            break;
        case "deleteEvent" :
            $sessionID = (isset($_SESSION['id'])) ? $_SESSION['id'] : NULL;
            deleteEvent($_REQUEST['eventId']);
            showUpcomingEventsList($sessionID);
            break;
        case "loadGuests" :
            loadGuests($_REQUEST);
            break;                  
        case "requestMap":
            showMap();
            break;
        case "requestMapDetail":
            showMapDetail();
            break;
        default:
            landing();
            break;
    }
} catch (Exception $e) {

    require("./view/error.php");
}

