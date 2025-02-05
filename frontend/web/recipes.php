<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$dbh = new PDO('mysql:host=localhost;dbname=ch39791_recipes', 'ch39791_recipes', 'Y8cwyzGz');


function dbGet($sql, $params = []){
    global $dbh;
    $stmt = $dbh->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




require_once "index-view.php";





