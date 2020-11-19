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

function showUpcomingEventsList() {
    $manager = new EventManager();
    $events = $manager->getUpcomingEvents();
    if ($events) {
        require('./view/eventsListView.php');
    } else {
        throw new Exception("Failed to show upcoming events!!", 2000);
    }
}

function getGuestCountOfEvent($eventId) {
    $manager = new EventManager();
    return $manager->getMembersCountBy($eventId);
}

function showEventDetail($params) {
    $showEvent = new EventManager();
    $guestList = $showEvent->loadGuests($params['eventId']);
    $guestCount = $showEvent->getMembersCountBy($params['eventId']);
    $event = $showEvent->getEventDetail($params['eventId']);
    $comments = $showEvent->loadComments($params);
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


function loadComments($params) {
    $commentManager = new EventManager();
    $comments = $commentManager->loadComments($params);
    require("./view/eventCommentsView.php");
}

function editEventComment($params) {
    $editComment = new EventManager();
    $editComment->editComment($params);
}

function attendEvent($params) {
    $eventAttend = new EventManager();
    $eventAttend->attendEventSend($params);
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

