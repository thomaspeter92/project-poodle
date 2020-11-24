<?php
// This is for Controller functions.
require_once('./model/MemberManager.php');
require_once("./model/PetProfileManager.php");
require_once("./model/PreviewManager.php");
require_once("./model/EventManager.php");
require_once("./controller/signinController.php");
require_once("./controller/eventsController.php");
require_once("./controller/accountController.php");
require_once("./model/MapManager.php");

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

function accountView($userID){
    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByID($userID);
    require("./view/accountView.php");
};
function legalPage(){
    require('./view/legalPageView.php');
}
function displayAddEditEvent($eventId){
    if(!empty($eventId)){
        $eventManager = new EventManager();
        $eventEditDetails = $eventManager->getEventEditDetails($eventId);
    }
    require('./view/addEditEventView.php');
}

function addEditEventDetails($params){
    $eventManager = new EventManager();
    $eventId = $eventManager->updateEventDetails($params);
    if($eventId){
        //display the details of newly added or edited event
        showEventDetail($eventId);
    }else{
        echo "Event details were not saved properly";
    }
}

function deleteEvent($eventId) {
    $eventManager = new EventManager();
    $eventManager->deleteEvent($eventId);
}



function showMap($eventId){
    // echo $petId;
    $mapManager = new MapManager();
    $event = $mapManager->getMap($eventId);
    require("./view/mapViewTest.php");
}
