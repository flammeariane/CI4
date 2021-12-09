<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-4 offset-4">
            <h4>Créer un compte</h4><hr>
            <form action="<?= base_url('auth/save'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="form-group">
                    <label for="">Nom</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="">Prénom</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Entrez votre prénom">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Entrez votre email">
                </div>
                <div class="form-group">
                    <label for="">Mot de passe</label>
                    <input type="text" class="form-control" name="password" placeholder="Entrez votre mot de passe">
                </div>
                <div class="form-group">
                    <label for="">Confirmation mot de passe</label>
                    <input type="text" class="form-control" name="Cpassword" placeholder="Confirmez votre mot de passe">
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-primary" type="submit">Sign Up</button>
                </div>
                <a href="<?= base_url('auth');?>">J'ai deja un compte </a>
            
            </form>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
</body>
</html>