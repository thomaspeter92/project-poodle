<?php
require_once("Manager.php");

class TestKakaoManager extends Manager
{
    function addMemeber($name, $email)
    {
        $password = uniqid();
        $kakao = 1;
        $db = $this->dbConnect();
        $query = "INSERT INTO member(name, password, email, kakao) 
                                VALUES(:name, :password, :email, :kakao)";
        $response = $db->prepare($query);
        $response->bindValue(":name", $name, PDO::PARAM_STR);
        $response->bindValue(":password", $password, PDO::PARAM_STR);
        $response->bindValue(":email", $email, PDO::PARAM_STR);
        $response->bindValue(":kakao", $kakao, PDO::PARAM_INT);
        $result = $response->execute();
        $response->closeCursor();
        return $result;
    }
}
