<?php
class Manager
{
    protected function dbConnect()
    {
        $CONNECT_TO_LOCALDB = true;

        if ($CONNECT_TO_LOCALDB) {
            return new PDO('mysql:host=localhost;dbname=projectPoodle;charset=utf8', 'root', ''); 
        }

        $dbhost = "[DB_HOST]";
        $dbport = "3306";
        $dbname = "[DB_NAME]";
        $charset = "utf8mb4";

        $dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
        $username = "[USERNAME]";
        $password = "[PASSWORD]";
    
        return new PDO($dsn, $username, $password);
    }
}

