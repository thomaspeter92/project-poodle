      
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
        $response->bindValue(":password", $password, PDO::PARAM_STR);
        $response->bindValue(":email", $email, PDO::PARAM_STR);
        $response->bindValue(":kakao", $kakao, PDO::PARAM_INT);
        $response->bindValue(":google", $google, PDO::PARAM_INT);
        $result = $response->execute();
        $response->closeCursor();
        return $result;
    }

    public function addNewMemberByGoogle($params){
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO member (name, password, email, date_subscription,kakao,google) VALUES(:name,:pass,:email,NOW(),:kakao, :google)');
        $req->bindValue(':name',htmlspecialchars($params['name']),PDO::PARAM_STR);
        $req->bindValue(':pass',htmlspecialchars($params['userId']),PDO::PARAM_STR);
        $req->bindValue(':email',htmlspecialchars($params['email']),PDO::PARAM_STR);
        $req->bindValue(':kakao',0,PDO::PARAM_INT);
        $req->bindValue(':google',1,PDO::PARAM_INT);
        $result = $req->execute();
        $req->closeCursor();
    }
    public function createSessionByEmail($email){
        $db = $this->dbConnect();
        $email = htmlspecialchars($email);
        $response = $db->prepare("SELECT id, email, name, kakao, google FROM member WHERE email=?");
        $response->bindParam(1, $email, PDO::PARAM_STR);
        $response->execute();
        $user = $response->fetch(PDO::FETCH_ASSOC);
        $response->closeCursor();

        //Franco 9Nov2020
        //Added SESSION type. Type can be 'google', 'kakao' or 'default'
        $type="default";
        if($user['kakao'] ==1){
            $type = "kakao";
        }elseif ($user['google']==1){
            $type = "google";
        }


        if ($user) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['type'] = $type;
            return true;
        }
        return false;
    }

}
