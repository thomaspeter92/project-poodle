<?php
require_once("Manager.php");
    class PetProfileManager extends Manager{

        public function getPetProfile($petId){
            
            //Retrieving pet's profile from the database
            $db = $this-> dbConnect();
            $req = $db->prepare("SELECT name, type, breed, age, gender, weight, color, friendliness, activityLevel, photo, ownerId FROM petProfile WHERE id = ?");
            //bindparam
            $req -> execute(array($petId));
            $profiles = $req -> fetch(PDO::FETCH_ASSOC);
            $req -> closeCursor();
            // print_r($profiles);
            if($_SESSION["id"]==$profiles["ownerId"]){
                return $profiles;
            } else{
                return false;
            }
             
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

        // public function isThatMyDog($ownerId, $petId){
        //     $db = $this-> dbConnect();
        //     $req = $db->prepare("SELECT name, breed, age, photo, color, id FROM petProfile WHERE ownerId = ?");
        //     $req -> execute(array($ownerId));
        //     $profiles = $req->fetchAll(PDO::FETCH_ASSOC);
        //     $req -> closeCursor();
        //     return in_array($petId, $profiles);
            
        // }
        
    }