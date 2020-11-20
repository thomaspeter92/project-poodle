<?php
require_once("Manager.php");

    class EventManager extends Manager {

        /**
         * Date: WED, NOV 18, 7:00 PM
         */
        public function getUpcomingEvents($text=NULL, $option=NULL) {
            //TODO: eventDate should be changed to expiryDate


            $db = $this->dbconnect();
            $query = "SELECT e.id, e.name, e.location, e.imageName, m.name AS hostName, 
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

        public function getMemberProfileImagesBy($eventId, $limit) {
            //TODO: Get members profile images by eventId, first should be the host
            $db = $this->dbconnect();
            $query = "SELECT m.profileImage FROM member AS m
                        JOIN eventAttend AS ea
                        ON m.id = ea.guestId
                        WHERE ea.eventId = :eventId";
            if ($limit) {
                $query .= " LIMIT 0, :limit";
            }
            $req = $db->prepare($query);
            $req->bindValue(":eventId", $eventId, PDO::PARAM_INT);
            if ($limit) {
                $req->bindValue(":limit", $limit, PDO::PARAM_INT);
            }
            $req->execute();
            $events = $req->fetchAll(PDO::FETCH_OBJ);
            $req->closeCursor();
            return $events;
        }
        
        public function getEventDetail($eventId) {

            $db = $this->dbconnect();
            $req = $db->prepare("SELECT e.id eventId, e.name name, e.eventDate eventDate, e.location location, e.description description, e.picture picture, e.hostId hostId, m.name hostName FROM event e INNER JOIN member m ON e.hostId = m.id  WHERE e.id = :id");
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

        public function addEditEvent($newEvent){
            $db = $this->dbConnect();

            if(empty($newEvent['eventId'])){
                $req = $db->prepare("INSERT INTO event (name, eventDate, location, description, hostId, picture, expiryDate, rating, guestLimit, dateCreated) VALUES (:name, :eventDate, :location, :description, :hostId,  :picture, :expiryDate, :rating, :guestLimit, :dateCreated)");

            }else {
                $req = $db->prepare("UPDATE event SET name = :name, eventDate = :eventDate, location = :location, description = :description, hostId = :hostId, picture = :picture, expiryDate = :expiryDate, rating = :rating, guestLimit = :guestLimit, dateCreated = :dateCreated WHERE id = :eventId");
                $req->bindParam(':eventId', $newEvent['eventId'], PDO::PARAM_INT);
            }
            $name = htmlspecialchars($newEvent['name']);
            $eventDate = htmlspecialchars($newEvent['eventDate']);
            $eventTime = htmlspecialchars($newEvent['eventTime']);
            $location = htmlspecialchars($newEvent['location']);
            $description = htmlspecialchars($newEvent['description']);
            $hostId = htmlspecialchars($newEvent['hostId']);
            $picture = htmlspecialchars($newEvent['picture']);
            $expiryDate = htmlspecialchars($newEvent['expiryDate']);
            $expiryTime = htmlspecialchars($newEvent['expiryTime']);
            $rating = htmlspecialchars($newEvent['rating']);
            $guestLimit = htmlspecialchars($newEvent['guestLimit']);
            $dateCreated = htmlspecialchars($newEvent['dateCreated']); //Only created when the event is created

            $req->bindParam(':name',$name,PDO::PARAM_STR);
            $req->bindParam(':eventDate',$eventDate,PDO::PARAM_STR);
           
            // $req->execute();
            $req->closeCursor();  
        }

    }