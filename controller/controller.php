<?php
// This is for Controller functions.
require_once("./model/PetProfileManager.php");

function landing()
{
    require("./view/landing.php");
}

function showPetProfile($petId){
    echo $petId;
    $petProfileManager = new PetProfileManager();
    $petProfile = $petProfileManager->getPetProfile($petId);
    require("./view/petProfileView.php");
}