<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <title>dashboard administrateur</title>
</head>

<body>

    <div class="container">
        <?= $this->include('layouts/nav'); ?>


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
                <?php if ((session()->getFlashdata('status'))) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('status'); ?></div>
                <?php endif ?>
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
                                            <a href="<?= base_url('dashboardAdmin/editUser/' . $listUsers['id']) ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="<?= base_url('dashboardAdmin/deleteUser/' . $listUsers['id']) ?>" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
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



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>