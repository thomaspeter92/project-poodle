<?php


// This is for Controller functions.


require_once('./model/MemberManager.php');

function landing()
{
    require("./view/landing.php");
}

function login()
{
    require('./view/loginView.php');
}


function checkLogin($params)
{
    $loginManager = new MemberManager();
    $status = $loginManager->checkLogin($params);
    if ($status) {
        header("Location: index.php");
    } else {
        // header("Location: index.php?action=login&error=login");

    }
}

function registration()
{
    require('./view/registrationView.php');
}

function logout()
{

    session_unset();
    session_destroy();
    header("Location: index.php");
}

function createSession($id, $name, $imageURL) {
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['imageURL'] = $imageURL;
}

function signUpWith($memberData)
{
    if (empty($memberData["email"])) {
        throw new Exception("Sign up is failed!", 1000);
    }
    $email = $memberData["email"];

    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByEmail($email);
    if ($memberDataFromDB) {
        signInWith($memberData);
        
        //TODO: Show the user is already signed up with kakao
        
    } else {
        if (empty($memberData["name"]) 
         or empty($memberData["password"]) 
         or empty($memberData["email"])
         or !array_key_exists("kakao", $memberData)
         or !array_key_exists("google", $memberData)) {
            throw new Exception("Sign up is failed!", 1002);
        }

        $result = $manager->addNewMember($memberData);
        if ($result) {
            signInWith($memberData);
        } else {
            throw new Exception("Failed to add new member!!", 1004);
        }
    }
}


function googleSignIn(){
    $manager = new MemberManager();
    $comments = array();
    $email = isset($_REQUEST['googleEmail']) ? $_REQUEST['googleEmail'] : NULL;
    $name = isset($_REQUEST['googleName']) ? $_REQUEST['googleName'] : NULL;
    // $picture = isset($_REQUEST['googlePicture']) ? $_REQUEST['googlePicture'] : NULL;
    $userId = isset($_REQUEST['googleUserId']) ? $_REQUEST['googleUserId'] : NULL;
    $comments[0] = 'Inside GoogleIn';
   
    $memberData = $manager->getMemberDataByEmail($email);
    if($memberData){
        //Create Session if user is a google member

        if($memberData['google'] ==1){
            createSession($memberData['id'], $memberData['name'], "google");
            header("Location: index.php");
           
        }elseif($memberData['google'] ==0){
            throw new Exception("Member was not registered through Google SignIn. Please use other method to sign in");
        
        }

    }
}


function googleSignUp(){
    $manager = new MemberManager();
    $comments = array();
    $email = isset($_REQUEST['googleEmail']) ? $_REQUEST['googleEmail'] : NULL;
    $name = isset($_REQUEST['googleName']) ? $_REQUEST['googleName'] : NULL;
    // $picture = isset($_REQUEST['googlePicture']) ? $_REQUEST['googlePicture'] : NULL;
    $userId = isset($_REQUEST['googleUserId']) ? $_REQUEST['googleUserId'] : NULL;

      //Register user as a member in database
      $params['email'] = $email;
      $params['name'] = $name;
      $params['userId'] = $userId;

      $result = $manager->addNewMemberByGoogle($params);
      if ($result){
          if ($manager->createSessionByEmail($email)){
              header("Location: index.php");
            //   $comments[1]= 'New member created';
          }else{
              throw new Exception("Failed to create Session!!, 1001");
          }
      } else{
          throw new Exception("Failed to add new member!!, 1001");
      }
}





function signInWith($memberData) {
    if (empty($memberData["email"])) {
        throw new Exception("Sign in is failed!", 1005);
    }
    $email = $memberData["email"];

    $manager = new MemberManager();
    $memberDataFromDB = $manager->getMemberDataByEmail($email);
    
    if ($memberDataFromDB) {
        if (empty($memberDataFromDB["id"]) or empty($memberDataFromDB["name"])) {
            throw new Exception("Sign in is failed!", 1006);
        }
        $sessionID = $memberDataFromDB["id"];
        $sessionName = isset($memberData["name"]) ? 
                        $memberData["name"] : $memberDataFromDB["name"];
        if (isset($memberData["imageURL"])) {
            $sessionImageURL = $memberData["imageURL"];
        } else {
            //TODO: Set Profile image URL by our server's image
        }

        createSession($sessionID, $sessionName, $sessionImageURL);
        header("Location: index.php");
    } else {
        //TODO: It is not valid email. You haven't signed up yet. 
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "TODO: It is not valid email. You haven't signed up yet. ";
        // throw new Exception("Failed to sign in!!", 1007);

        // header("Location: index.php?action=login&error=notSignedUp");
    }
}

