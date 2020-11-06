<?php
// This is for Controller functions.
require_once('./model/MemberManager.php');
require_once("./model/TestKakaoManager.php");

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

    echo $_SESSION["name"];

    if($register){
        $registrationManager->createSession($params);
        header("Location: index.php");
    }else{ 
        //header("Location: index.php?action=registration&error=registration"); //@TODO not going here on error
    }
}

function logout()
{
    session_destroy();
    header("Location: index.php");
}

function testShowKakaoLogin($action)
{
    if ($action === "kakao") {
        require("./view/kakaologin.php");
    }
}

function testKakaoLogin($name, $email)
{
    $manager = new TestKakaoManager();

    //Check if the email exists


    $result = $manager->addMemeber($name, $email);

    if ($result) {
        require("./view/kakaologinResult.php");
    } else {
        throw new Exception("Failed to add new member!!", 1001);
    }
}
