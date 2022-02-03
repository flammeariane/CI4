<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition livre</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css'); ?>">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            update livre
                            <a href="<?= base_url('dashboardUser') ?>" class=" btn btn-danger float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('dashboardUser/updateBook/' . $book->isbn) ?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>isbn</label>
                                        <input type="text" name="isbn" value="<?= $book->isbn ?>" class="form-control" placeholder="Entrez votre Prénom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>titre</label>
                                        <input type="text" name="title" value="<?= $book->title ?>" class="form-control" placeholder="Entrez votre nom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Année d"édition</label>
                                        <input type="text" name="edition_year" value="<?= $book->edition_year ?>" class="form-control" placeholder="Entrez votre email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Langue</label>
                                        <input type="text" name="language" value="<?= $book->language ?>" class="form-control" placeholder="Entrez votre mot de passe">
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