<?php

if (!isset($_SESSION['is_logged_in'])) {
    die('Você tem que esta logado ou não tem permissão para acessar');
}
if ($_SESSION['user_data']['admin'] != 1) {
    die('Você tem que esta logado ou não tem permissão para acessar');
}

?>
<div class="panel-body">
  <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
      <label for="pesquisa"> </label>
      <input type="text" autofocus name="pesquisa" size ="60" maxlength=50  placeholder="Pesquisar por nome:" />
      <input type="submit" name="submit" class="btn btn-primary" value="pesquisar">
      <input type="submit" name="submit" class="btn btn-primary" value="Novo Contato">
    </div>
  </form>
</div>
<table  class="table table-striped table-bordered table-hover table-condensed">

  <thead>
    <tr bgcolor="MidnightBlue" foreground-color>
      <th><font color="white"> # </font></th>
      <th><font color="white">Nome:</font></th>
      <th><font color="white">telefone:</font></th>
      <th><font color="white">setor:</font></th>
      <th><font color="white">E-mail:</font></th>
      <th><font color="white">Acoes:</font></th>
    </tr>
  </thead>

  <?php
    foreach ($viewmodel['contatos'] as $item): ?>
    <tbody>
    <tr>
      <td width="5%"><?php echo $item['codigo']; ?></td>
      <td width="25%"><?php echo $item['nome']; ?></td>
      <td width="15%"><?php echo $item['fone1']; ?></td>
      <td width="20%"><?php echo $item['setor']; ?></td>
      <td width="20%"><?php echo $item['email']; ?></td>
      <td width="15%">
        <?php echo "<a href='". ROOT_URL ."contato/editar/" . $item['codigo'] . "'>Editar</a>"; ?>
        <?php echo "<a href='". ROOT_URL ."contato/" . $item['codigo'] . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
      </td>
    </tr>
  </tbody>

  <?php endforeach; ?>

</table>

</div>
