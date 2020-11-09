<?php
require_once('./model/MemberManager.php');

function landing()
{
    require("./view/landing.php");
}

function login()
{
    require('./view/loginView.php');
}

function checkLogin($params)
{
    $loginManager = new MemberManager();
    $status = $loginManager->checkLogin($params);
    if ($status) {
        header("Location: index.php");
    } else {
        // header("Location: index.php?action=login&error=login");

    }
}

function registration()
{
    require('./view/registrationView.php');
}

function addNewMember($params)
{
    $registrationManager = new MemberManager();
    $register = $registrationManager->addNewMember($params);

    if($register){
        $email = $params['email'];
        if ($registrationManager->createSessionByEmail($email)) {
            header("Location: index.php");
        } else {
            throw new Exception("Failed to create Session!!", 1001);    
        }
    }else{ 
        //header("Location: index.php?action=registration&error=registration"); //@TODO not going here on error
    }
}

function logout()
{
    session_destroy();
    header("Location: index.php");
}

function createSession($id, $name) {
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
}

function signUpWith($memberData)
{
    if (empty($memberData["name"]) or empty($memberData["email"])) {
        throw new Exception("Sign up is failed!", 1003);
    }
    $name = $memberData["name"];
    $email = $memberData["email"];

    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByEmail($email);
    if ($memberDataFromDB) {
        //TODO: Show the user is already signed up with kakao

        if (empty($memberDataFromDB["id"]) or empty($memberDataFromDB["name"])) {
            throw new Exception("Sign up is failed!", 1004);
        }
        $sessionID = $memberDataFromDB["id"];
        $sessionName = isset($memberData["name"]) ? 
                        $memberData["name"] : $memberDataFromDB["name"];
        createSession($sessionID, $sessionName);
        header("Location: index.php");
    } else {
        $result = $manager->addNewMemberByKakao($name, $email);
        if ($result) {
            if ($manager->createSessionByEmail($email)) {
                header("Location: index.php");
            } else {
                throw new Exception("Failed to create Session!!", 1001);    
            }
        } else {
            throw new Exception("Failed to add new member!!", 1001);
        }
    }
}

function signInWith($memberData) {
    if (empty($memberData["email"])) {
        throw new Exception("Sign in is failed!", 1001);
    }
    $email = $memberData["email"];

    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByEmail($email);
    if ($memberDataFromDB) {
        if (empty($memberData["id"]) or empty($memberData["name"])) {
            throw new Exception("Sign in is failed!", 1002);
        }
        $sessionID = $memberDataFromDB["id"];
        $sessionName = isset($memberData["name"]) ? 
                        $memberData["name"] : $memberDataFromDB["name"];
        createSession($sessionID, $sessionName);
        header("Location: index.php");
    } else {
        //TODO: It is not valid email. You haven't signed up yet. 
        
        throw new Exception("Failed to sign in!!", 1001);


    }
}

