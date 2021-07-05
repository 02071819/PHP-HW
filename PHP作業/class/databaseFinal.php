<?php
class DatabaseFinal
{
    public function getConnection()
    {
        $connect = new PDO("mysql:host=localhost;port=3306;dbname=first-db", "root", "");
        return $connect;
    }
}
?>