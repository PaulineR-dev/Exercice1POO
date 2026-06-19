<?php

/**
 * Connexion avec la base de données 
 */
class DBConnect
{
    public static function getPDO(): PDO
    {
        return new PDO(
            "mysql:host=localhost;dbname=contacts;charset=utf8mb4",
            "root",
            "",
        );
    }
}