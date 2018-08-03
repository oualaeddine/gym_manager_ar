<?php
include "./config.php";

try {

    $db = getConnection();

} catch (Exception $e) {
    dir('Erreur :' . $e->getMessage());

}

//$date_n = $_POST['daten'];
//$nom = $_POST['nom'];
//$prenom = $_POST['prenom'];
//$lie_n = $_POST['lie'];
//$email = $_POST['email'];
//$num_t = $_POST['num'];
//$typepi = $_POST['typ'];
//$numpi = $_POST['pi'];
//$typeabn = $_POST['npi'];
//
//
//    $insert = $db->prepare("INSERT INTO membres(nom,prenom,date_de_nessance,lieu_de_nessance,email,numero,type_pi,num_pi) VALUES (?,?,?,?,?,?,?,?)");
//    $insert->execute(array( $nom, $prenom,$date_n, $lie_n, $email, $num_t,$typepi,$numpi));
//    $ins = $db->prepare("INSERT INTO paiement(ID_admin,ID_membre,type_abonnement,montant) VALUES (?,?,?,?)");
//    $ins->execute(array( $nom, $prenom,$date_n, $lie_n, $email, $num_t,$typepi,$numpi));

header('Location: form_component.html');

