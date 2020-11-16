      
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

        $memberlogin->closeCursor();
        return password_verify($passwordLogin, $hashed_password);
    }
    
    public function getMemberDataByEmail($email) {
        $email = htmlspecialchars($email);
        $db = $this->dbConnect();
        $query = "SELECT id, name, kakao, google FROM member WHERE email=:email";
        $response = $db->prepare($query);
        $response->bindParam('email', $email, PDO::PARAM_STR);
        $response->execute();
        $data = $response->fetch(PDO::FETCH_ASSOC);
        $response->closeCursor();
        return $data;
    }

    public function getMemberDataByID($id) {
        $id = htmlspecialchars($id);
        $db = $this->dbConnect();
        $query = "SELECT id, name, kakao, google FROM member WHERE id=:id";
        $response = $db->prepare($query);
        $response->bindParam('id', $id, PDO::PARAM_STR);
        $response->execute();
        $data = $response->fetch(PDO::FETCH_ASSOC);
        $response->closeCursor();
        return $data;
    }

    function addNewMember($params) {
        $name = htmlspecialchars($params["name"]);
        $password = htmlspecialchars($params["password"]);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $email = htmlspecialchars($params["email"]);
        $kakao = htmlspecialchars($params["kakao"]);
        $google = htmlspecialchars($params["google"]);
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        $db = $this->dbConnect();
        $query = "INSERT INTO member(name, password, email, kakao, google) 
                                VALUES(:name, :password, :email, :kakao, :google)";
        $response = $db->prepare($query);
        $response->bindValue(":name", $name, PDO::PARAM_STR);
        $response->bindValue(":password", $hashedPassword, PDO::PARAM_STR);
        $response->bindValue(":email", $email, PDO::PARAM_STR);
        $response->bindValue(":kakao", $kakao, PDO::PARAM_INT);
        $response->bindValue(":google", $google, PDO::PARAM_INT);
        $result = $response->execute();
        $response->closeCursor();
        return $result;
    }
}
