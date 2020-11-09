
<?php
/**
 * Class for management of login from Google
 */

require_once('Manager.php');

/**
 * Function to authenticate the id-token from Google
 * and obtain necessary information about user
 * 
 */
class MemberManager extends Manager{        
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

        return $result;
    }

    public function createSessionByEmail($email){
        $db = $this->dbConnect();
        $email = htmlspecialchars($email);
        $response = $db->prepare("SELECT id, email, name FROM member WHERE email=?");
        $response->bindParam(1, $email, PDO::PARAM_STR);
        $response->execute();
        $user = $response->fetch(PDO::FETCH_ASSOC);
        $response->closeCursor();

        if ($user) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['id'] = $user['id'];
            return true;
        }
        return false;
    }

}
