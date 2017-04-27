<?php

    class Connection{
        public function dbConnect(){
           $db = new PDO("mysql:host=localhost;dbname=saringanUjianMhs", "root", "");
           return $db;
        }
    }
?>