<?php
function checkChangePW($passwordInput, $userID){
    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByID($userID);
    $hashedPassword = $memberDataFromDB['password'];
    
    if (password_verify($passwordInput["currentPW"], $hashedPassword)) {
        $result = $manager->changePW($passwordInput["newPW"], $userID);
        if ($result) {
            $result = "Success!!!!";
        } else {
            $result = "Failed from DB!!!!";
        }
    } else {
        $result = "Password change has failed!";
    }
    return $result;
}
?>