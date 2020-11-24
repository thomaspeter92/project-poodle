<?php
require_once("Manager.php");

    class EventManager extends Manager {

        /**
         * Date: WED, NOV 18, 7:00 PM
         */
        public function getUpcomingEvents($text=NULL, $option=NULL) {
            //TODO: eventDate should be changed to expiryDate


            $db = $this->dbconnect();
            $query = "SELECT e.id, e.name, e.location, m.name AS hostName, 
                        DATE_FORMAT(e.eventDate, '%a, %b %d, %h:%i %p') AS eventDate
                        FROM event AS e
                        JOIN member AS m
                        ON e.hostId = m.id";
            $nextMondayDate = "DATE(DATE_ADD(NOW(), INTERVAL (7-WEEKDAY(NOW())) DAY))";
            $thisSaturdatDate = "DATE(DATE_ADD(NOW(), INTERVAL (5-WEEKDAY(NOW())) DAY))";
            $nextNextMondayDate = "DATE(DATE_ADD(NOW(), INTERVAL (14-WEEKDAY(NOW())) DAY))";
            
            switch ($option) {
                case "anyDay":
                    $query .= " WHERE e.eventDate > NOW()";  
                    break;
                case "today":
                    $query .= " WHERE DATE(e.eventDate) = DATE(NOW()) 
                                AND e.eventDate > NOW()";  
                    break;
                case "tomorrow":
                    $query .= " WHERE DATE(e.eventDate) = DATE(DATE_ADD(NOW(), INTERVAL 1 DAY))";  
                    break;
                case "thisWeek": //Current Day ~ Sun
                    $query .= " WHERE (e.eventDate BETWEEN DATE(NOW()) AND ".$nextMondayDate.")".
                                " AND e.eventDate > NOW()";  
                    break;
                case "thisWeekend": //Sat, Sun
                    $query .= " WHERE (e.eventDate BETWEEN ".$thisSaturdatDate." AND ".$nextMondayDate.")".
                                " AND e.eventDate > NOW()";  
                    break;
                case "nextWeek": //Next Mon ~ Sun
                    $query .= " WHERE (e.eventDate BETWEEN ".$nextMondayDate." AND ".$nextNextMondayDate.")".
                                " AND e.eventDate > NOW()";  
                    break; 
                default:
                    $query .= " WHERE e.eventDate > NOW()";  
                    break;
            }
            $query .= isset($text) ? " AND e.name LIKE :text" : "";
            //echo $query;
            $req = $db->prepare($query);
            if (isset($text)) {
                $req->bindValue(":text", "%".$text."%", PDO::PARAM_STR);
            }
            $req->execute();
            $events = $req->fetchAll(PDO::FETCH_OBJ);
            $req->closeCursor();
            return $events;
        }

        public function getMembersCountBy($eventId) {
            $db = $this->dbconnect();
            $query = "SELECT COUNT(*) AS guestCount
                        FROM eventAttend
                        WHERE eventId = :eventId";
            $req = $db->prepare($query);
            $req->bindValue(":eventId", $eventId, PDO::PARAM_INT);
            $req->execute();
            $count = $req->fetch(PDO::FETCH_OBJ);
            $req->closeCursor();
            return $count->guestCount;
        }

        public function getMembersBy($eventId) {
            //TODO: Get members profile images by eventId, first should be the host
            $db = $this->dbconnect();
            $query = "";
            $req = $db->prepare($query);
            $req->bindValue(":eventId", $eventId, PDO::PARAM_INT);
            $req->execute();
            $events = $req->fetchAll(PDO::FETCH_OBJ);
            $req->closeCursor();
            return $events;
        }
        
        public function getEventDetail($eventId) {

            $db = $this->dbconnect();
            $req = $db->prepare("SELECT e.id eventId, e.name name, e.eventDate eventDate, e.location location, e.description description, e.imageName imageName, e.hostId hostId, m.name hostName FROM event e INNER JOIN member m ON e.hostId = m.id  WHERE e.id = :id");
            $req->bindParam(':id',$eventId,PDO::PARAM_INT);
            $req->execute();

            $event =$req->fetch(PDO::FETCH_ASSOC);

            $req -> closeCursor();

            return $event;

        }

        public function commentPost($params) {

            if (!empty($params['author']) && !empty($params['eventId']) && !empty($params['comment'])) {

                $db = $this->dbConnect();
                $req = $db->prepare("INSERT INTO eventComment (userId, eventId, comment) VALUES (:userId, :eventId, :comment)");

                $userId = htmlspecialchars($params['author']);
                $eventId = htmlspecialchars($params['eventId']);
                $comment = htmlspecialchars($params['comment']);

                $req->bindParam(':userId',$userId,PDO::PARAM_INT);
                $req->bindParam(':eventId',$eventId,PDO::PARAM_INT);
                $req->bindParam(':comment',$comment,PDO::PARAM_STR);

                $req->execute();
                $req->closeCursor();
            } else {
                return "Error posting message, please check and try again.";
            }
        }

        public function loadComments($eventId) {

            $db = $this->dbConnect();

            $req = $db->prepare("SELECT c.id commentId, c.dateCreation dateCreation, c.comment comment, c.userId userId, m.name author FROM eventComment c INNER JOIN member m ON c.userId = m.id WHERE c.eventId = :eventId ORDER BY c.id DESC LIMIT 0,5");

            $req->bindParam(':eventId', $eventId, PDO::PARAM_INT);
            $req->execute();

            $comments = $req->fetchAll(PDO::FETCH_ASSOC);

            $req->closeCursor();

            return $comments;

        }

        public function commentDelete($commentId) {
            $db = $this->dbConnect();

            $req = $db->prepare("DELETE FROM eventComment WHERE id = :commentId");
            $req->bindParam(':commentId',$commentId,PDO::PARAM_INT);

            $req->execute();
            $req->closeCursor();
        }

        public function loadSingleComment($commentId) {

            $db = $this->dbConnect();

            $req = $db->prepare("SELECT comment FROM eventComment WHERE id = :commentId");

            $req->bindParam(':commentId', $$commentId, PDO::PARAM_INT);
            $req->execute();

            $comment = $req->fetch(PDO::FETCH_ASSOC);

            $req->closeCursor();

            return $comment;

        }

        public function getEventEditDetails($eventId){
            
            //Retrieving pet's profile from the database
            $db = $this-> dbConnect();
            $req = $db->prepare("SELECT name, eventDate, location, itenary, description, hostId, imageName, expiryDate, guestLimit FROM event WHERE id = ?");
            //bindparam
            $req -> execute(array($eventId));
            $eventDetails = $req -> fetch(PDO::FETCH_ASSOC);
            $req -> closeCursor();
            // print_r($profiles);
            if($_SESSION["id"]===$eventDetails["hostId"]){
                return $eventDetails;
            } else{
                return false;
            }
             
        }
        public function updateEventDetails($newEvent){
            $db = $this->dbConnect();
          
            if(empty($newEvent['eventId'])){
                $req = $db->prepare("INSERT INTO event (name, eventDate, location, itenary, description, hostId, expiryDate, rating, guestLimit, imageName, dateCreated) VALUES (:name, :eventDateTime, :location, :itenary, :description, :hostId, :expiryDateTime, :rating, :guestLimit, :imageName, NOW())");
                $update=false;
            }else {
                $req = $db->prepare("UPDATE event SET name = :name, eventDate = :eventDateTime, location = :location, itenary = :itenary, description = :description, hostId = :hostId,  expiryDate = :expiryDateTime, rating = :rating, guestLimit = :guestLimit, imageName = :imageName WHERE id = :eventId ");
                
                $req->bindValue(':eventId', htmlspecialchars($newEvent['eventId']), PDO::PARAM_INT);
                $update=true;

            }
            $name = htmlspecialchars($newEvent['eventName']);//
            $location ="Seoul Korea";
            $description = htmlspecialchars($newEvent['eventDescription']);//
            $hostId = htmlspecialchars($newEvent['hostId']);//
            $imageName = "1";
            $rating = 3;
            $guestLimit = htmlspecialchars($newEvent['eventGuestLimit']);//
            $itenary = $newEvent['itenary'];//
            // $dateCreated = htmlspecialchars($newEvent['dateCreated']); //Only created when the event is created

            // Combine the date and time into datetime object
            $eventDate = new DateTime(strip_tags($newEvent['eventDate']));//
            $eventTime = new DateTime(strip_tags($newEvent['eventTime']));//
            $expiryDate = new DateTime(strip_tags($newEvent['eventExpiryDate']));//
            $expiryTime = new DateTime(strip_tags($newEvent['eventExpiryTime']));//
            $eventDateTime = new DateTime($eventDate->format('Y-m-d').' '.$eventTime->format('H:i:s'));
            $expiryDateTime = new DateTime($expiryDate->format('Y-m-d').' '.$expiryTime->format('H:i:s'));

            $req->bindParam(':name',$name,PDO::PARAM_STR);
            $req->bindValue(':eventDateTime',$eventDateTime->format('Y-m-d H:i:s'),PDO::PARAM_STR);
            $req->bindValue(':expiryDateTime',$expiryDateTime->format('Y-m-d H:i:s'),PDO::PARAM_STR);
            $req->bindParam(':location',$location,PDO::PARAM_STR);
            $req->bindParam(':description',$description,PDO::PARAM_STR);
            $req->bindParam(':hostId',$hostId,PDO::PARAM_INT);
            $req->bindParam(':imageName',$imageName,PDO::PARAM_STR);
            $req->bindParam(':rating',$rating,PDO::PARAM_INT);
            $req->bindParam(':guestLimit',$guestLimit,PDO::PARAM_INT);
            $req->bindParam(':itenary',$itenary,PDO::PARAM_STR);

            $result = $req->execute();
            $req->closeCursor();  
            if($result) {
                $resp = $update ? htmlspecialchars($newEvent['eventId']) : $db->lastInsertId();
                return $resp;
            }else{
                return NULL;}

        }

        public function deleteEvent($eventId) {
            $db = $this->dbConnect();

            $req = $db->prepare("DELETE FROM event WHERE id = :eventId");
            $req->bindParam(':eventId',$eventId,PDO::PARAM_INT);

            $req->execute();
            $req->closeCursor();
        }

    }