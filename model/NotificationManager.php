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

    public function setEventCancelNotification($eventId){
        $db = $this->dbConnect();

        // Get all users to be affected by the event cancel notification
        $response = $db->prepare("SELECT a.guestId AS guestId, e.name AS eventName, e.eventDate AS eventDate FROM eventattend a JOIN event e ON a.eventId =  e.id WHERE a.eventId = :eventId");
        $response->bindValue(":eventId", $eventId, PDO::PARAM_INT);
        $users = $response->execute();
       
        $count = 0;

        while($data = $response->fetch(PDO::FETCH_ASSOC)){ 
            $eventDateTime = new DateTime ($data['eventDate']);
            $now  = new DateTime(date("Y-m-d h:i:s"));
            $res =  $eventDateTime->getTimestamp() - $now->getTimestamp();
            if($res > 0){
                $query = "INSERT INTO notification(userID, message, viewed, notificationDate, href) 
                VALUES(:userID, :message , :viewed, NOW(), :href)";
                $resp = $db->prepare($query);
                $resp->bindValue(":userID", $data['guestId'], PDO::PARAM_INT);
                $resp->bindValue(":message","#".$data['eventName']."# has been cancelled", PDO::PARAM_STR);
                $resp->bindValue(":viewed", NULL , PDO::PARAM_STR);
                $resp->bindValue(":href", "#", PDO::PARAM_STR);
                $result = $resp->execute();
                $resp->closeCursor();
            }else{
                break;
            }
            
            $count++;
        }
        $response->closeCursor();


    }
}