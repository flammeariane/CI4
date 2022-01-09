<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard utilisateur</title>
    <?php include 'assets/css.php'; ?>

</head>

<body>

    <div class="container">

        <div class="row">

            <h4> bienvenue sur le dashboard ADMIN </h4>
            <hr>

            <td><?= $userInfo['firstname']; ?></td>
            <td><?= $userInfo['lastname']; ?></td>
            <td><?= $userInfo['email']; ?></td>
            <td><?= $userInfo['admin']; ?></td>

            <td><a href="<?= site_url('auth/logout'); ?>">Déconnexion</a></td>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            liste utilisateur
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>email</th>
                                    <th>password</th>
                                    <th>Date creation</th>
                                    <th>statut</th>
                                    <th>admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listUsers as $listUsers) : ?>
                                    <tr>
                                        <td><?= $listUsers['firstname'] ?></td>
                                        <td><?= $listUsers['lastname'] ?></td>
                                        <td><?= $listUsers['email'] ?></td>
                                        <td><?= $listUsers['password'] ?></td>
                                        <td><?= $listUsers['creation_date'] ?></td>
                                        <td><?= $listUsers['status'] ?></td>
                                        <td><?= $listUsers['admin'] ?></td>
                                        <td>
                                            <a href="" class="btn btn-success btn-sm">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>

</body>

</html>