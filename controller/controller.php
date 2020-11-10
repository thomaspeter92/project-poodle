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
    if (empty($memberData["email"])) {
        throw new Exception("Sign up is failed!", 1000);
    }
    $email = $memberData["email"];

    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByEmail($email);
    if ($memberDataFromDB) {
        //TODO: Show the user is already signed up with kakao

        if (empty($memberDataFromDB["id"]) or empty($memberDataFromDB["name"])) {
            throw new Exception("Sign up is failed!", 1001);
        }
        $sessionID = $memberDataFromDB["id"];
        $sessionName = isset($memberData["name"]) ? 
                        $memberData["name"] : $memberDataFromDB["name"];
        createSession($sessionID, $sessionName);
        header("Location: index.php");
    } else {
        // echo "<pre>";
        // print_r($memberData);
        // echo "</pre>";
        // echo array_key_exists("kakao", $memberData);
        // echo "<br>";
        // echo array_key_exists("google", $memberData);
        // echo "<br>";

        if (empty($memberData["name"]) 
         or empty($memberData["password"]) 
         or empty($memberData["email"])
         or !array_key_exists("kakao", $memberData)
         or !array_key_exists("google", $memberData)) {
            throw new Exception("Sign up is failed!", 1002);
        }

        $result = $manager->addNewMember($memberData);
        if ($result) {
            if ($manager->createSessionByEmail($email)) {
                header("Location: index.php");
            } else {
                throw new Exception("Failed to create Session!!", 1003);    
            }
        } else {
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
        if (empty($memberDataFromDB["id"]) or empty($memberDataFromDB["name"])) {
            throw new Exception("Sign in is failed!", 1006);
        }
        $sessionID = $memberDataFromDB["id"];
        $sessionName = isset($memberData["name"]) ? 
                        $memberData["name"] : $memberDataFromDB["name"];
        createSession($sessionID, $sessionName);
        header("Location: index.php");
    } else {
        //TODO: It is not valid email. You haven't signed up yet. 
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "TODO: It is not valid email. You haven't signed up yet. ";
        // throw new Exception("Failed to sign in!!", 1007);
    }
}

