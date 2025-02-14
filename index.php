<?php

require_once __DIR__ . "routes/router.php";


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


$router = new Routeur;



http_response_code(404);
echo jsonResponse(404, [], ["success" => false, "message" => "Route non trouvée"]);