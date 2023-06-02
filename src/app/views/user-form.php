<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>Create user form</title>
</head>

<body>
    <h1>Create User</h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="/users/create" method="POST">
        <div class="mb-3">
            <label for="personal_id" class="form-label">ID</label>
            <input type="text" id="personal_id" name="personal_id" placeholder="ID" class="form-control" />
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">User name</label>
            <input type="text" id="name" name="name" placeholder="Name" class="form-control" />
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">User email</label>
            <input type="email" name="email" id="email" placeholder="Email" class="form-control" />
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" />
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm password</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control" />
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>