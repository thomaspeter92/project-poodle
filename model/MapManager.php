<?php
require_once("Manager.php");
    class MapManager extends Manager{

        public function getMap($eventId){
            
            
            $db = $this-> dbConnect();
            $req = $db->prepare("FROM petProfile WHERE id = ?");
            //bindparam
            $req -> execute(array($eventId));
            $event = $req -> fetch(PDO::FETCH_ASSOC);
            $req -> closeCursor();
            // print_r($profiles);
            // if($_SESSION["id"]==$profiles["ownerId"]){
            //     return $profiles;
            // } else{
            //     return false;
            // }
             
        }
    }