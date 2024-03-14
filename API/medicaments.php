<?php

include("db_connect.php");

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        // Retrieve Etudiants
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            getPilote($id);
        } else {
            getPilotes();
        }
        break;

    case 'POST':
        // Ajouter un etudiant
        AddPilote();
        break;

    case 'PUT':
        $id = intval($_GET["id"]);
        updatePilote($id);
        break;
    case 'DELETE':
        $id = intval($_GET["id"]);
        deletePilote($id);
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function getPilotes(){
    global $conn;
    $query = "SELECT * FROM pilotes";
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

function getPilote($id=0){
    global $conn;
    $query = "SELECT * FROM pilotes";
    if("$id != 0"){
        $query .= " WHERE code =".$id." LIMIT 1";
    }

    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    while($row = $result->fetch()){
        $response[] = $row;
    }

    $result->closeCursor();
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function AddPilote(){
    global $conn;
    $nom = $_POST["Nom"];
    $prenom = $_POST["Prenom"];
    $ecurie = $_POST["Ecurie"];
    $points = $_POST["Points"];
    echo $query = "INSERT INTO pilotes(Nom, Prenom, Ecurie, Points) VALUES ('".$nom."', '".$prenom."', '".$ecurie."', '".$points."')";
    $conn->query("SET NAMES utf8");
    if($conn->query($query)){
        $response=array('status' => 0, 'status_message' => 'ERREUR!.');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function updatePilote($id){
    global $conn;
    $_PUT = array();
    parse_str(file_get_contents('php://input'), $_PUT);
    $nom = $_PUT["Nom"];
    $prenom = $_PUT["Prenom"];
    $ecurie = $_PUT["Ecurie"];
    $points = $_PUT["Points"];
    $query = "UPDATE pilotes SET Nom = '".$nom."', Prenom = '".$prenom."', Ecurie = '".$ecurie."', Points = '".$points."' WHERE code = ".$id;
    
    $conn->query($query);
    if($conn->query($query)){
        $response = array('status' => 1, 'status_message' => 'Pilote mis a jour avec succes.');
    } else {
        $response = array('status' => 0, 'status_message' => 'Echec de mis a jour du pilote.');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function deletePilote($id){
    global $conn;
    $query = "DELETE FROM pilotes WHERE code = ".$id;
    
    $conn->query($query);
    if($conn->query($query)){
        $response = array('status' => 1, 'status_message' => 'Pilote supprime avec succes.');
    } else {
        $response = array('status' => 0, 'status_message' => 'La suppression du pilote a echoue.'. mysqli_error($conn));
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>