<?php

require_once __DIR__ . "../controllers/doctorController.php";
require_once __DIR__ . "../controllers/patientController.php";


$doctorController = new DoctorController();
$patientController = new PatientController();


//Doctor Route
$router->addRoute('POST', '/doctor', [$doctorController, 'doctor']);
$router->addRoute('GET', '/doctor', [$doctorController, 'all']);
$router->addRoute('GET', '/doctor/{id}', [$doctorController, 'id']);
$router->addRoute('PUT', '/doctor/{id}', [$doctorController, 'update']);
$router->addRoute('DELETE', '/doctor/{id}', [$doctorController, 'destroy']);

// Patient route
$router->addRoute('POST', '/patient', [$patientController, 'patient']);
$router->addRoute('GET', '/patient', [$patientController, 'all']);
$router->addRoute('GET', '/patient/{id}', [$patientController, 'id']);
$router->addRoute('PATCH', '/patient/{id}', [$patientController, 'updatePassword']);
$router->addRoute('DELETE', '/patient/{id}', [$patientController, 'destroy']);