<?php
function login() {
    require('./view/loginView.php');
}

function registration() {
    require('./view/registrationView.php');
}

function logout() {
    session_unset();
    session_destroy();
    header("Location: index.php");
}

function createSession($id, $name, $imageURL) {
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['imageURL'] = $imageURL;
}

function checkLogin($params) {
    $result = array("signedIn" => FALSE);

    $loginManager = new MemberManager();
    $status = $loginManager->checkLogin($params);
    if ($status) {
        $emailLogin = addslashes(htmlspecialchars((htmlentities(trim($params['emailLogin']))))); 
        $memberDataFromDB = $loginManager->getMemberDataByEmail($emailLogin);
        
        if ($memberDataFromDB) {
            $singedIn = TRUE;
            if ($memberDataFromDB["google"]) {
                $singedIn = FALSE;
            }
            if ($memberDataFromDB["kakao"]) {
                $singedIn = FALSE;
            }
            $result["google"] = intval($memberDataFromDB["google"]);
            $result["kakao"] = intval($memberDataFromDB["kakao"]);
            $result["signedIn"] = $singedIn;
            
            if ($singedIn) {
                createSessionByMemberDB($memberDataFromDB);
            }
        }
    }
    echo json_encode($result);
}

function signUpWith($memberData) {
    if (empty($memberData["email"])) {
        throw new Exception("Sign up is failed!", 1000);
    }
    $email = $memberData["email"];

    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByEmail($email);
    if ($memberDataFromDB) {
        $result = array("alreadySignedUp" => TRUE);
        echo json_encode($result);
    } else {
        if (empty($memberData["name"]) 
         or empty($memberData["password"]) 
         or empty($memberData["email"])
         or !array_key_exists("kakao", $memberData)
         or !array_key_exists("google", $memberData)) {
            throw new Exception("Sign up is failed!", 1002);
        }

        $result = $manager->addNewMember($memberData);
        if ($result) {
            signInWith($memberData, TRUE);
        } else {
            throw new Exception("Failed to add new member!!", 1004);
        }
    }
}

function signInWith($memberData, $signedUp=FALSE) {
    if (empty($memberData["email"])) {
        throw new Exception("Sign in is failed!", 1005);
    }
    $email = $memberData["email"];
    $result = array("signedIn" => FALSE);

    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByEmail($email);
    
    if ($memberDataFromDB) {
        if ($signedUp) {
            $result["signedUp"] = TRUE;
        }
        
        $singedIn = TRUE;
        if ($memberData["google"] != $memberDataFromDB["google"]
            or $memberData["kakao"] != $memberDataFromDB["kakao"]) {
            $result["google"] = intval($memberDataFromDB["google"]);
            $result["kakao"] = intval($memberDataFromDB["kakao"]);
            $singedIn = FALSE;
        }
        $result["signedIn"] = $singedIn;

        if ($singedIn) {
            createSessionByMemberDB($memberDataFromDB);
        }   
    }
    echo json_encode($result);
}

function createSessionByMemberDB($memberDataFromDB) {
    if (empty($memberDataFromDB["id"]) or empty($memberDataFromDB["name"])) {
        throw new Exception("Sign in is failed!", 1006);
    }
    $profileImageDir = "./private/profile/";
    $sessionID = $memberDataFromDB["id"];
    $sessionName = $memberDataFromDB["name"];
    $sessionImageURL = NULL;
    if (isset($memberDataFromDB["profileImage"])) {
        $sessionImageURL = $profileImageDir.$memberDataFromDB["profileImage"];
    }
    createSession($sessionID, $sessionName, $sessionImageURL);
}

