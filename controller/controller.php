<?php
// This is for Controller functions.
require_once("./util/FileUtil.php");
require_once('./model/MemberManager.php');
require_once("./model/PetProfileManager.php");
require_once("./controller/signinController.php");
require_once("./model/EventManager.php");
require_once("./controller/signinController.php");
require_once("./controller/eventsController.php");
require_once("./controller/accountController.php");

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
    $manager = new MemberManager();
    // NEW CODE TO SHOw OWNER PROFILE PIC
    $profilePicURL = $manager->getProfilePic($ownerId);
    //shows owners events
    $loadUserEvents = new EventManager();
    $usersEvents = $loadUserEvents->ownersEvents($ownerId);
    require("./view/previewPet.php");
}

function displayAddEditInput($petId) {
    $petProfileManager = new PetProfileManager();
    $petProfile = $petProfileManager->getPetProfile($petId);
    require("./view/addEditPetView.php");
}

function petAddEdit($params) {
    $addEditManager = new PetProfileManager();
    $success = $addEditManager->addEditPet($params);

    // TO DO ADD ERROR MESSAGING 
    if($success) {
        echo 'success';
    } else {
        echo 'error';
    }
}

function deletePet($petId) {
    $deleteManager = new PetProfileManager();
    $deleteManager->deletePet($petId);
}

function aboutUs(){
    require('./view/aboutUsView.php');
}

function showPartnersPage() {
    require('./view/partnersView.php');
}

function contactPage(){
    require('./view/contactPageView.php');
}

function accountView($userID){
    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByID($userID);
    require("./view/accountView.php");
};
function legalPage(){
    require('./view/legalPageView.php');
}
function addEditEvent(){
    require('./view/addEditEventView.php');
}

function addPoints($userID){
    $manager = new MemberManager;
    $manager->addPoints($userID);
}

function congrats(){
    require('./view/congratsView.php');
}

function coupon(){
    require('./view/couponView.php');
}

function pleaseLogin(){
    require('./view/pleaseLogInView.php');
}

function claimed(){
    require('./view/claimedView.php');
}