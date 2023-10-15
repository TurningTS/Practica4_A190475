<?php
    require_once "lib/nusoap.php";
    function getAlumnos($datos) {
        if ($datos == "Alumnos") {
            return join(",", array(
                "José Perez Hernandez",
                " María Gómez López",
                " Manuel Fernandez Vazquez",
                " Sofia Zarate Torres"
            ));
        }
        else {
            return "No hay alumnos";
        }
    }
    function getFrutas($datos) {
        if ($datos == "Frutas") {
            return join(",", array(
                "Manzana",
                " Pera",
                " Platano",
                " Uva",
                " Papaya"
            ));
        }
        else {
            return "No hay frutas";
        }
    }
    function getAutos($datos) {
        if ($datos == "Autos") {
            return join(",", array(
                "Ford",
                " Volkswagen",
                " Tesla",
                " Chevrolet",
                " Toyota"
            ));
        }
        else {
            return "No hay frutas";
        }
    }
    $server = new soap_server(); //crear instancia SOAP
    $server->register("getAlumnos"); //Indica el emtodo o funcion a devolver
    $server->register("getFrutas");
    $server->register("getAutos");
    if (!isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);
?>