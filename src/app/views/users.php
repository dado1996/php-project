<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>Users</title>
</head>

<body>
    <h1>Users:</h1>

    <table class="table table-striped">
        <tr>
            <th>
                #
            </th>
            <th>
                ID
            </th>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
        </tr>

        <?php  if (!$users): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <?php foreach ($users as $id => $row) : ?>
            <tr>
                <td>
                    <?= $id + 1 ?>
                </td>
                <td>
                    <?= $row['personal_id'] ?>
                </td>
                <td>
                    <?= $row['name'] ?>
                </td>
                <td>
                    <?= $row['email'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr />
    
    <a href="/users/create">Create a new user</a>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>