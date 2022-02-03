<?php include 'assets/include/head.php'; ?>

<body>

    <div>
        <div class="row">
            <?php include 'assets/include/sideNav.php'; ?>

            <div class="col-10 ">
                <div class="row">
                    <?php include 'assets/include/caroussel.php'; ?>
                </div>

                <div class="row mt-2">
                    <div class="col-10">
                        <h4> bienvenue sur votre bibliothéque </h4>
                    </div>
                    <div class="col-2">
                        <?php include 'assets/include/userMenu.php'; ?>
                    </div>

                    <hr>

                    <div class="row" id="mainContent">
                        <div id="linkLink">
                            <div class="row">
                                <div class="col-sm-3">chercher un livre sur google:</div>
                                <div class="col-sm-3"><input id="inputSearchApi" class="form-control" type="text" name="userSearch" /></div>
                                <div class="col-sm-3"><button onclick="searchApi();" class="btn btn-outline-success">search</button></div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                        <div id="linkContent">

                            <?php

                            //  var_dump();
                            ?>

                        </div>
                    </div>
                    <hr class="mt-2">



                    <div class="card cardBorderless">
                        <div class="card-header">
                            <h4>
                                liste de mes livres
                            </h4>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>isbn</th>
                                        <th>titre</th>
                                        <th>Année d'édition</th>
                                        <th>Langue</th>
                                        <th>Résumé</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listBooks as $listBooks) : ?>
                                        <tr>
                                            <td><?= $listBooks->isbn ?></td>
                                            <td><?= $listBooks->title ?></td>
                                            <td><?= $listBooks->edition_year ?></td>
                                            <td><?= $listBooks->language ?></td>
                                            <td> Résumé:
                                                <a class="Name" data-bs-target="#myModal" data-bs-toggle="modal">
                                                    <?php echo $listBooks->title; ?>
                                                </a>
                                            </td>

                                            <td>
                                                <a href="<?= base_url('dashboardUser/editBook/' . $listBooks->isbn) ?>" class="btn btn-success btn-sm">Edit</a>

                                                <form action="<?= base_url('dashboardUser/deleteBook/' . $listBooks->isbn) ?>" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x">Delete</i></button>
                                                </form>
                                            </td>
                                        </tr>


                                        <div class="modal" tabindex="-1" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><?= $listBooks->title ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><?= $listBooks->resume_book ?></p>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>


</body>

</html>