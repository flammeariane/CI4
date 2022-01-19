<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>création compte</title>
    <!-- check pourquoi le php iclude ne fonctionne pas -->
    <link rel="stylesheet" href="CI4../../../assets/css/bootstrap.min.css">
</head>

<body class=" bg-gradient-primary">

    <div class="container">

        <div class="card border-0 shadow-lg my-5">
            <div class="card-body p-0">

                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <img src="<?php echo site_url('/public/register_img.jpg'); ?>" width="400px" class="mt-5" />

                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crée votre compte</h1>
                            </div>

                            <form action="<?= base_url('auth/save'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                                <?php endif ?>

                                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                                <?php endif ?>

                                <div class="form-group row">

                                    <div class="form-group row mb-2">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="firstname" class="form-control form-control-user" id="exampleFirstName" placeholder="Nom" value="<?= set_value('firstname'); ?>">
                                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'firstname') : '' ?></span>
                                        </div>


                                        <div class="col-sm-6">
                                            <input type="text" name="lastname" class="form-control form-control-user" id="exampleLastName" placeholder="Prénom" value="<?= set_value('lastname'); ?>">
                                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'lastname') : '' ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        <div class="col-sm-12">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Entrez votre email" value="<?= set_value('email'); ?>">
                                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-2">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Entrez votre mot de passe" value="<?= set_value('password'); ?>">
                                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                                        </div>


                                        <div class="col-sm-6">
                                            <input type="password" name="cpassword" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Confirmez votre mot de passe" value="<?= set_value('cpassword '); ?>">
                                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">

                                        <button class="btn btn-primary btn-user btn-block" type="submit">Sign Up</button>

                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth'); ?>">J'ai déjà un compte</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Mot de passe oublié </a>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'assets/js.php'; ?>


</body>

</html>


















</div>
</div>
</div>
</div>
</div>

</div>