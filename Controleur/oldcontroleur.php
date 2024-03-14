<?php
function connexionBD(){
    $utilisateur = "root";
    $mdp ="";
    $serveurAndBase = "mysql:host=localhost;dbname=GSB";

    try{
        $bd = new PDO($serveurAndBase, $utilisateur, $mdp);
    } catch(Exception $e){
        die("Erreur : ".$e->getMessage());
    }
    return $bd;
}

function getMedicaments(){
    $bd = connexionBD();
    $requete = "SELECT * FROM pilotes";
    $bd->query("SET NAME utf8");
    $resultat = $bd->query($requete);

    $pils = array();
    while($ligne = $resultat->fetch()){
        $pils[] = $ligne;
    }
    
    $resultat->closeCursor();
    return $pils;
}

function getMedicament($codeP) {
    $bd = connexionBD();
    $requete = "SELECT * FROM pilotes WHERE Code='$codeP' ";
    
    $bd->query("SET NAMES utf8");
    
    $resultat = $bd->query($requete);
    
    $pil = $resultat->fetch();
    
    return $pil;
    
    }
    
function inscriptionUtil($idU, $nomU, $prenomU, $adresse_mail, $profession){
    $bd = connexionBD();

    $requete = "INSERT INTO utilisateurs (id, nom, prenom, adresse_mail, profession)
                VALUES ('$idU', '$nomU', '$prenomU', '$adresse_mail', '$profession')";

    $bd->query("SET NAMES utf8");

    $bd->query($requete);

}



function updPilote($codeP, $ecurie, $points){
    $bd = connexionBd();
    $requete = "UPDATE pilotes
                SET ecurie = '$ecurie', points = '$points'
                WHERE code = '$codeP' ";
    $bd->query("SET NAMES utf8");

    $bd->query($requete);
}

?>
