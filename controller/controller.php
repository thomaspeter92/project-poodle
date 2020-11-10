<?php
// This is for Controller functions.
require_once("./model/PetProfileManager.php");
require_once('./model/MemberManager.php');
function landing()
{
    require("./view/landing.php");
}

function showPetProfile($petId){
    // echo $petId;
    $petProfileManager = new PetProfileManager();
    $petProfile = $petProfileManager->getPetProfile($petId);
    require("./view/petProfileView.php");
}
function showPetPreview($ownerId){
    // echo $petId;
    $previewManager = new PetProfileManager();
    $petPreviews = $previewManager->getPreview($ownerId);
    require("./view/previewPet.php");
}




function petAddEdit($params) {
    $addEditManager = new PetProfileManager();
    $addEditManager->addEditPet($params);
    require("./view/previewPet.php");
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
        // header("Location: index.php?action=login&error=login");

    }
}

function registration (){
    require('./view/registrationView.php');
}

function addNewMember($params){
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

function logout(){
    session_destroy();
    header("Location: index.php");
}
   
