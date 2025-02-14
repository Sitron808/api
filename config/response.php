<?php

function jsonRep($statusCode, $header, $body){
    http_response_code($statusCode);

    foreach( $sheaders as $headerName => $headerValue){
        header("$headerName: $headerValue");
    }
    header("Content-type: application/json");

    return json_encode($body);
}