<?php

include("./db/db_connect.php");

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            getMedicament($id);
            effetT($id);
            effetS($id);
        } else {
            getMedicaments();
        }
        break;
}

function getMedicaments(){
    global $conn;
    $query = "SELECT * FROM medicaments";
    $response = array();

    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    while($row = $result->fetch()){
        $response[] = $row;
    }

    $result->closeCursor();
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function getMedicament($id){
    global $conn;
    $query = "SELECT * FROM medicaments";
    if($id != 0){
        $query .= " WHERE id =" . $id . " LIMIT 1";
    }

    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    $response = array(); // Initialisation de $response

    while($row = $result->fetch()){
        $response[] = $row;
    }

    $result->closeCursor();
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function effetT($id){
    global $conn;
    $query = "SELECT "
}

?>