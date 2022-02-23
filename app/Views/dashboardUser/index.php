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



                    <!-- <div>

                        <a href="#" onclick="Set_Form(); return false;">Test</a>
                        <script type="text/javascript" src="jquery_3_1_1.js"></script>
                        <script type="text/javascript" src="ajax.js"></script>
                    </div> -->

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4 offset-1">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Livre sur la plateforme :</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo sizeof($listBooks) ?>
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
                                                mes livres</div>
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



                    <!-- search book  -->
                    <!-- 
                    <input type="text" id="it" onkeyup="loadAjax()" />

                    <div id="results"></div> -->



                    <!-- Content Row -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-10">
                                    <h4 class="m-0 font-weight-bold text-info">Liste des Mes livres</h4>
                                </div>
                                <div class="col-2 ">

                                    <!-- Button trigger modal ajout livre -->

                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addBookModal">
                                        <i class="bi bi-align-middle"></i> Ajouter un livre
                                    </button>

                                </div>
                            </div>



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
                                            <th>Favoris</th>
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
                                                    <!-- Button trigger modal voir résumer livre-->
                                                    <a class="Name" data-bs-target="#modal<?php echo $key; ?>" data-bs-toggle="modal">
                                                        <?php echo $Book->title; ?>
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="<?= base_url('dashboardUser/editBook/' . $Book->isbn) ?>" class="btn btn-success btn-sm">Edit</a>

                                                    <form action="<?= base_url('dashboardUser/deleteBookFromLib/' . $Book->id) ?>" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x">Delete</i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <?php if ($Book->favorite == 1) : ?>
                                                        <p class="text-center"><button class="btn btn-warning"><i class="bi bi-star-fill"></i></button> </p>
                                                </td>
                                            <?php endif; ?>
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

        <!-- Modal ajout livre -->
        <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('dashboardUser/addBook/') ?>" method="POST">

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>isbn</label>
                                    <input type="text" name="isbn" class="form-control form-control-user" placeholder="titre" value="<?= set_value('isbn'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>titre</label>
                                    <input type="text" name="title" class="form-control form-control-user" placeholder="titre" value="<?= set_value('title'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Année d"édition</label>
                                    <input type="text" name="edition_year" class="form-control form-control-user" placeholder="année d'édition" value="<?= set_value('edition_year'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Langue</label>
                                    <input type="text" name="language" class="form-control form-control-user" placeholder="langue" value="<?= set_value('language'); ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Langue</label>
                                    <input type="text" name="resume_book" class="form-control form-control-user" placeholder="résumé du livre" value="<?= set_value('resume_book'); ?>">
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input type="checkbox" name="favorite" value="1">
                                </div>
                            </div>

                            <div class="col-6">
                                <label for="cover_url">Upload Image</label>
                                <input name="cover_url" id="cover_url" class="form-control" placeholder="Photo" type="file" enctype="multipart/form-data">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary px-4"> Ajouté </button>
                    </div>
                </div>
                </form>
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




    <script>
        function loadAjax() {
            var k = $('#it').val();
            $.post('<?php echo base_url() . '/dashboardUser/searchBook/' ?>' + k, function(data) {
                $('#results').html(data);
            });
        }
    </script>








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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</body>

</html>