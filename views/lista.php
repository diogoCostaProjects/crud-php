<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <?php include 'imports.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 class="alert alert-info">Lista de usuários</h2>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model as $u) : ?>
                    <tr>
                        <td><?php echo $u->id; ?></td>
                        <td><?php echo $u->name; ?></td>
                        <td><?php echo $u->email; ?></td>
                        <td><button class="btn btn-primary btnEdit" data-nome="<?= $u->name ?>" data-email="<?= $u->email ?>" data-id="<?= $u->id ?>">Editar</button> <button class="btn btn-danger">Excluir</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <hr>
        <div class="edit card">
            <h3 class="alert alert-success">Edição do usuário <span id="userName"></span></h3>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nomeEdit" class="form-action">

            <label for="email">Email</label>
            <input type="text" name="email" id="emailEdit" class="form-action">

            <div class="col-md-12">
                <button class="btn btn-primary btn-block" id="save"> Salvar</button>
                <button class="btn btn-danger btn-block" id="cancel"> Cancelar</button>
            </div>
        </div>
    </div>
</body>

</html>