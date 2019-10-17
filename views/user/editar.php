<?php
if (!isset($_SESSION['is_logged_in'])) {
    die('Você tem que esta logado para acessar');
}
if ($_SESSION['user_data']['admin'] != True) {
    die('Você não tem permissão para acessar');
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Editar Usuário</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" autofocus class="form-control" value = "<?php echo $viewmodel['nome']; ?>" >
            </div>
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" name="usuario" class="form-control" value = "<?php echo $viewmodel['usuario']; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value = "<?php echo $viewmodel['email']; ?>">
            </div>
            <div class="form-group">
                <label></label>
                <?php if ($viewmodel['admin'] == true): ?>
                    <input type="checkbox" name="admin" value= "1" checked> Administrador
                <?php else: ?>
                    <input type="checkbox" name="admin" value= "1" unchecked> Administrador
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Salvar" />
        </form>
    </div>
</div>
</div>
