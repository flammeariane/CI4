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
                            Mise à jour du compte
                            <button class=" btn btn-danger float-end" onclick="history.back()">Retour</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('dashboardAdmin/updateUser/' . $user->id) ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Prénom</label>
                                        <input type="text" name="firstname" value="<?= $user->firstname ?>" class="form-control" placeholder="Entrez votre Prénom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Nom</label>
                                        <input type="text" name="lastname" value="<?= $user->lastname ?>" class="form-control" placeholder="Entrez votre nom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input type="text" name="email" value="<?= $user->email ?>" class="form-control" placeholder="Entrez votre email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Mot de passe</label>
                                        <input type="text" name="password" value="<?= $user->password ?>" class="form-control" placeholder="Entrez votre mot de passe">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Date de naissance</label>
                                        <input type="text" name="birthdate" value="<?= $user->birthdate ?>" class="form-control" placeholder="Entrez votre date de naissance">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Numero de téléphone</label>
                                        <input type="text" name="tel_number" value="<?= $user->tel_number ?>" class="form-control" placeholder="Entrez numero de téléphone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Rue</label>
                                        <input type="text" name="street" value="<?= $user->street ?>" class="form-control" placeholder="Entrez le nom de votre rue">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Code Postal</label>
                                        <input type="text" name="post_code" value="<?= $user->post_code ?>" class="form-control" placeholder="Entrez code postal ">
                                    </div>
                                </div>



                                <?php if (($_SESSION['isAdmin'])) : ?>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Statut</label>
                                            <input type="text" name="status" value="<?= $user->status ?>" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Admin</label>
                                            <input type="text" name="admin" value="<?= $user->admin ?>" class="form-control" placeholder="">
                                        </div>
                                    </div>
                            </div>


                        <?php endif; ?>
                        <div class="form-group">
                            <label for="userProfileImage">Upload Image</label>
                            <input name="userProfileImage" id="userProfileImage" class="form-control" placeholder="Photo" type="file" enctype="multipart/form-data">

                        </div>



                        <div class="col-md-12 offset-11 mt-2">
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