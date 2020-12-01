<?php 
require_once("Manager.php");

class StarManager extends Manager{
    public function addStars($starValue, $eventId){
        $db = $this->dbConnect();
        $query = "UPDATE eventRating 
                  SET eventId = :eventId, rating = :rating  
                  WHERE  eventId = :eventId";
        $response = $db->prepare($query);
        $response->bindValue(":eventId", $eventId, PDO::PARAM_INT);
        $response->bindValue(":rating", $starValue, PDO::PARAM_INT);
        $response->execute();
        $response->closeCursor();




    }







}