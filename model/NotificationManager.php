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

    public function setEventCancelNotification($eventId){
        $db = $this->dbConnect();
        date_default_timezone_set('Asia/Seoul'); // Add timezone to Seoul
        
        // Get all users to be affected by the event cancel notification
        $response = $db->prepare("SELECT a.guestId AS guestId, e.name AS eventName, e.eventDate AS eventDate FROM eventattend a JOIN event e ON a.eventId =  e.id WHERE a.eventId = :eventId");
        $response->bindValue(":eventId", $eventId, PDO::PARAM_INT);
        $users = $response->execute();
       
        $count = 0;

        while($data = $response->fetch(PDO::FETCH_ASSOC)){ 
            $eventDateTime = new DateTime ($data['eventDate']);
            $now  = new DateTime(date("Y-m-d h:i:s"));
            $nowTimestamp = $now->getTimestamp();
            $eventTimestamp = $eventDateTime->getTimestamp();
            $res =  $eventTimestamp - $nowTimestamp;
            if($res > 0){
                $query = "INSERT INTO notification(userID, message, viewed, notificationDate, href, eventDate) 
                VALUES(:userID, :message , :viewed, NOW(), :href, :eventDate)";
                $resp = $db->prepare($query);
                $resp->bindValue(":userID", $data['guestId'], PDO::PARAM_INT);
                $resp->bindValue(":message","#".$data['eventName']."| has been cancelled", PDO::PARAM_STR);
                $resp->bindValue(":viewed", NULL , PDO::PARAM_STR);
                $resp->bindValue(":href", NULL, PDO::PARAM_STR);
                $resp->bindValue(":eventDate", NULL, PDO::PARAM_STR);
                $result = $resp->execute();
                $resp->closeCursor();
            }else{
                break;
            }
            
            $count++;
        }
        $response->closeCursor();
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

    public function setEventTimerNotification($eventId, $userId=''){
        $db = $this->dbConnect();
        date_default_timezone_set('Asia/Seoul'); // Add timezone to Seoul

        // Get all users to be affected by the event cancel notification
        $response = $db->prepare("SELECT  name, eventDate FROM event WHERE id = :eventId");
        $response->bindValue(":eventId", htmlspecialchars($eventId), PDO::PARAM_INT);
        $response->execute();
       
        $data = $response->fetch(PDO::FETCH_ASSOC);
        if($data){

            $query = "INSERT INTO notification(userID, message, viewed, notificationDate, href, eventDate) 
            VALUES(:userID, :message , :viewed, NOW(), :href, :eventDate)";
            $resp = $db->prepare($query);
            $resp->bindValue(":userID", $userId, PDO::PARAM_INT);
            $resp->bindValue(":message","#".$data['name']."| starts in * ", PDO::PARAM_STR);
            $resp->bindValue(":viewed", NULL , PDO::PARAM_STR);
            $resp->bindValue(":href", "index.php?action=showEventDetail&eventId=$eventId", PDO::PARAM_STR);

            $eventDate = $data['eventDate'];
            $resp->bindValue(":eventDate", $eventDate , PDO::PARAM_STR);
            $result = $resp->execute();
            $resp->closeCursor();
        }
        $response->closeCursor();
    }



}