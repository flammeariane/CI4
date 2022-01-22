<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition utilisateur</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            update utilisateur
                            <a href="<?= base_url('dashboardAdmin') ?>" class=" btn btn-danger float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('dashboardAdmin/updateUser/' . $user['id']) ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Prénom</label>
                                        <input type="text" name="firstname" value="<?= $user['firstname'] ?>" class="form-control" placeholder="Entrez votre Prénom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Nom</label>
                                        <input type="text" name="lastname" value="<?= $user['lastname'] ?>" class="form-control" placeholder="Entrez votre nom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" value="<?= $user['email'] ?>" class="form-control" placeholder="Entrez votre email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Mot de passe</label>
                                        <input type="text" name="password" value="<?= $user['password'] ?>" class="form-control" placeholder="Entrez votre mot de passe">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Statut</label>
                                        <input type="text" name="status" value="<?= $user['status'] ?>" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Admin</label>
                                        <input type="text" name="admin" value="<?= $user['admin'] ?>" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary px-4"> Update </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'assets/js.php'; ?>

</body>

</html>