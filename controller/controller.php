<?php
require_once("./model/TestKakaoManager.php");

// This is for Controller functions.


function landing()
{
    require("./view/landing.php");
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
