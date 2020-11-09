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

function addNewMember($params)
{
    $registrationManager = new MemberManager();
    $register = $registrationManager->addNewMember($params);

    if($register){
        $email = $params['email'];
        if ($registrationManager->createSessionByEmail($email)) {
            header("Location: index.php");
        } else {
            throw new Exception("Failed to create Session!!", 1001);    
        }
    }else{ 
        //header("Location: index.php?action=registration&error=registration"); //@TODO not going here on error
    }
}

function logout()
{
    session_destroy();
    header("Location: index.php");
}

function kakaoSignUp($name, $email)
{
    $manager = new MemberManager();
    $memeberData = $manager->getMemberDataByEmail($email);
    
    if ($memeberData) {
        //TODO: Show the user is already signed up with kakao


        createSession($memeberData["id"], $memeberData["name"]);
        header("Location: index.php");
    } else {
        $result = $manager->addNewMemberByKakao($name, $email);
        if ($result) {
            if ($manager->createSessionByEmail($email)) {
                require("./view/kakaologinResult.php");
            } else {
                throw new Exception("Failed to create Session!!", 1001);    
            }
        } else {
            throw new Exception("Failed to add new member!!", 1001);
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
            createSession($memberData['id'], $memberData['name']);
            // header("Location: index.php");
           
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
              // header("Location: index.php");
            //   $comments[1]= 'New member created';
          }else{
              throw new Exception("Failed to create Session!!, 1001");
          }
      } else{
          throw new Exception("Failed to add new member!!, 1001");
      }
}

function createSession($id, $name) {
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
}



