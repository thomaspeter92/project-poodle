<?php
class Manager
{
    protected function dbConnect()
    {
        $dbhost = "[DB_HOST]";
        $dbport = "3306";
        $dbname = "[DB_NAME]";
        $charset = "utf8";

        $dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
        $username = "[USERNAME]";
        $password = "[PASSWORD]";
    
        return new PDO($dsn, $username, $password);
        // return new PDO('mysql:host=localhost;dbname=projectPoodle;charset=utf8', 'root', '');
    }
}

