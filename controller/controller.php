<?php
require_once('./model/MemberManager.php');

function landing(){
    require("./view/landing.php");
}

function login(){
    require('./view/loginView.php');
}

function checkLogin ($params) {
    $loginManager = new MemberManager();
    $status = $loginManager->checkLogin($params);
    if($status) {
        header("Location: index.php");
    }else {
        header("Location: index.php?action=login&error=login");
    }
}

function registration (){
    require('./view/registrationView.php');
}

function addNewMember($params){
    $registrationManager = new MemberManager();
    $register = $registrationManager->addNewMember($params);
    if($register){
        echo "test1";  
        header("Location: index.php");
    }else{
        echo "test2";    
        // header("Location: index.php?action=registration&error=registration");
    }

}
   
