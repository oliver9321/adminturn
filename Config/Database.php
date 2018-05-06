<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=onetime;charset=utf8', 'root', 'Revilo9321');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}