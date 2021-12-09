<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-4 offset-4">
            <h4>Loggin</h4><hr>
            <form action="">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Entrez votre email">
                </div>
                <div class="form-group">
                    <label for="">Mot de passe</label>
                    <input type="text" class="form-control" name="password" placeholder="Entrez votre mot de passe">
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-primary " type="submit">Sign In</button>
                </div>
                <a href="<?= base_url('auth/register'); ?>">Je n'ai pas de compte  </a>
            </form>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
</body>
</html>