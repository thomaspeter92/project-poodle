<?php
function showSearchedEventsList($text, $option) {
    $events = getSearchedEventsList($text, $option);
    require("./view/eventsList.php");
}

function getSearchedEventsList($text, $option, $limit=NULL) {
    $manager = new EventManager();
    $events = $manager->getUpcomingEvents($text, $option, $limit);
    return $events;
}

function getGuestCountOfEvent($eventId) {
    $manager = new EventManager();
    return $manager->getMembersCountBy($eventId);
}
function showUpcomingEventsList($sessionID) {
    $manager = new EventManager();
    $events = $manager->getUpcomingEvents();    
    require('./view/eventsListView.php');
}

function showMyEventsList($hostId) {
    $manager = new EventManager();
    $events = $manager->ownersEvents($hostId);
    require("./view/eventsListOnProfile.php");
}

function showMyAttendingEventsList($userId) {
    $manager = new EventManager();
    $events = $manager->getAttendingEvents($userId);
    require("./view/eventsListOnProfile.php");
}

function showEventDetail($params) {
    $showEvent = new EventManager();
    $guestList = $showEvent->loadGuests($params);
    $guestCount = $showEvent->getMembersCountBy($params['eventId']);
    $event = $showEvent->getEventDetail($params['eventId']);
    $comments = $showEvent->loadComments($params);
    $eventList = $showEvent->getUpcomingEvents(NULL, NULL, 4);
    $guestIdList = $showEvent->getGuestId($params['eventId']);
    $commentsCount = $showEvent->countComments(($params['eventId']));
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
    $success = $eventAttend->attendEventSend($params);
}

function loadGuests($params) {
    $loadGuests = new EventManager();
    $guestList =  $loadGuests->loadGuests($params);
    $event = $loadGuests->getEventDetail($params['eventId']);
    require('./view/loadGuestsView.php');
}

function getGuestProfileImagesOfEvent($eventId, $limit=NULL) {
    $manager = new EventManager();
    $guests = $manager->getMemberProfileImagesBy($eventId, $limit);

    return $guests; 
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

    if ($_FILES['file']['size'] !== 0) {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($fileActualExt,$allowed)) {
            if ($fileError === 0) {
                if($fileSize < 5000000) {
                    $fileNameNew = uniqid('',true) . '.' . $fileActualExt;
                    $fileDestination = './private/event/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    // $addEditManager->updateImage($params['petId'], $fileNameNew);
                } else {
                    echo "fileError";
                    return null;
                }
            } else {
                echo "fileError";
                return null;

            }
        } else {
            echo "fileError";
            return null;
        }
    }
   
    $photoData = array (
        "eventPicture" => isset($fileNameNew) ? $fileNameNew : NULL ,
    );

    $eventId = $eventManager->updateEventDetails($params, $photoData);

    if($eventId){
        //display the details of newly added or edited event

        header("Location: index.php?action=showEventDetail&eventId=".$eventId);
    }else{
        echo "Event details were not saved properly";
    }
}

function deleteEvent($eventId) {
    $notificationManager = new NotificationManager();
    $notificationManager->setEventCancelNotification($eventId);
    
    $eventManager = new EventManager();
    $eventManager->deleteEvent($eventId);

    
   

  
}


