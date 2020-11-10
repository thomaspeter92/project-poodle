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
        
        public function addEditPet($params) {
            $newPet = $params;
            $db = $this-> dbConnect();
            $req = $db->prepare("INSERT INTO petProfile (name, type, breed, age, gender, weight, color, friendliness, activityLevel, ownerId) VALUES (?,?,?,?,?,?,?,?,?,?)");
                $req->bindParam(1,$newPet['name'],PDO::PARAM_STR);
                $req->bindParam(1,$newPet['name'],PDO::PARAM_STR);
                $req->bindParam(2,$newPet['type'],PDO::PARAM_STR);
                $req->bindParam(3,$newPet['breed'],PDO::PARAM_STR);
                $req->bindParam(4,$newPet['age'],PDO::PARAM_INT);
                $req->bindParam(5,$newPet['gender'],PDO::PARAM_STR);
                $req->bindParam(6,$newPet['weight'],PDO::PARAM_INT);
                $req->bindParam(7,$newPet['color'],PDO::PARAM_STR);
                $req->bindParam(8,$newPet['friendliness'],PDO::PARAM_STR);
                $req->bindParam(9,$newPet['activityLevel'],PDO::PARAM_STR);
                $req->bindParam(10,$newPet['ownerId']);

            $req->execute();
            $req->closeCursor();
        }
    }