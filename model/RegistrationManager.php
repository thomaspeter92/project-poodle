<?php 
require_once("Manager.php");
class RegistrationManager extends Manager{
    //insert their input into the database
    public function addNewMember($params){
        //if the user filled in the form...
        // try{
            // if(isset($username) AND isset($password) AND isset($email)){
                $db = $this->dbConnect();
        
            //     //grabbed the existing usernames from database
            //     $req = $db->query("SELECT username from membersTest");
            //             while($data = $req->fetchAll(PDO::FETCH_ASSOC)){
            //                 $usernamedb = $data['username'];
            //             }
            //     $req->closeCursor();

                $username = addslashes(htmlspecialchars((htmlentities(trim($params['username'])))));
                $email = htmlspecialchars(($params['email']));
                $password=$params['password'];
                $confirmpass = $params['confirmpass'];

                $pattern = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
                $emailcheck = preg_match($pattern, $email);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // if($password === $confirmpass AND $emailcheck == 1){ //if the passwords match and email is valid
                    $newuser = $db->prepare("INSERT INTO member(name, password, email) VALUES(?,?,?)");
                    $newuser->bindParam(1,$username, PDO::PARAM_STR);
                    $newuser->bindParam(2,$hashedPassword, PDO::PARAM_STR);
                    $newuser->bindParam(3,$email, PDO::PARAM_STR);
                    $newuser->execute();
                
                    $newuser->closeCursor();
                    
                    //header('Location: loginView.php'); //takes us to the login page
                // }else if ($password != $confirmpass AND $emailcheck != 1){
                //     throw new Exception ( 'please go back and double check your password and email'); //displays an error on insertlogin.php
                // }
                // else{
                //     header('Location: registrationView.php'); //if they click on login then it'll take them to loginpage
                // }
        }
    }
            
// }