<?php
/**
 * Created by IntelliJ IDEA.
 * User: hp
 * Date: 03/08/2018
 * Time: 14:21
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
                window.location.href = "selectionnerMembre.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('خطأ');
                window.location.href = "selectionnerMembre.php";
            </script>
            <?php
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="fa" dir="rtl">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="./assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            اختيار المشترك
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="./assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="./assets/datatables/datatables-responsive/responsive.dataTables.min.css">
        <link rel="stylesheet" href="./assets/datatables/datatables-select/select.dataTables.min.css">
        <!--        <link rel="stylesheet" href="./assets/css/material.min.css">-->


        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.material.min.css">
    </head>

    <body class="">
    <div class="wrapper ">
        <?php include './sideNav.php'; ?>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#pablo">قائمة المشتركين</a>
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
                                    <h4 class="card-title pull-right">كل المشتركين</h4>
                                    <p class="card-category"> </p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                        $membres = getAllMembers();
                                        if ($membres) {
                                            ?>
                                            <table class="table" id="membresTable">
                                                <thead class=" text-primary">
                                                <th>الرقم</th>
                                                <th>الاسم واللقب</th>
                                                <th>تاريخ الميلاد</th>
                                                <th>مكان الميلاد</th>
                                                <th>رقم الهاتف</th>
                                                <th> نوع بطاقة التعريف</th>
                                                <th>رقم بطاقة التعريف</th>
                                                <th>Actions</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                foreach ($membres as $membre){
                                                    ?>
                                                    <tr>
                                                        <td><?= $membre['id'] ?></td>
                                                        <td><?= $membre['nom'] . ' ' . $membre['prenom']?></td>
                                                        <td><?= $membre['dateNaissance'] ?></td>
                                                        <td><?= $membre['lieuNaissance'] ?></td>
                                                        <td><?= $membre['numeroTel'] ?></td>
                                                        <td><?= $membre['typePI'] ?></td>
                                                        <td><?= $membre['numPI'] ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="getMembreId(<?= $membre['id'] ?>)"> اضافة دفع </button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                            <?php
                                        } else{
                                            ?>
                                            <h4 style="text-align: center">Aucun membre</h4>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

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
                        <form id="ajouterPaiementForm" method="post" action="selectionnerMembre.php?ajouterPaiement=true">
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
    <script src="./assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="./assets/js/sweetalert.js"></script>
    <script src="./assets/datatables/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./assets/datatables/datatables-responsive/dataTables.responsive.min.js"></script>
    <script src="./assets/datatables/datatables-select/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.material.min.js"></script>

    <script>
        $(document).ready(function () {

            // DataTable
            var table = $('#membresTable').DataTable({
                language: {
                    sProcessing: "جارٍ التحميل...",
                    sLengthMenu: "أظهر _MENU_ مدخلات",
                    sZeroRecords: "لم يعثر على أية سجلات",
                    sInfo: "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    sInfoEmpty: "يعرض 0 إلى 0 من أصل 0 سجل",
                    sInfoFiltered: "(منتقاة من مجموع _MAX_ مُدخل)",
                    sInfoPostFix: "",
                    sSearch: "ابحث:",
                    sUrl: "",
                    oPaginate: {
                        sFirst: "الأول",
                        sPrevious: "السابق",
                        sNext: "التالي",
                        sLast: "الأخير"
                    },
                    url: "./assets/french_datatable_translation.json"
                }, "dom": 'frtp'
            });
            alert('يرجى اختيار المشترك');
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