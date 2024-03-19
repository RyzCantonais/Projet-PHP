<?php


function displayMedocs()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['login'])) {
        require_once "vue/formLogin.php";
    } else {
        $medicaments_json = file_get_contents('http://localhost/phpgroupe/api/medicaments.php');
        $medicaments = json_decode($medicaments_json, true);
        require_once "vue/detailsMedicaments.php";
    }
}

function loginUser($login, $password)
{
    session_start();
    if (!checkLogin($login, $password)) {
        $_SESSION['message'] = "Login ou mot de passe incorrect";
        require_once "vue/formLogin.php";
    }
    else { $_SESSION['login'] = $login;
        displayMedocs();
    }
}
   

function logoutUser()
{
    session_start();
    session_destroy();
    header("Location: index.php");
}


function details(){
    if(isset($_POST['id_medicament'])) {
        $id_medicament = $_POST['id_medicament'];
        try {
            $detail_json = file_get_contents('http://localhost/phpgroupe/api/medicaments.php?id=' . $id_medicament);
            $details = json_decode($detail_json, true);
            require_once "vue/descriptionMedoc.php";
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}


?>
