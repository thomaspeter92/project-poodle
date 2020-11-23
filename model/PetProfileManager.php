<?php
require_once("Manager.php");
    class PetProfileManager extends Manager{

        public function getPetProfile($petId){
            
            //Retrieving pet's profile from the database
            $db = $this-> dbConnect();
            $req = $db->prepare("SELECT name, type, breed, age, gender, weight, color, friendliness, activityLevel, photo, description, ownerId FROM petProfile WHERE id = ?");
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
        
        public function addEditPet($newPet, $photoData) {

            $db = $this-> dbConnect();
            
            if (empty($newPet['petId'])) {
                $req = $db->prepare("INSERT INTO petProfile (name, type, breed, age, gender, weight, color, friendliness, activityLevel, ownerId, photo, description) VALUES (:name, :type, :breed, :age, :gender, :weight, :color, :friendliness, :activityLevel, :ownerId, :photo, :description)");
            } else {
                $req = $db->prepare("UPDATE petProfile SET name = :name,  type = :type, breed = :breed, age = :age, gender = :gender, weight = :weight, color= :color, friendliness= :friendliness, activityLevel= :activityLevel, ownerId= :ownerId, photo = :photo, description = :description WHERE id = :petId");
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
            $petPhoto = !empty($photoData['photo']) ? htmlspecialchars($photoData['photo']) : $newPet['photo'];
            $description = htmlspecialchars($newPet['description']);

            $req->bindParam(':name',$name,PDO::PARAM_STR);
            $req->bindParam(':type',$type,PDO::PARAM_STR);
            $req->bindParam(':breed',$breed,PDO::PARAM_STR);
            $req->bindParam(':age',$age,PDO::PARAM_INT);
            $req->bindParam(':gender',$gender,PDO::PARAM_STR);
            $req->bindParam(':weight',$weight,PDO::PARAM_INT);
            $req->bindParam(':color',$color,PDO::PARAM_STR);
            $req->bindParam(':friendliness',$friendliness,PDO::PARAM_INT);
            $req->bindParam(':activityLevel',$activityLevel,PDO::PARAM_INT);
            $req->bindParam(':ownerId',$newPet['ownerId'],PDO::PARAM_INT);
            $req->bindParam(':photo',$petPhoto,PDO::PARAM_STR);
            $req->bindParam(':description',$description,PDO::PARAM_STR);

            try {
                $success = $req->execute();
            } catch (Exception $e) {
                $req->closeCursor();
                return 0;
            }
            $req->closeCursor();
            
            return $success;
            
        }

        // public function updateImage($petId, $fileName) {
        //     $db = $this->dbConnect();
        //     $req = $db->prepare("UPDATE petProfile SET photo = :photo WHERE id = :petId");
        //     $req->bindParam(':photo', $fileName, PDO::PARAM_STR);
        //     $req->bindParam(':petId', $petId, PDO::PARAM_INT);

        //     $success = $req->execute();
        //     $req->closeCursor();

        //     echo !empty($success) ? 'success' : 'errorBITCH';

        // }

        public function deletePet($petId) {

            $db = $this->dbConnect();

            $req = $db->prepare("DELETE FROM petProfile WHERE id = :petId");
            $req->bindParam(':petId',$petId,PDO::PARAM_INT);

            $success = $req->execute();
            $req->closeCursor();

            return $success;
        }
    }