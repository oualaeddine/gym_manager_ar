<?php
/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 31/07/2018
 * Time: 13:14
 */

session_start();
if (isset($_SESSION['admin'])) {
$file = basename(__FILE__);
?>

<!DOCTYPE html>
    <html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        اضافة دفع
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="./assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!--<link href="../assets/demo/demo.css" rel="stylesheet" />-->
</head>

<body class="">
<div class="wrapper ">
    <?php include './sideNav.php'; ?>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" >اضافة دفع</a>
                </div>

            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">معلومات الدفع</h4>
                                <?php
                                $id = $_GET['id'];
                                $membre = getById('membre', $id);
                                ?>
                                <p class="card-category"><?= $membre['nom'] . ' ' . $membre['prenom'] ?>  تسجيل دفع للمشترك   </p>
                            </div>
                            <div class="card-body">
                                <form action="ajouterPaiement.php?id=<?= $id ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">المبلغ </label>
                                                <input type="text" name="montant" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">نوع الاشتراك</label>
                                                <select  name="typeAbo" class="custom-select">
                                                    <option value="">-اختيار نوع الاشتراك-</option>
                                                    <option value="avecCardio">Avec cardio</option>
                                                    <option value="sansCardio">Sans cardio</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">حفظ</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
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
<script src="./assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<!--<script src="../assets/demo/demo.js"></script>-->
</body>

</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_GET['id'];
    $montant = $_POST['montant'];
    $typeAbo = $_POST['typeAbo'];
    if (ajouterPaiement($id, $montant, $typeAbo)) {
        ?>
        <script>alert('نجاح !') </script>
<?php
    } else {
        ?>
        <script> alert('خطأ') </script>
<?php
    }
}
}

?>


