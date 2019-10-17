<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Login do Usuário</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" name="usuario" class="form-control" />
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
        </form>
    </div>
</div>
