<?php
// Inclure le modèle
require_once "Modele/modeleMedoc.php";

function displayMedocs()
{
    session_start();
    if (!isset ($_SESSION['login'])) {
        // Récupérer les données des médicaments depuis l'API
        $medicaments_json = file_get_contents('http://127.0.0.1/Projet-PHP/API/medicaments.php');

        $options = array('http' => array('header' => "Content-Type: application/x-www-form-urlencoded\r\n", 'method' => 'GET'));

        $context = stream_context_create($options);
        $result = file_get_contents($medicaments_json, false, $context);

        require_once "Vue/DetailsMedicaments.php";

        // Convertir les données JSON en tableau PHP
        $medicaments = json_decode($medicaments_json, true);

        // Vérifier si la conversion a réussi
        if ($medicaments === null) {
            // Gérer l'erreur de conversion JSON
            echo "Erreur lors de la récupération des médicaments.";
        } else {
            // Inclure la vue formLogin.php et passer les données des médicaments
            require_once "vue/formLogin.php";
        }
    } else {
        // Inclure le modèle
        require_once "Modele/modeleMedoc.php";

        // Récupérer les médicaments depuis la base de données
        $medicaments = getMedicaments();

        // Inclure la vue listMedicaments.php et passer les données des médicaments
        require_once "Vue/DetailsMedicaments.php";
    }
}

function loginUser($login, $password)
{
    // will check in the database with the api if it's the right login / password
    // for now, just put the login in the session
    session_start();
    $_SESSION['login'] = $login;
    $medicaments = getMedicaments();
    require_once "Vue/DetailsMedicaments.php";
}

function logoutUser()
{
    session_start();
    session_destroy();
    header("Location: index.php");
}
?>