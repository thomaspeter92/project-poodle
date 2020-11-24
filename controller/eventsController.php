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
    if ($events) {
        require('./view/eventsListView.php');
    } else {
        throw new Exception("Failed to show upcoming events!!", 2000);
    }
}

function showEventDetail($params) {
    $showEvent = new EventManager();
    $guestList = $showEvent->loadGuests($params['eventId']);
    $guestCount = $showEvent->getMembersCountBy($params['eventId']);
    $event = $showEvent->getEventDetail($params['eventId']);
    $comments = $showEvent->loadComments($params);
    $eventList = $showEvent->getUpcomingEvents(NULL, NULL, 5);
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

function getGuestProfileImagesOfEvent($eventId, $limit=NULL) {
    $manager = new EventManager();
    $guests = $manager->getMemberProfileImagesBy($eventId, $limit);

    return $guests; 
}

