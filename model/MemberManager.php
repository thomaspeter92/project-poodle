<?php 
require_once("Manager.php");
/**
 * Class for management of login and subscription
 */
class MemberManager extends Manager{
    /**
     * Function to check the login process
     * params contains : usernameLogin | passwordLogin
     * 
     * @return Boolean returns if the connexion can be authorized
     */
    public function checkLogin($params){
        $db = $this->dbConnect();
        $emailLogin = addslashes(htmlspecialchars((htmlentities(trim($params['emailLogin']))))); 
        $passwordLogin = addslashes(htmlspecialchars((htmlentities(trim($params['passwordLogin']))))); 
        // setcookie('email',$emailLogin,time()+365*24*3600,null,null,false,true); 
        // setcookie('password',$passwordLogin,time()+365*24*3600,null,null,false,true); 
        $memberlogin = $db->prepare("SELECT id, email, name, password FROM member WHERE email=:email");
        $memberlogin->bindParam('email', $emailLogin, PDO::PARAM_STR);
        $memberlogin->execute();
        $user = $memberlogin->fetch(PDO::FETCH_ASSOC);
        $hashed_password = $user['password'];
        $membername = $user['name'];
        $memberid = $user['id'];
        $_SESSION['name'] = $membername;
        $_SESSION['id'] = $memberid;
        $memberlogin->closeCursor();
        return password_verify($passwordLogin, $hashed_password);
    }
    

    public function addNewMember($params){
        $db = $this->dbConnect();
        $name = htmlspecialchars($params['username']);
        $email = htmlspecialchars($params['email']);
        $password = htmlspecialchars($params['password']);
        $confirmPassword = htmlspecialchars($params['confirmpass']);
       echo $name;
       
        // if($password != $confirmPassword){
        //     return false;
        // }
        
        //grabbed the existing email from database
        $req = $db->prepare("SELECT email from member WHERE email = ?");
        $req->bindParam(1, $email, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        
        //if email exists in the db then we return false
        // if($user){
        //     return false;
        // }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
          
        }else{
            return false;
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $newuser = $db->prepare("INSERT INTO member(name, password, email) VALUES(?,?,?)");
        $newuser->bindParam(1,$name, PDO::PARAM_STR);
        $newuser->bindParam(2,$hashedPassword, PDO::PARAM_STR);
        $newuser->bindParam(3,$email, PDO::PARAM_STR);
        $newuser->execute();
        $newuser->closeCursor();
        return true;
    }
}
