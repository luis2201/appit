<?php

    class DB extends PDO
    {
        public function __construct()
        {
            try {
                $dsn = "mysql:host=localhost;dbname=feria; charset=utf8mb4";
                parent::__construct($dsn, "feria", '@Feria#itsup.');
            } catch(PDOException $ex) {
                //echo $ex->getMessage();
            }
        }
    }

?>