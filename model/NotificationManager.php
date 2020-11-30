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

    public function commentPostNotification($params) {

        $eventId = $params['eventId'];
        $author = $params['author'];
        $eventName = $params['eventName'];

        $href = "<a href='https://localhost/index.php?action=showEventDetail&eventId={$eventId}>";
        $message = "{$author} commented in {$eventName}";
        $userID = $params['hostId'];

        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO notification (userID, message, href) VALUES (:userID, :message, :href)");
        $req->bindParam(':userID',$userID,PDO::PARAM_INT);
        $req->bindParam(':message',$message,PDO::PARAM_STR);
        $req->bindParam(':href',$href,PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();

    }
}