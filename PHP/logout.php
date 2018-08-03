<?php
/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 02/08/2018
 * Time: 18:55
 */

session_start();
unset($_SESSION["admin"]);
?>
<script>alert('Déconnexion terminée avec succès');</script>
<script>window.location.href = 'login.php'; </script>