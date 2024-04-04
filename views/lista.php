<!DOCTYPE html>
<html lang="pt-BR">


<head>
    <?php include 'imports.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2 class="alert alert-info"><i class="fa fa-user" aria-hidden="true"></i> Lista de usuários</h2>
    <div class="container">

        <hr>
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
                <?php foreach ($model as $key => $u) : ?>
                    <tr>
                        <td><?php echo $u->id; ?></td>
                        <td><?php echo $u->name; ?></td>
                        <td><?php echo $u->email; ?></td>
                        <td>
                            <button class="btn btn-primary btnEdit" data-nome="<?= $u->name ?>" data-email="<?= $u->email ?>" data-id="<?= $u->id ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
                            <button class="btn btn-danger removeBtn" data-id="<?= $u->id ?>"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
                            <button class="btn btn-success" data-id="<?= $u->id ?>" data-bs-toggle="modal" data-bs-target="#modalCor<?= $u->id ?>"><i class="fa fa-paint-brush" aria-hidden="true"></i> Cores</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="modalCor<?= $u->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cores do usuário <strong><?= $u->name ?></strong></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php foreach ($model2[$key] as $cor) : ?>

                                        <span style="padding: 20px; background-color:<?php echo strtolower($cor['name']) ?>"><?= $cor['name'] ?></span>
                                    <?php endforeach ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="col-md-12">
            <div class="col-md-04">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Novo Usuário</button>
            </div>
        </div>

        <hr>
        <div class="edit card">
            <h3 class="alert alert-success">Edição do usuário <strong><span id="userName"></span></strong></h3>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nomeEdit" class="form-control">

            <label for="email">Email</label>
            <input type="text" name="email" id="emailEdit" class="form-control">

            <div class="col-md-12">
                <button class="btn btn-primary btn-block" id="save"><i class="fa fa-save" aria-hidden="true"></i> Salvar</button>
                <button class="btn btn-danger btn-block" id="cancel"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
            </div>
        </div>
    </div>


    <!-- Modal Adicionar Usuário -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Novo usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container">
                    <div class="col-md-12">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nomeAdd" class="form-control">
                    </div>
                    <br>
                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="emailAdd" class="form-control">
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-2">
                        <p>Cores</p>
                    </div>
                    <?php foreach ($model3 as $cor_geral) : ?>
                        <li>
                            <label for="<?= $cor_geral['id'] ?>"><?= $cor_geral['name'] ?></label>
                            <input type="checkbox" name="cores[]" id="<?= $cor_geral['id'] ?>" value="<?= $cor_geral['id'] ?>">
                        </li>

                    <?php endforeach; ?>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="addBtn">Adicionar</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>