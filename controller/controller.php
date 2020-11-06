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

function kakaoSignUp($name, $email)
{
    $manager = new MemberManager();
    $memeberData = $manager->getMemberDataByEmail($email);
    
    if ($memeberData) {
        //TODO: Show the user is already signed up with kakao


        createSession($memeberData["id"], $memeberData["name"]);
        header("Location: index.php");
    } else {
        $result = $manager->addNewMemberByKakao($name, $email);
        if ($result) {
            if ($manager->createSessionByEmail($email)) {
                require("./view/kakaologinResult.php");
            } else {
                throw new Exception("Failed to create Session!!", 1001);    
            }
        } else {
            throw new Exception("Failed to add new member!!", 1001);
        }
    }
}
function createSession($id, $name) {
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
}
