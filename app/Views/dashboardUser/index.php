<?php include 'assets/include/head.php'; ?>

<body id="page-top">
    <div id="wrapper">
        <?php include 'assets/include/sideBar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <?php include 'assets/include/caroussel.php'; ?>
                <?php include 'assets/include/topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard utilisateur</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="bi bi-file-pdf"></i> Exporter ma bibliothéque</a>
                    </div>

                    <?php if ((session()->getFlashdata('status'))) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('status'); ?></div>
                    <?php endif ?>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4 offset-1">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Mes livres :</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo sizeof($myLibrabry) ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                mes livre favoris</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo sizeof($myLibrabry) ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">profil completion
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-dark" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <form action="dashboardUser/searchApi" method="post">
                        <div class="row" id="mainContent">
                            <div id="linkLink">
                                <div class="row">
                                    <div class="col-sm-3">chercher un livre sur google:</div>
                                    <input type="texte" name="userSearch" class="form-control form-control-user" id="userSearch">

                                    <div class="col-sm-3"><button type="su" class="btn btn-outline-success">search</button></div>
                                    <div class="col-sm-3"></div>
                                </div>
                            </div>
                            <div id="linkContent">

                                <?php
                                if (!function_exists("pre")) {
                                    function pre($data2 = null)
                                    {
                                        echo "<pre>";
                                        print_r($data2);
                                        echo "</pre>";
                                    }
                                }
                                ?>

                                <?php

                                //var_dump($data2);
                                ?>

                            </div>
                        </div>





                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-info">Liste des Mes livres</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>isbn</th>
                                                <th>titre</th>
                                                <th>Année d'édition</th>
                                                <th>Langue</th>
                                                <th>Résumé</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($myLibrabry as $key => $Book) : ?>

                                                <tr>
                                                    <td><?= $Book->isbn ?></td>
                                                    <td><?= $Book->title ?></td>
                                                    <td><?= $Book->edition_year ?></td>
                                                    <td><?= $Book->language ?></td>
                                                    <td> Résumé:
                                                        <a class="Name" data-bs-target="#modal<?php echo $key; ?>" data-bs-toggle="modal">
                                                            <?php echo $Book->title; ?>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="<?= base_url('dashboardUser/editBook/' . $Book->isbn) ?>" class="btn btn-success btn-sm">Edit</a>

                                                        <form action="<?= base_url('dashboardUser/deleteBook/' . $Book->isbn) ?>" method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x">Delete</i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                </div>
                                <div class="modal" tabindex="-1" id="modal<?php echo $key; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><?php echo $Book->title; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><?php echo $Book->resume_book; ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            </tbody>
                            </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>

    <!--container -->


    <!-- End of Main Content -->

    <!-- Footer -->
    <?php include 'assets/include/footer.php'; ?>



    <!-- End of Content Wrapper -->


    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="bi-arrow-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">vous partez déjà ? </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à terminer votre session en cours.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annulé</button>
                    <a class="btn btn-info" href="<?= site_url('auth/logout'); ?>">Déconnexion</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <!-- datatable css -->

    <script src="assets/js/demo/datatables-demo.js"></script>
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>


</body>

</html>