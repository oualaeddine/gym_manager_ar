<?php
/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 31/07/2018
 * Time: 13:35
 */

include 'functions.php';
?>

<div class="sidebar" data-color="purple" data-background-color="white" data-image="./assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            المسير
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="<?= ($file == "index.php") ? 'nav-item active' : 'nav-item' ?>  ">
                <a class="nav-link" href="./index.php">
                    <i class="material-icons">dashboard</i>
                    <p>الصفحة الرئسية</p>
                </a>
            </li>
            <li class="<?= ($file == "ajouterMembre.php") ? 'nav-item active' : 'nav-item' ?>">
                <a class="nav-link" href="./ajouterMembre.php">
                    <i class="material-icons">person_add</i>
                    <p>اضافة مشترك</p>
                </a>
            </li>
            <li class="<?= ($file == "membres.php") ? 'nav-item active' : 'nav-item' ?>">
                <a class="nav-link" href="./membres.php">
                    <i class="material-icons">people</i>
                    <p>قائمة المشتركين</p>
                </a>
            </li>
            <li class="<?= ($file == "paiements.php") ? 'nav-item active' : 'nav-item' ?>">
                <a class="nav-link" href="./paiements.php">
                    <i class="material-icons">content_paste</i>
                    <p>قائمة الدفع</p>
                </a>
            </li>
            <li class="<?= ($file == "selectionnerMembre.php" || $file=="ajouterPaiement.php") ? 'nav-item active' : 'nav-item' ?>">
                <a class="nav-link" href="./selectionnerMembre.php">
                    <i class="material-icons">library_add</i>
                    <p>  اضافة دفع</p>
                </a>
            </li>
            <li class="<?= ($file == "changePassword.php") ? 'nav-item active' : 'nav-item' ?>">
                <a class="nav-link" href="./changePassword.php">
                    <i class="material-icons">security</i>
                    <p> تغيير الكلمة السرية </p>
                </a>
            </li>
            <style>

                #logout_sidebar_button {
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                }

            </style>
            <li class="nav-item" id="logout_sidebar_button">
                <a class="nav-link" href="./logout.php">
                    <i class="material-icons">exit_to_app</i>
                    <p>انفصال</p>
                </a>
            </li>


        </ul>
    </div>
</div>
