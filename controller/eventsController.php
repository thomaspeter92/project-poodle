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

