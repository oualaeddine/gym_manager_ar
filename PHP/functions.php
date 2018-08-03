<?php
/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 31/07/2018
 * Time: 13:22
 */

include './config.php';

function ajouterMembre($nom, $prenom, $numeroTel, $dateNaissance, $lieuNaissance, $typePi, $numPi){
    $conn = db_connect();
    if ($conn){
        try{
            $insert = $conn->prepare("INSERT INTO membre(nom, prenom, dateNaissance, numeroTel, lieuNaissance, typePI, numPI) VALUES (?,?,?,?,?,?,?)");
            $insert->execute(array($nom, $prenom, $dateNaissance, $numeroTel, $lieuNaissance, $typePi, $numPi));
            return true;
        }catch (PDOException $e){
            return false;
        }
    }else{
        return false;
    }
}

function getAllMembers(){
    $conn = db_connect();
    if ($conn){
        try{
            $sql = "SELECT * FROM membre;";
            $result = $conn->query($sql);
            $donnees = $result->fetchAll();
            if (empty($donnees)) {
                return false;
            } else {
                return $donnees;
            }
        }catch (PDOException $e){
            return false;
        }
    }
    return false;
}

function getAllPaiements(){
    $conn = db_connect();
    if ($conn){
        try {
            $sql = "SELECT * FROM paiement;";
            $result = $conn->query($sql);
            $donnees = $result->fetchAll();
            if (empty($donnees)) {
                return false;
            } else {
                return $donnees;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    return false;
}

function getById($table, $id){
    $conn = db_connect();
    if ($conn){
        try {
            $sql = "SELECT * FROM `$table` WHERE `id`=$id;";
            $result = $conn->query($sql);
            $donnees = $result->fetch();
            if (empty($donnees)) {
                return false;
            } else {
                return $donnees;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    return false;
}

function ajouterPaiement($membreId, $montant, $typeAbo){
    $conn = db_connect();
    if ($conn) {
        try {
            $insert = $conn->prepare("INSERT INTO paiement(`membreId`, `montant`, `timestamp`, `typeAbo`) VALUES (?, ?, CURRENT_TIMESTAMP, ?);");
            $insert->execute(array($membreId, $montant, $typeAbo));
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    return false;
}

function changerMdp($newMdp){
    $conn = db_connect();
    if ($conn) {
        try {
            $update = $conn->prepare("UPDATE `admin` SET `password` = ?;");
            $update->execute(array($newMdp));
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    return false;
}

function authenticate($username, $password){
    $conn = db_connect();
    if ($conn) {
        try {
            $sql = "SELECT * FROM `admin` WHERE id=1 AND `username`='$username' AND `password`='$password';";
            $result = $conn->query($sql);
            $donnees = $result->fetch();
            if (empty($donnees)) {
                return false;
            } else {
                return $donnees;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    return false;
}

function getRevenusMensuels(){
    $conn = db_connect();
    if ($conn) {
        try {
            $sql = "select sum(montant) as sum from `paiement` where month(timestamp)=month(current_date) and year(timestamp)=year(current_date);";
            $result = $conn->query($sql);
            $donnees = $result->fetch();
            if (empty($donnees)) {
                return 0;
            } else {
                return $donnees['sum'];
            }
        } catch (PDOException $e) {
            return 0;
        }
    }
    return false;
}

function getMembresEnRetard(){
    $conn = db_connect();
    if ($conn) {
        try {
            $sql = "SELECT m.*, p.id as haja FROM `membre` m,`paiement` p WHERE membreId=m.id AND p.id=(select id from paiement
where m.id=paiement.membreId  order by timestamp desc limit 1) AND month(p.timestamp)<month(current_date) and year(p.timestamp)=year(current_date);";
            $result = $conn->query($sql);
            $donnees = $result->fetchAll();
            if (empty($donnees)) {
                return false;
            } else {
                return $donnees;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
    return false;
}

function supprimerMembre($id){
    $conn = db_connect();
    if ($conn) {
        try {
            $reponse = $conn->prepare("DELETE FROM `membre` WHERE id = ?;");
            $reponse->execute(array($id));
            return true;
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
            return false;
        }
    }
    return false;
}

function supprimerPaiement($id){
    $conn = db_connect();
    if ($conn) {
        try {
            $reponse = $conn->prepare("DELETE FROM `paiement` WHERE id = ?;");
            $reponse->execute(array($id));
            return true;
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
            return false;
        }
    }
    return false;
}
