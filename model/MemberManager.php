      
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
        $query = "SELECT id, name, kakao, google, profileImage, points FROM member WHERE email=:email";
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
        $query = "SELECT id, name, password, email, kakao, google, profileImage FROM member WHERE id=:id";
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
        $imageURL = isset($params["imageURL"]) ? $params["imageURL"] : NULL;
        
        if (empty($kakao) AND empty($google)) {
            $confirmPassword = htmlspecialchars($params["confirmpass"]);
            if ($password != $confirmPassword){
                return false;
            }
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        if(empty($name)){
            return false;
        }
       
        //Save the image into the server with the URL
        $imageFileName = NULL;
        if (isset($imageURL)) {
            $profileDir = "./private/profile/";
            $imageFileName = FileUtil::downloadFileFromURL($imageURL, $profileDir);
        }
        
        $db = $this->dbConnect();
        $query = "INSERT INTO member(name, password, email, kakao, google, profileImage) 
                                VALUES(:name, :password, :email, :kakao, :google, :profileImage)";
        $response = $db->prepare($query);
        $response->bindValue(":name", $name, PDO::PARAM_STR);
        $response->bindValue(":password", $hashedPassword, PDO::PARAM_STR);
        $response->bindValue(":email", $email, PDO::PARAM_STR);
        $response->bindValue(":kakao", $kakao, PDO::PARAM_INT);
        $response->bindValue(":google", $google, PDO::PARAM_INT);
        $response->bindValue(":profileImage", $imageFileName, PDO::PARAM_STR);
        $result = $response->execute();
        $response->closeCursor();
        return $result;
    }

    function changePW($newPW, $userID) {
        $newPW1 = htmlspecialchars($newPW);
        $db = $this->dbConnect();
        $query = "UPDATE member SET password = :password WHERE id = :userID";
        $response = $db->prepare($query);
        $response->bindValue(":password", password_hash($newPW1, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $response->bindValue(":userID", $userID, PDO::PARAM_INT);
        $result = $response->execute();
        $response->closeCursor();

        return $result;
    }

    function changeAccountName($newName, $userID) {
        $db = $this->dbConnect();
        $query = "UPDATE member SET name = :name WHERE id = :userID";
        $response = $db->prepare($query);
        $response->bindValue(":name", htmlspecialchars($newName), PDO::PARAM_STR);
        $response->bindValue(":userID", $userID, PDO::PARAM_INT);
        $result = $response->execute();
        $response->closeCursor();

        return $result;
    }

    function changeAccountEmail($newEmail, $userID) {
        $db = $this->dbConnect();
        $query = "UPDATE member SET email = :email WHERE id = :userID";
        $response = $db->prepare($query);
        $response->bindValue(":email", htmlspecialchars($newEmail), PDO::PARAM_STR);
        $response->bindValue(":userID", $userID, PDO::PARAM_INT);
        $result = $response->execute();
        $response->closeCursor();

        return $result;
    }

    function changeProfilePic($newImage, $userID) {
    $db = $this->dbConnect();
    $query = "UPDATE member SET profileImage = :profileImage WHERE id = :userID";
    $response = $db->prepare($query);
        $response->bindValue(":profileImage", htmlspecialchars($newImage), PDO::PARAM_STR);
        $response->bindValue(":userID", $userID, PDO::PARAM_INT);
        $result = $response->execute();
        $response->closeCursor();

        return $result;
    }

    function removeProfilePic($userID) {
        $db = $this->dbConnect();
        $query = "UPDATE member SET profileImage = NULL WHERE id = $userID";
        $response = $db->prepare($query);
        $result = $response->execute();
        $response->closeCursor();
        
        return $result;
}

    function getProfilePic($userID) {
        $db = $this->dbConnect();
        $query = "SELECT profileImage FROM member WHERE id = $userID";
        $response = $db->prepare($query);
        $response->execute();
        $profilePicURL = $response->fetch(PDO::FETCH_ASSOC);
        $response->closeCursor();

        return $profilePicURL;
    }
    function checkPoints($userID){
        $db = $this->dbConnect();
        $query = "SELECT points FROM member WHERE id = $userID";
        $response = $db->prepare($query);
        $response->execute();
        $points = $response->fetch(PDO::FETCH_ASSOC);
        $response->closeCursor();
        $currentPoints = $points['points'];
        return $currentPoints;
    }
    function addPoints($userID){
            $db = $this->dbConnect();
            $query = "UPDATE member SET points = 5 WHERE id = $userID";
            $response = $db->prepare($query);
            $response->execute();
            $response->closeCursor();
    }

}