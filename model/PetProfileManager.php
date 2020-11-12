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
        
        public function addEditPet($newPet) {

            $db = $this-> dbConnect();
            
            if (empty($newPet['petId'])) {
                $req = $db->prepare("INSERT INTO petProfile (name, type, breed, age, gender, weight, color, friendliness, activityLevel, ownerId) VALUES (:name, :type, :breed, :age, :gender, :weight, :color, :friendliness, :activityLevel, :ownerId)");
            } else {
                $req = $db->prepare("UPDATE petProfile SET name = :name,  type = :type, breed = :breed, age = :age, gender = :gender, weight = :weight, color= :color, friendliness= :friendliness, activityLevel= :activityLevel, ownerId= :ownerId WHERE id = :petId");
                $req->bindParam(':petId', $newPet['petId'], PDO::PARAM_STR);
            }

            $name = htmlspecialchars($newPet['name']);
            $type = htmlspecialchars($newPet['type']);
            $breed = htmlspecialchars($newPet['breed']);
            $age = htmlspecialchars($newPet['age']);
            $gender = htmlspecialchars($newPet['gender']);
            $weight = htmlspecialchars($newPet['weight']);
            $color = htmlspecialchars($newPet['color']);
            $friendliness = htmlspecialchars($newPet['friendliness']);
            $activityLevel = htmlspecialchars($newPet['activityLevel']);

            $req->bindParam(':name',$name,PDO::PARAM_STR);
            $req->bindParam(':type',$type,PDO::PARAM_STR);
            $req->bindParam(':breed',$breed,PDO::PARAM_STR);
            $req->bindParam(':age',$age,PDO::PARAM_INT);
            $req->bindParam(':gender',$gender,PDO::PARAM_STR);
            $req->bindParam(':weight',$weight,PDO::PARAM_INT);
            $req->bindParam(':color',$color,PDO::PARAM_STR);
            $req->bindParam(':friendliness',$friendliness,PDO::PARAM_STR);
            $req->bindParam(':activityLevel',$activityLevel,PDO::PARAM_STR);
            $req->bindParam(':ownerId',$newPet['ownerId'],PDO::PARAM_INT);

            $req->execute();
            $req->closeCursor();
        }
    }