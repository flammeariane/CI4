<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

</head>

<body>

    <div class="container">
        <div class="row" style="margin-top:45px;">
            <div class="col-md-4 offset-4">
                <h4>Loggin</h4>
                <hr>
                <form action="<?= base_url('auth/check') ?>" method='post'>
                    <?= csrf_field(); ?>
                    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail') ?></div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Entrez votre email" value="<?= set_value('email') ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Mot de passe</label>
                        <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-primary " type="submit">Sign In</button>
                    </div>
                    <a href="<?= base_url('auth/register'); ?>">Je n'ai pas de compte </a>
                </form>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</body>

</html>