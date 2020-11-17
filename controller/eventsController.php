<?php
function showSearchedEventsList($text) {
    $events = getSearchedEventsList($text);
    if ($events) {
        require("./view/eventsList.php");
    } else {
        throw new Exception("Failed to show upcoming events!!", 2000);
    }
}

function getSearchedEventsList($text) {
    $manager = new EventManager();
    $events = $manager->getUpcomingEvents($text);
    if ($events) {
        return $events;
    } else {
        throw new Exception("Failed to show upcoming events!!", 2000);
    }
}

function getGuestCountOfEvent($eventId) {
    $manager = new EventManager();
    return $manager->getMembersCountBy($eventId);
}

