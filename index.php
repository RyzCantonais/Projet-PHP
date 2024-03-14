<?php


require_once "Modele/modeleMedoc.php";
require_once "Controleur/controleur.php";


if (empty($_GET["action"])) 
    displayMedocs();
else
    if ($_GET["action"] == "LG")
    {
        // get the login and password from the form and call the function loginUser
        $login = $_POST["username"];
        $password = $_POST["password"];
        loginUser($login, $password);
    }
    else
        if ($_GET["action"] == "LO")
            logoutUser();
        else 
            if ($_GET["action"] == "UPDT")
                switchMedoc();
            else
                if ($_GET["action"] == "EDIT")
                    editMedoc();