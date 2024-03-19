<?php


require_once "Modele/modeleMedoc.php";
require_once "Controleur/controleur.php";


if (empty($_GET["action"])) 
    displayMedocs();
else
    if ($_GET["action"] == "LG")
    {
        $login = $_POST["username"];
        $password = $_POST["password"];
        loginUser($login, $password);
    }
    else
        if ($_GET["action"] == "LO")
            logoutUser();
        else 
            if ($_GET["action"] == "DET")
                details();
            else
                if ($_GET["action"] == "EDIT")
                    editMedoc();