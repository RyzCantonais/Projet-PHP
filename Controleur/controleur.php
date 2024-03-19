<?php


function displayMedocs()
{
    session_start();
    if (!isset($_SESSION['login'])) {
        require_once "vue/formLogin.php";
    } else {
        require_once "Vue/detailsMedicaments.php";
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
        require_once "vue/detailsMedicaments.php";
    }
}
   

function logoutUser()
{
    session_start();
    session_destroy();
    header("Location: index.php");
}

?>
