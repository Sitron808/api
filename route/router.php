<?php

require_once __DIR__ . "../controllers/doctorController.php";
require_once __DIR__ . "../controllers/patientController.php";


$doctorController = new DoctorController();
$patientController = new PatientController();


//Doctor Route
$router->addRoute('POST', '/doctor', [$doctorController, 'store']);
$router->addRoute('GET', '/doctor', [$doctorController, 'index']);
$router->addRoute('GET', '/doctor/{id}', [$doctorController, 'show']);
$router->addRoute('PUT', '/doctor/{id}', [$doctorController, 'update']);
$router->addRoute('DELETE', '/doctor/{id}', [$doctorController, 'destroy']);

// Patient route
$router->addRoute('POST', '/patient', [$patientController, 'store']);
$router->addRoute('GET', '/patient', [$patientController, 'index']);
$router->addRoute('GET', '/patient/{id}', [$patientController, 'show']);
$router->addRoute('PATCH', '/patient/{id}', [$patientController, 'updatePassword']);
$router->addRoute('DELETE', '/patient/{id}', [$patientController, 'destroy']);