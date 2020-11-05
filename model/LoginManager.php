<?php 
require_once("Manager.php");
class LoginManager extends Manager{
    public function checkLogin($params){
        $db = $this->dbConnect();
        if(isset($params['usernameLogin']) && isset($params['passwordLogin'])){
            $usernameLogin = addslashes(htmlspecialchars((htmlentities(trim($params['usernameLogin']))))); //login input recorded
            $passwordLogin = addslashes(htmlspecialchars((htmlentities(trim($params['passwordLogin']))))); //password input recorded
            setcookie('username',$usernameLogin,time()+365*24*3600,null,null,false,true); //set cookie for login
            setcookie('password',$passwordLogin,time()+365*24*3600,null,null,false,true); //set cookie for password

        //if the login and password of the same login matches with members table then you can connect

        //getting the hashed password where the user input for the login matches the database 
            $test = $params['usernameLogin'];
            $memberlogin = $db->prepare("SELECT username, password FROM membersTest WHERE username=:username");
            $memberlogin->bindParam('username', $usernameLogin, PDO::PARAM_STR);
            $memberlogin->execute();
            while($data = $memberlogin->fetch(PDO::FETCH_ASSOC)){
                // print_r($data);
                $hashed_password = $data['password'];
            }
            
        //verifying if the hashed password from the database matches with the user input
            if(password_verify($passwordLogin, $hashed_password)){ 
                header('Location: minichat.php');
            }else{
                echo "try again";
            }
        }
    }
    //@TODO set header to the pet registration page from Tyler 
}