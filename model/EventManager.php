<?php
require_once("Manager.php");

    class EventManager extends Manager {

        public function getEventDetail($eventId) {

            $db = $this->dbconnect();
            $req = $db->prepare("SELECT e.id eventId, e.name name, e.eventDate eventDate, e.location location, e.description description, e.picture picture, e.hostId hostId, m.name hostName FROM event e INNER JOIN member m ON e.hostId = m.id  WHERE e.id = :id");
            $req->bindParam(':id',$eventId,PDO::PARAM_INT);
            $req->execute();

            $event =$req->fetch(PDO::FETCH_ASSOC);

            $req->closeCursor();

            return $event;

        }

        public function loadGuests($eventId) {

            $db = $this->dbConnect();
            // $req = $db->prepare("SELECT COUNT(*) FROM eventAttend WHERE eventId = :eventId");

            $req = $db->prepare("SELECT g.guestId guestId, m.name guestName FROM eventAttend g INNER JOIN member m ON g.guestId = m.id WHERE g.eventId = :eventId");
            $req->bindParam(':eventId',$eventId, PDO::PARAM_INT);
            $req->execute();


            $guestList = $req->fetchAll(PDO::FETCH_ASSOC);

            $req->closeCursor();

            return $guestList;
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

            $req->bindParam(':commentId', $commentId, PDO::PARAM_INT);
            $req->execute();

            $comment = $req->fetch(PDO::FETCH_ASSOC);

            $req->closeCursor();

            return $comment;
        }

        public function attendEventSend($params) {

            $db = $this->dbConnect();

            $eventId = $params['eventId'];
            $guestId = $params['guestId'];

            if ($params['action'] == 'attendEvent') {
                $req = $db->prepare("INSERT INTO eventAttend (eventId, guestId) VALUES (:eventId, :guestId)");
                $req->bindParam(':eventId',$eventId,PDO::PARAM_INT);
            } else if ($params['action'] == 'unattendEvent') {
                $req = $db->prepare("DELETE FROM eventAttend WHERE guestId = :guestId");
            }

            $req->bindParam(':guestId',$guestId,PDO::PARAM_INT);

            $req->execute();
            $req->closeCursor();
        }

        // public function editComment($params) {

        //     $db = $this->dbConnect();
        //     $req = $db->prepare("UPDATE eventComment SET comment = :comment WHERE id = :commentId");

        //     $comment = htmlspecialchars($params['editCommentInput']);
        //     $commentId = $params['commentId'];

        //     $req->bindParam(':comment',$comment,PDO::PARAM_STR);
        //     $req->bindParam(':eventId',$commentId,PDO::PARAM_INT);
            
        //     $req->execute();
        //     $req->closeCursor();
        // }



    }