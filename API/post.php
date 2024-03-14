<?php
    $url = 'http://127.0.0.1/API/medicaments';
    $data = array('Nom' => 'Norris', 'Prenom' => 'Lando', 'Ecurie' => 'McLaren', 'Points' => '0');

    $options = array('http' => array('header' => "Content-Type: application/x-www-form-urlencoded\r\n", 'method' => 'POST', 'content' => http_build_query($data)));
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if($result === FALSE){

    }
    var_dump($result);
?>