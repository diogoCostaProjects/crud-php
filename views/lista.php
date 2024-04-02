<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'imports.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="alert alert-info">Lista de usuários</h1>


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model as $u) : ?>
                <tr>
                    <td><?php echo $u->id; ?></td>
                    <td><?php echo $u->name; ?></td>
                    <td><?php echo $u->email; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>