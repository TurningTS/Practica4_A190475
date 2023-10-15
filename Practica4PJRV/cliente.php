<?php
    require_once "lib/nusoap.php";
    $cliente = new nusoap_client("http://localhost/SW/Practica4PJRV/server.php");

    $error = $cliente->getError();
    if ($error) {
        echo "<h2>Constructor error</h2><pre>".$error."</pre>";
    }
    $result = $cliente->call("getAlumnos", array("datos" => "Alumnos"));
    $result2 = $cliente->call("getFrutas", array("datos" => "Frutas"));
    $result3 = $cliente->call("getAutos", array("datos" => "Autos"));
    if ($cliente->fault) { //Checar falla al momento de llamar el metodo
        echo "<h2>Fault</h2><pre>";
        print_r($result);
        print_r($result2);
        print_r($result3);
        echo "</pre>";
    }
    else { //No hay error al llamar al metod
        $error = $cliente->getError();
        if ($error) {
            echo "<h2>Error</h2><pre>".$error."</pre>";
        }
        else {
            echo "<h2>Alumnos</h2><pre>";
            echo $result;
            echo "</pre>";
            echo "<h2>Frutas</h2><pre>";
            echo $result2;
            echo "</pre>";
            echo "<h2>Autos</h2><pre>";
            echo $result3;
            echo "</pre>";
        }
    }
?>