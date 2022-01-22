<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard utilisateur</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>

<body>

    <?php include 'assets/include/navbar.php'; ?>
    <div class="container">
        <div class="row">

            <h4> bienvenue sur le dashboard utilisateur </h4>
            <hr>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td><?= $userInfo['firstname']; ?></td>
                        <td><?= $userInfo['lastname']; ?></td>
                        <td><?= $userInfo['email']; ?></td>
                        <td><?= $userInfo['admin']; ?></td>
                        <td><a href="<?= site_url('auth/logout'); ?>">Déconnexion</a></td>
                    </tr>
                </tbody>
            </table>

            <div class="card border-primary">
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
                                    <td><?= $listBooks['isbn'] ?></td>
                                    <td><?= $listBooks['title'] ?></td>
                                    <td><?= $listBooks['edition_year'] ?></td>
                                    <td><?= $listBooks['language'] ?></td>
                                    <td> Résumé:
                                        <a class="Name" data-bs-target="#myModal" data-bs-toggle="modal">
                                            <?php echo $listBooks['title']; ?>
                                        </a>
                                    </td>

                                    <td>



                                        <a href="<?= base_url('dashboardUser/editBook/' . $listBooks['isbn']) ?>" class="btn btn-success btn-sm">Edit</a>


                                        <form action="<?= base_url('dashboardUser/deleteBook/' . $listBooks['isbn']) ?>" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-x"></i></button>

                                        </form>
                                    </td>
                                </tr>


                                <div class="modal" tabindex="-1" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><?= $listBooks['title'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= $listBooks['resume_book'] ?></p>
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










    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>


</body>

</html>