<?php 

require_once __DIR__ . "../config/database.php";

//Methode

//POST ==> Create
//id 	email 	password 	social_security_number 	birth_year 	

function createPatient($email, $password, $social_security_number, $birth){
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO  patient (email, password, social_security_number, birth) VALUES (?,?,?,?)");
    $stmt->execute([$email, $password, $social_security_number, $birth]);
    return $pdo->lastInsertId(); 
}

//GET ==> Read

function getAllPatient(){
    global $pdo;
    $stmt = $pdo-> query("SELECT * FROM patient");
    return $stmt->fetchAll();
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getPAtientById($id){
    global $pdo;
    $stmt = $pdo-> query("SELECT * FROM patient WHERE id=?");


}


//Patch ==> Update

function updatePatient($id, $newPassword){
    global $pdo;
    $stmt = pdo-> prepare("UPDATE patient SET ? WHERE id = ?");
    $stmt->execute([$newPassword, $id]);
    return $stmt->rowCount();
}

//Delete ==> Delete

function deleteDoctor($id){
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM patient WHERE id=?");
    $stmt->execute([$id]);
    
    return $stmt->rowCount();
}