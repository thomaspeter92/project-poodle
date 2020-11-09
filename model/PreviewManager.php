<?php
require_once("Manager.php");
    class PreviewManager extends Manager{

        public function getPreview($ownerId){
            
            //Retrieving pet's profile from the database
            $db = $this-> dbConnect();
            $req = $db->prepare("SELECT name, breed, age, photo, color, id FROM petProfile WHERE ownerId = ?");
            //bindparam
            $req -> execute(array($ownerId));
            $profile = $req -> fetchAll(PDO::FETCH_ASSOC);
            $req -> closeCursor();
            // print_r($profile);
            return $profile; 
        }

        
    }