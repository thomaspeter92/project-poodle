<?php
require_once("Manager.php");

    class EventManager extends Manager {

        public function getUpcomingEvents() {
            //WED, NOV 18, 7:00 PM
            $db = $this->dbconnect();
            $query = "SELECT e.id, e.name, e.location, m.name AS hostName, 
                        DATE_FORMAT(e.eventDate, '%a, %b %d, %h:%i %p') AS eventDate
                        FROM event AS e
                        JOIN member AS m
                        ON e.hostId = m.id
                        WHERE e.eventDate > NOW();";
            $req = $db->prepare($query);
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

    }