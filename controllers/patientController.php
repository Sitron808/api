<?php
require_once __DIR__ . "../models/patientModel.php";
require_once __DIR__ ."../config/reponse.php";

class PatientController {
    //id 	email 	password 	social_security_number 	birth_year 	


function createPatient($data){
    if ( !isset($data['email']) || !isset($data['password']) || !isset($data['social_security_number']) || !isset($data['birth'])){
        echo jsonRep(400, [], ["success" => false, "message" => "Un des champs n''est pas renseigner"]);
        die();
    }

    $email = trim($data['email']);
    $password = trim($data['password']);
    $socialNumber = trim($data["social_security_number"]);
    $birth = trim($data["birth"]);


    $new = createPatient($email, $password, $socialNumber, $birth); 
    echo jsonResponse(201, [], ["success" => true, "patient_id" => $new]);
    die();


}

function getAllPatient (){
    $patient = getAllPAtient();
    echo jsonResponse(200, [], ["success" => true, "patient" => $patient]);
    die();

}

function getPatientById (){
    $patient = getPatientById($id);
    if (!$patient) {
        echo jsonResponse(404, [], ["success" => false, "message" => "Patient introuvable."]);
        die();
    }
    echo jsonResponse(200, [], ["success" => true, "patient" => $patient]);
    die();
}

function updatePatient($id, $newPassword) {
    
    $existing = getPatientId($id);
    if (!$existing) {
        echo jsonResponse(404, [], ["success" => false, "message" => "Patient introuvable."]);
        die();
    }

    
    if (!isset($data['password'])) {
        echo jsonResponse(400, [], ["success" => false, "message" => "Le champs mot de passe est requis"]);
        die();
    }

    $newPassword = trim($data['passoword']);
    

    $rowCount = updatePatient($id, $newPassword);
    if ($rowCount > 0) {
        echo jsonResponse(200, [], ["success" => true, "message" => "Vos informations sont mise à jour"]);
    } else {
        echo jsonResponse(500, [], ["success" => false, "message" => "Erreur lors de la mise à jour."]);
    }
    die();
}

function deletePatient($id) {
    
    $existing = getPatientById($id);
    if (!$existing) {
        echo jsonResponse(404, [], ["success" => false, "message" => "Patient introuvable."]);
        die();
    }

    $deletedRows = deletePatient($id);
    if ($deletedRows > 0) {
        echo jsonResponse(200, [], ["success" => true, "message" => "Patient supprimé."]);
    } else {
        echo jsonResponse(500, [], ["success" => false, "message" => "Patient suppression."]);
    }
    die();

}

}