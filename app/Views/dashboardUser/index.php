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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>

</body>

</html>