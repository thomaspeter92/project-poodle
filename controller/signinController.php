<?php
function login()
{
    require('./view/loginView.php');
}

function checkLogin($params)
{
    $loginManager = new MemberManager();
    $status = $loginManager->checkLogin($params);
    if ($status) {
        $emailLogin = addslashes(htmlspecialchars((htmlentities(trim($params['emailLogin']))))); 
        $memberDataFromDB = $loginManager->getMemberDataByEmail($emailLogin);

        if ($memberDataFromDB) {
            createSessionByMemberDB($memberDataFromDB);
            header("Location: index.php?action=petPreview");
        } else {
            //TODO: It is not valid email. You haven't signed up yet. ;
            // header("Location: index.php?action=login&error=notSignedUp");
        }
    }
}

function registration()
{
    require('./view/registrationView.php');
}

function logout()
{
    session_unset();
    session_destroy();
    header("Location: index.php");
}

function createSession($id, $name, $imageURL) {
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['imageURL'] = $imageURL;
}

function emailCheck($email){
    $manager = new MemberManager();
    $memberCheck = $manager->getMemberDataByEmail($email);
    if($memberCheck){
        echo "true";
    }
}

function signUpWith($memberData)
{
    if (empty($memberData["email"])) {
        throw new Exception("Sign up is failed!", 1000);
    }
    $email = $memberData["email"];

    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByEmail($email);
    if ($memberDataFromDB) {
        
        signInWith($memberData);
        
        //TODO: Show the user is already signed up with kakao
        
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
            signInWith($memberData);
        } 
        else {
            throw new Exception("Failed to add new member!!", 1004);
        }
    }
}

function signInWith($memberData) {
    if (empty($memberData["email"])) {
        throw new Exception("Sign in is failed!", 1005);
    }
    $email = $memberData["email"];

    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByEmail($email);
    
    if ($memberDataFromDB) {
        createSessionByMemberDB($memberDataFromDB);
        header("Location: index.php?action=petPreview");
    } else {
        //TODO: It is not valid email. You haven't signed up yet. ;
        // header("Location: index.php?action=login&error=notSignedUp");
    }
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

