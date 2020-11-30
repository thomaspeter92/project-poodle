<?php 
require_once("Manager.php");

class NotificationManager extends Manager{
    public function getNotifications($userID) {
        $db = $this-> dbConnect();
        $req = $db->prepare("SELECT * FROM notification WHERE id = $userID");
        $req -> execute(array($userID));
        $notification = $req -> fetchAll(PDO::FETCH_ASSOC);
        $req -> closeCursor();

        return $notification; 
    }
}