<?php 
require_once("Manager.php");

class NotificationManager extends Manager{
    public function getNotifications($userID) {
        $db = $this-> dbConnect();
        $req = $db->prepare("SELECT * FROM notification WHERE userID = $userID ORDER BY notificationDate DESC");
        $req -> execute();
        $notifications = $req -> fetchAll(PDO::FETCH_ASSOC);
        $req -> closeCursor();

        return $notifications; 
    }

    public function clearNotifications($userID) {
        $db = $this-> dbConnect();
        $req = $db->prepare("UPDATE notification SET viewed = 1 WHERE userID = $userID ORDER BY notificationDate DESC");
        $result = $req -> execute();
        $req -> closeCursor();

        return $result; 
    }
}