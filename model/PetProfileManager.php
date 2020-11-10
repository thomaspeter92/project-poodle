<?php
require_once("Manager.php");
    class PetProfileManager extends Manager{

        public function getPetProfile($petId){
            
            //Retrieving pet's profile from the database
            $db = $this-> dbConnect();
            $req = $db->prepare("SELECT name, type, breed, age, gender, weight, color, friendliness, activityLevel, photo FROM petProfile WHERE id = ?");
            //bindparam
            $req -> execute(array($petId));
            $profile = $req -> fetch(PDO::FETCH_ASSOC);
            $req -> closeCursor();
            // print_r($profile);
            return $profile; 
        }

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