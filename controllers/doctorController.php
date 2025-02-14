<?php
require_once __DIR__ . "../models/doctorModel.php";
require_once __DIR__ ."../config/reponse.php";

class DoctorController {

function createDoctor($data){
    if ( !isset($data['name']) || !isset($data['speciality']) || !isset($data['zipcode'])){
        echo jsonRep(400, [], ["success" => false, "message" => "Un des champs n''est pas renseigner"]);
        die();
    }

    $name = trim($data['name']);
    $speciality = trim($data['speciality']);
    $zipcode = trim($data["zipcode"])

    $new = createDoctor($name, $speciaity, $zipcode); //Erreur pas compris à revoir
    echo jsonResponse(201, [], ["success" => true, "doctor_id" => $new]);
    die();


}

function getAllDoctor (){
    $doctor = getAllDoctor();
    echo jsonResponse(200, [], ["success" => true, "customers" => $doctor]);
    die();

}

function getDoctorById (){
    $doctor = getDoctorById($id);
    if (!$doctor) {
        echo jsonResponse(404, [], ["success" => false, "message" => "Customer introuvable."]);
        die();
    }
    echo jsonResponse(200, [], ["success" => true, "customer" => $doctor]);
    die();
}

function updateDoctor($id, $$data) {
    
    $existing = getDoctorById($id);
    if (!$existing) {
        echo jsonResponse(404, [], ["success" => false, "message" => "Docteur introuvable."]);
        die();
    }

    
    if ($data['name']) || !isset($data['speciality']) || !isset($data['zipcode']) {
        echo jsonResponse(400, [], ["success" => false, "message" => "Tous les champs sont requis"]);
        die();
    }

    $newName = trim($data['name']);
    $newSpeciality = trim($data['speciality']);
    $newZipCode = trim($data['zipcode']);
    

    $rowCount = updateDoctor($id, $newName, $newSpeciality, $newZipCode);
    if ($rowCount > 0) {
        echo jsonResponse(200, [], ["success" => true, "message" => "Vos informations sont mise à jour"]);
    } else {
        echo jsonResponse(500, [], ["success" => false, "message" => "Erreur lors de la mise à jour."]);
    }
    die();
}

function deleteDocteur($id) {
    
    $existing = getDoctorById($id);
    if (!$existing) {
        echo jsonResponse(404, [], ["success" => false, "message" => "Docteur introuvable."]);
        die();
    }

    $deletedRows = deleteDoctor($id);
    if ($deletedRows > 0) {
        echo jsonResponse(200, [], ["success" => true, "message" => "Docteur supprimé."]);
    } else {
        echo jsonResponse(500, [], ["success" => false, "message" => "Docteur suppression."]);
    }
    die();

}

}