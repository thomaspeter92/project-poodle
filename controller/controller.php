<?php
// This is for Controller functions.
require_once('./model/MemberManager.php');
require_once("./model/PetProfileManager.php");
require_once("./model/PreviewManager.php");
require_once("./controller/signinController.php");

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
   
function aboutUs(){
    require('./view/aboutUsView.php');
}
function contactPage(){
    require('./view/contactPageView.php');
}
