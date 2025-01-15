<?php
class DB extends PDO
{
    public function __construct()
    {
        try {
            $dsn = "mysql:host=localhost;dbname=itsup_aplicativo; charset=utf8mb4";
            parent::__construct($dsn, "itsup_aplicativo", '@appit$itsup]icep.');
        } catch(PDOException $ex) {
            //echo $ex->getMessage();
        }
    }
}