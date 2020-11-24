<?php
function checkChangePW($passwordInput, $userID){
    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByID($userID);
    $hashedPassword = $memberDataFromDB['password'];
    
    if (password_verify($passwordInput["newPW"], $hashedPassword)) {
        $result = "needDiffPW";
    } else if (password_verify($passwordInput["currentPW"], $hashedPassword)) {
        $result = $manager->changePW($passwordInput["newPW"], $userID);
        if ($result) {
            $result = "success";
        } else {
            $result = "failedPW";
        }        
    } else {
        $result = "failedPW";
    }
    return $result;
}

function checkChangeAccount($inputs, $image, $userID){
    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByID($userID);

    if ($inputs['nameInput'] !== $memberDataFromDB['name']) {
        $result = $manager->changeAccountName($inputs['nameInput'], $userID);
        if ($result) {
            $_SESSION['name'] = $inputs['nameInput'];
            $result = "success";
        }   else {
            $result = "failed";
        }
    };

    if ($inputs['emailInput'] !== $memberDataFromDB['email']) {
        $result = $manager->changeAccountEmail($inputs['emailInput'], $userID);
        // TO DO: NEED TO CHECK EMAIL FORMAT
        if ($result) {
            $result = "success";
        }   else {
            $result = "failed";
        }
    };

    if(empty($image)) {
        $result = "success";
    } else {
        $profileImageName = $image['file']['name'];
        $profileImageNameNoSpace = str_replace(' ', '', $profileImageName);
        $profileImageNameUnique = time().'_'.$profileImageNameNoSpace;
        $target = './private/profile/'.$profileImageNameUnique;

        if (move_uploaded_file($image['file']['tmp_name'], $target)) {
            $result = $manager->changeProfilePic($profileImageNameUnique, $userID);
            if ($result) {
                $_SESSION['imageURL'] = './private/profile/'.$profileImageNameUnique;
                $result="success";
            } else {
                $result="failed";
            }
        } else {
            $result = "failed";
        };

    };

    return $result;
};


function removeProPic($userID){
    $manager = new MemberManager();
    $result = $manager->removeProfilePic($userID);
    if ($result) {
        $result = "success";
        $_SESSION['imageURL'] = "./private/profile/defaultProfile.png";
    }   else {
        $result = "failed";
    }
    return $result;
}

function deleteAccountCheck($userID){
    $manager = new MemberManager();
    $result = $manager->deleteAccount($userID);
    if ($result) {
        $result = "success";
        session_destroy();
    }   else {
        $result = "failed";
    }
    return $result;
}


?>