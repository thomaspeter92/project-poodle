<?php
// This is for Controller functions.
require_once('./model/MemberManager.php');
require_once("./model/PetProfileManager.php");
require_once("./model/PreviewManager.php");
require_once("./controller/signinController.php");
require_once("./model/EventManager.php");

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

function displayAddEditInput($petId) {
    $petProfileManager = new PetProfileManager();
    $petProfile = $petProfileManager->getPetProfile($petId);
    require("./view/addEditPetView.php");
}

function petAddEdit($params) {
    $addEditManager = new PetProfileManager();
    $addEditManager->addEditPet($params);
}

function deletePet($petId) {
    $deleteManager = new PetProfileManager();
    $deleteManager->deletePet($petId);
}

function showUpcomingEventsList() {
    $manager = new EventManager();
    $events = $manager->getUpcomingEvents();
    if ($events) {
        require('./view/eventsListView.php');
    } else {
        throw new Exception("Failed to show upcoming events!!", 2000);
    }
}

function showEventDetail($eventId) {
    $showEvent = new EventManager();
    $event = $showEvent->getEventDetail($eventId);
    $comments = $showEvent->loadComments($eventId);
    require("./view/eventDetailedView.php");
}

function eventCommentPost($params) {
    $commentPost = new EventManager();
    $commentPost->commentPost($params);
}

function deleteEventComment($commentId) {
    $deleteComment = new EventManager();
    $deleteComment->commentDelete($commentId);
}

function loadSingleComment($commentId) {
    $loadComment = new EventManager();
    $comment = $loadComment->loadSingleComment($commentId);
    require("./view/editEventCommentView.php");
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
function legalPage(){
    require('./view/legalPageView.php');
}

