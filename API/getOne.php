<?php
    $url = "http://127.0.0.1/API/medicaments/2";
    $options = array('http' => array('header' => "Content-Type: application/x-www-form-urlencoded\r\n", 'method' => 'GET'));

    $context = stream_context_create($options);
    $resumt = file_get_contents($url, false, $context);
    var_dump($result);
?>