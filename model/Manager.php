<?php
class Manager
{
    protected function dbConnect()
    {
        return new PDO('mysql:host=localhost;dbname=projectPoodle;charset=utf8', 'root', '');
    }
}

