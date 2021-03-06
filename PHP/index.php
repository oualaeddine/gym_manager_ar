<?php
/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 31/07/2018
 * Time: 13:13
 */

session_start();
if (isset($_SESSION['admin'])) {
    $file = basename(__FILE__);

    if (isset($_GET['ajouterPaiement'])) {
        include 'functions.php';
        $id = $_POST['membreTaaLePaiement'];
        $select = $_POST['paiement'];
        switch ($select){
            case "1":
                $montant = 1500;
                $typeAbo = 'sansCardio';
                break;
            case "2":
                $montant = 2000;
                $typeAbo = 'avecCardio';
                break;
            default:
                $montant = 0;
                $typeAbo = null;
        }
        if (ajouterPaiement($id, $montant, $typeAbo)) {
            ?>
            <script>
                alert('نجاح !');
                window.location.href = "index.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('خطأ');
                window.location.href = "index.php";
            </script>
            <?php
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="./assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Dashboard
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="./assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

    </head>

    <body class="">
    <div class="wrapper ">
        <?php include './sideNav.php'; ?>
        <div class="main-panel">
            <!-- Navbar -->
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">content_copy</i>
                                    </div>
                                    <p class="card-category">عدد المشتركين</p>
                                    <h3 class="card-title"><?= count(getAllMembers()) ?>
                                        <small>مشتركين</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
<!--                                        <i class="material-icons text-danger">warning</i>-->
<!--                                        <a href="#pablo">Get More Space...</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">attach_money</i>
                                    </div>
                                    <p class="card-category">الدخل الشهري</p>
                                    <h3 class="card-title">دج<?= getRevenusMensuels() ?> </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
<!--                                        <i class="material-icons">date_range</i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">info_outline</i>
                                    </div>
                                    <p class="card-category">Gdah li lazem yselkou</p>
                                    <h3 class="card-title"><?= count(getMembresEnRetard()) ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
<!--                                        <i class="material-icons">local_offer</i> Tracked from Github-->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header card-header-danger">
                                    <h4 class="card-title">Li lazem yselkou</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <?php
                                    $membres = getMembresEnRetard();
                                    if ($membres) {
                                        ?>
                                        <table class="table table-hover">
                                            <thead class="text-primary">
                                            <th>الرقم</th>
                                            <th>الاسم واللقب</th>
                                            <th>تاريخ الازدياد</th>
                                            <th>مكان الازدياد</th>
                                            <th>رقم الهاتف</th>
                                            <th>نوع بطاقة التعريف</th>
                                            <th>رقم بطاقة التعريف</th>
                                            <th>Actions</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($membres as $membre) {
                                                ?>
                                                <tr>
                                                    <td> <?= $membre['id'] ?> </td>
                                                    <td> <?= $membre['nom'] . ' ' . $membre['prenom'] ?> </td>
                                                    <td> <?= $membre['dateNaissance'] ?> </td>
                                                    <td> <?= $membre['lieuNaissance'] ?> </td>
                                                    <td> <?= $membre['numeroTel'] ?> </td>
                                                    <td> <?= $membre['typePI'] ?> </td>
                                                    <td> <?= $membre['numPI'] ?> </td>
                                                    <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="getMembreId(<?= $membre['id'] ?>)"> اضافة دفع </button> </a> </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <?php
                                    } else {
                                        ?>
                                        <h4 style="text-align: center">Aucun membre en retard de paiement</h4>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="https://creative-tim.com/presentation">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/license">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, made with <i class="material-icons">favorite</i> by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form id="ajouterPaiementForm" method="post" action="index.php?ajouterPaiement=true">
                            <div class="row">
                                <input type="hidden" name="membreTaaLePaiement" id="membreTaaLePaiement">
                                <select class="custom-select" name="paiement">
                                    <option value="0">- اختيار نوع الاشتراك -</option>
                                    <option value="1">1500DA | Sans cardio</option>
                                    <option value="2">2000DA | Avec cardio</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" form="ajouterPaiementForm" class="btn btn-primary" >حفظ</button>
                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="./assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="./assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/material-dashboard.js?v=2.1.0" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>
    <script>
        function getMembreId(idTaaLeMembre){
            document.getElementById("membreTaaLePaiement").value = idTaaLeMembre;
        }
    </script>
    </body>

    </html>



    <?php
}else {
    //echo "not logged in";
    header('Location: ./login.php');
    exit;
}
?>