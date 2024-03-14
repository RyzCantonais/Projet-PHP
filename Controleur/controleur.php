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
    // will check in the database with the api if it's the right login / password
    // for now, just put the login in the session
    session_start();
    $_SESSION['login'] = $login;
    require_once "vue/detailMedicaments.php";
}

function logoutUser()
{
    session_start();
    session_destroy();
    require_once "vue/formLogin.php";
}

?>
*
