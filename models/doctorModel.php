<?php

require_once __DIR__ . "../config/database.php";

//Methode

//POST ==> Create

function createDoctor($name, $speciality, $zipcode){
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO  doctor (name, speciality, zipcode) VALUES (?,?,?,?)");
    $stmt->execute([$name,$speciality,$zipcode]);
    return $pdo->lastInsertId(); 
}

//GET ==> Read

function getAllDoctors(){
    global $pdo;
    $stmt = $pdo-> query("SELECT * FROM doctor");
    return $stmt->fetchAll();
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getDoctorById($id){
    global $pdo;
    $stmt = $pdo-> query("SELECT * FROM doctor WHERE id=?");


}


//Put ==> Update

function updateDoctor($id, $name, $speciality, $zipcode){
    global $pdo;
    $stmt = pdo-> prepare("UPDATE doctor SET ?, ?, ? WHERE id = ?");
    $stmt->execute([$name, $speciality, $zipcode, $id]);
    return $stmt->rowCount();
}

//Delete ==> Delete

function deleteDoctor($id){
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM doctor WHERE id=?");
    $stmt->execute([$id]);
    
    return $stmt->rowCount();
}