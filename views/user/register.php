<?php
  if(!isset($_SESSION['is_logged_in'])) {
    die('Você tem que esta logado para acessar');
  }
  if($_SESSION['user_data']['admin']!=True) {
      die('Você não tem permissão para acessar');
  }

$_SESSION['last_submit'] = $_POST;

$nome = '';
$usuario = '';
$email = '';

if (isset($_SESSION['last_submit']['nome']))
{
   $nome = $_SESSION['last_submit']['nome'];
   $usuario = $_SESSION['last_submit']['usuario'];
   $email = $_SESSION['last_submit']['email'];
   unset($_SESSION['last_submit']);
}
?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Registrar Usuário</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="pesquisa">Pesquisar: </label>
        <input type="text"  name="pesquisa" size ="40" maxlength=50  placeholder="Pesquisar por nome:" />
        <input type="submit" name="submit" class="btn btn-primary" value="pesquisar">
      </div>

      <div class="form-group">
    		<label>Nome</label>
    		<input type="text" name="nome" autofocus class="form-control" value = "<?php echo $nome;?> ">
    	</div>
    	<div class="form-group">
    		<label>Usuário</label>
    		<input type="text" name="usuario" class="form-control" value = "<?php echo $usuario;?>">
    	</div>
      <div class="form-group">
    		<label>Email</label>
    		<input type="text" name="email" class="form-control" value = "<?php echo $email;?>">
    	</div>
      <div class="form-group">
    		<label></label>
        <input type="checkbox" name="admin" value= "1" unchecked> Administrador
    	</div>
    	<div class="form-group">
    		<label>Password</label>
    		<input type="password" name="password" class="form-control" />
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Salvar" />
    </form>
  </div>
</div>
</div>

  <?php if (isset($viewmodel)): ?>
    <table  class="table table-striped table-bordered table-hover table-condensed">
      <thead>
        <tr bgcolor="MidnightBlue" foreground-color>
          <th><font color="white"> # </font></th>
          <th><font color="white">Nome:</font></th>
          <th><font color="white">usuario:</font></th>
          <th><font color="white">Acoes:</font></th>
        </tr>
      </thead>
    <?php foreach($viewmodel as $value): ?>
      <tbody>
      <tr>
        <td width="5%"><?php echo  $value['id']; ?></td>
        <td width="25%"><?php echo $value['nome']; ?></td>
        <td width="15%"><?php echo $value['usuario']; ?></td>
        <td width="15%">
          <?php echo "<a href= '" . ROOT_URL ."user/editar/" . $value['id'] . "'>Editar</a>"; ?>
          <?php echo "<a href= '" . ROOT_URL ."user/register/" . $value['id'] . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
        </td>
      </tr>
    </tbody>
    <?php endforeach; ?>
    </table>
<?php endif; ?>


<script type="text/javascript">
document.addEventListener('keydown', function (event) {
    if (event.keyCode == 13)
       event.preventDefault();
});
</script>
