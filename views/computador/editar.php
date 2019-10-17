<?php
if (!isset($_SESSION['is_logged_in'])) {
    die('Você tem que esta logado para acessar');
}
if ($_SESSION['user_data']['admin'] != 1) {
    die('Você não tem permissão para acessar');
}
  
//print_r($viewmodel);
?>

 <div class="panel-heading">
   <h3 class="panel-title">Editar Computador</h3>
 </div>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<fieldset>
 <table class="table table-condensed"">
  <tr >
  <td >  
    <label for="nome">Setor</label> <br>
    <select name="setor"> 
      <option value="SETOR1" <?php echo selected( 'SETOR1', $viewmodel['computador']['setor']); ?>>SETOR1</option> 
      <option value="SETOR2" <?php echo selected( 'SETOR2', $viewmodel['computador']['setor']); ?>>SETOR2</option> 
      <option value="SETOR3" <?php echo selected( 'SETOR3', $viewmodel['computador']['setor']); ?>>SETOR3</option> 
      <option value="SETOR4" <?php echo selected( 'SETOR4', $viewmodel['computador']['setor']); ?>>SETOR4</option> 
      <option value="SETOR5" <?php echo selected( 'SETOR5', $viewmodel['computador']['setor']); ?>>SETOR5</option> 
      <option value="SETOR6" <?php echo selected( 'SETOR6', $viewmodel['computador']['setor']); ?>>SETOR6</option> 
      <option value="SETOR7" <?php echo selected( 'SETOR7', $viewmodel['computador']['setor']); ?>>SETOR7</option> 
      <option value="SETOR8" <?php echo selected( 'SETOR8', $viewmodel['computador']['setor']); ?>>SETOR8</option> 
      <option value="SETOR9"<?php echo selected( 'SETOR9', $viewmodel['computador']['setor']); ?>>SETOR9</option> 
      <option value="SETOR10"<?php echo selected( 'SETOR10', $viewmodel['computador']['setor']); ?>>SETOR10</option> 
      <option value="SETOR11" <?php echo selected( 'SETOR11', $viewmodel['computador']['setor']); ?>>SETOR11</option> 
      <option value="SETOR12" <?php echo selected( 'SETOR12', $viewmodel['computador']['setor']); ?>>SETOR12</option> 
      <option value="TREINAMENTO" <?php echo selected( 'TREINAMENTO', $viewmodel['computador']['setor']); ?>>TREINAMENTO</option> 
      <option value="RESERVA"<?php echo selected( 'RESERVA', $viewmodel['computador']['setor']); ?>>RESERVA</option> 
      <option value="SETOR13"<?php echo selected( 'SETOR13', $viewmodel['computador']['setor']); ?>>SETOR13</option> 
      <option value="CPD"<?php echo selected( 'CPD', $viewmodel['computador']['setor']); ?>>CPD</option> 
    </select>
  </td>
  
  <td > 
    <label for="Usuario">Usuario </label>
    <input type="text" required maxlength="100" name="usuario" value = "<?php echo $viewmodel['computador']['usuario'];?>"> 
  </td>
    
  <td align="left"> 
    <label for="CPF">CPF </label> 
    <input type="text" maxlength="20" name="cpf" value = "<?php echo $viewmodel['computador']['cpf'];?>"> 
  </td>
  
    
  <td align="left"> 
    <label for="E-mail">E-mail </label>
    <input type="text" maxlength="50" name="email" value = "<?php echo $viewmodel['computador']['email'];?>"> 
  </td>

     
  <td align="left"> 
    <label for="nome_computador">Nome do computador </label>
    <input type="text" required style="text-transform:uppercase" maxlength="20" name="nome_computador" value = "<?php echo $viewmodel['computador']['nome_computador'];?>"> 
  </td>
  <td> </td>
  
  </tr>
  <tr>
    
  <td align="left"> 
    <label for="patrimonio_cpu">Patrimônio CPU </label>
    <input type="text" maxlength="20" name="patrimonio_cpu" value = "<?php echo $viewmodel['computador']['patrimonio_cpu'];?>"> 
  </td>
    
  <td align="left"> 
    <label for="numero_serie_cpu">NS CPU </label>
    <input type="text" maxlength="20" style="text-transform:uppercase" name="numero_serie_cpu" value = "<?php echo $viewmodel['computador']['numero_serie_cpu'];?>"> 
  </td>
  <td align="left"> 
    <label for="patrimonio_monitor1">Patrimônio Monitor1 </label>
    <input type="text" maxlength="20" name="patrimonio_monitor1" value = "<?php echo $viewmodel['computador']['patrimonio_monitor1'];?>"> 
  </td>
  <td align="left"> 
    <label for="numero_serie_monitor1">NS Monitor1 </label>
    <input type="text" maxlength="20" style="text-transform:uppercase" name="numero_serie_monitor1" value = "<?php echo $viewmodel['computador']['numero_serie_monitor1'];?>"> 
  </td>

  <td align="left"> 
    <label for="patrimonio_monitor2">Patrimônio Monitor2 </label>
    <input type="text" maxlength="20" style="text-transform:uppercase" name="patrimonio_monitor2" value = "<?php echo $viewmodel['computador']['patrimonio_monitor2'];?>">
  </td>

    
  <td align="left"> 
    <label for="numero_serie_monitor2">NS Monitor2 </label>
    <input type="text" maxlength="20" name="numero_serie_monitor2" value = "<?php echo $viewmodel['computador']['numero_serie_monitor2'];?>"> 
  </td>

  
 </tr>
 <tr>
 <td align="left"> 
    <label for="ip_1">IP 1 </label>
    <input type="text" maxlength="20" "  name="ip_1" value = "<?php echo $viewmodel['computador']['ip_1'];?>"> 
  </td>
  <td align="left"> 
    <label for="ip_2">IP 2 </label>
    <input type="text" maxlength="20" name="ip_2" value = "<?php echo $viewmodel['computador']['ip_2'];?>"> 
  </td>

  <td align="left"> 
    <label for="mac_1">MAC 1 </label>
    <input type="text"  id= "mac1" style="text-transform:uppercase" name="mac_1"  value = "<?php echo $viewmodel['computador']['mac_1'];?>"> 
  </td>
  
  <td align="left"> 
    <label for="mac_2">MAC 2 </label>
    <input type="text" maxlength="20" id= "mac2" name="mac_2" style="text-transform:uppercase" value = "<?php echo $viewmodel['computador']['mac_2'];?>"> 
  </td> 

  <td align="left"> 
    <label for="nome">Status</label> <br>
    <select name="status"> 
      <option value="HABILITADA" <?php echo selected( 'HABILITADA', $viewmodel['computador']['status']); ?>>HABILITADA</option> 
      <option value="DESABILITADA" <?php echo selected( 'DESABILITADA', $viewmodel['computador']['status']); ?>>DESABILITADA</option> 
    </select>
  </td> 

  <td align="left"> 
    <label for="so">SO</label> <br>
    <select name="so"> 
      <option  value="WINDOWS 7" <?php echo selected('WINDOWS 7', $viewmodel['computador']['so']); ?>>WINDOWS 7</option> 
      <option value="WINDOWS 8" <?php echo selected('WINDOWS 8', $viewmodel['computador']['so']); ?>>WINDOWS 8</option> 
      <option value="WINDOWS 10" <?php echo selected('WINDOWS 10', $viewmodel['computador']['so']); ?>>WINDOWS 10</option> 
      <option value="WINDOWS XP" <?php echo selected( 'WINDOWS XP', $viewmodel['computador']['so']); ?>>WINDOWS XP</option> 
    </select>
  </td> 

 </tr>
<tr>
  <td align="left"> 
    <label for="data_recebimento">Data recebimento </label>
    <input type="date"  maxlength="20" name="data_recebimento" value = "<?php echo $viewmodel['computador']['data_recebimento'];?>"> 
  </td> 
  <td align="left"> 
    <label for="senha">Senha </label>
    <input type="text" maxlength="30" name="senha" value = "<?php echo $viewmodel['computador']['senha'];?>"> 
  </td> 
  <td align="left"> 
    <label for="senha_setup">Senha setup </label>
    <input type="text" maxlength="30" name="senha_setup" value = "<?php echo $viewmodel['computador']['senha_setup'];?>"> 
  </td> 

  <td align="left"> 
    <label for="tipo">Tipo</label> <br>
    <select name="tipo"> 
      <option value="Padrão" <?php echo selected('Padrão', $viewmodel['computador']['tipo']); ?>>Padrão</option> 
      <option value="Movel" <?php echo selected('Movel', $viewmodel['computador']['tipo']); ?>>Movel</option> 
      <option value="Desktop" <?php echo selected('Desktop', $viewmodel['computador']['tipo']); ?>>Desktop</option> 
      <option value="Notebook" <?php echo selected('Notebook', $viewmodel['computador']['tipo']); ?>>Notebook</option> 
      <option value="Ultrabook" <?php echo selected('Ultrabook', $viewmodel['computador']['tipo']); ?>>Ultrabook</option> 
      <option value="Tablet" <?php echo selected( 'Tablet', $viewmodel['computador']['tipo']); ?>>Tablet</option> 
      <option value="Servidor" <?php echo selected( 'Servidor', $viewmodel['computador']['tipo']); ?>>Servidor</option> 
      <option value="Switch" <?php echo selected( 'Switch', $viewmodel['computador']['tipo']); ?>>Switch</option> 
      <option value="Videoconferência" <?php echo selected( 'Videoconferência', $viewmodel['computador']['tipo']); ?>>Videoconferência</option> 
      <option value="Acelerador" <?php echo selected( 'Acelerador', $viewmodel['computador']['tipo']); ?>>Acelerador</option> 
      <option value="Câmera" <?php echo selected( 'Câmera', $viewmodel['computador']['tipo']); ?>>Câmera</option> 
      <option value="Roteador" <?php echo selected( 'Roteador', $viewmodel['computador']['tipo']); ?>>Roteador</option> 
      <option value="Acess Point" <?php echo selected( 'Acess Point', $viewmodel['computador']['tipo']); ?>>Acess Point</option> 
      <option value="Acess Point" <?php echo selected( 'Impressora', $viewmodel['computador']['tipo']); ?>>Impressora</option> 
      <option value="Acess Point" <?php echo selected( 'Scanner', $viewmodel['computador']['tipo']); ?>>Scanner</option> 

    </select>
  </td> 
  <td> 
    <label for="marca_modelo">Equipamento</label> <br>
    <select name="marca_modelo" > 
      <?php foreach ($viewmodel['marca_modelo'] as $key =>$value): 
          $selecionado = selected($viewmodel['marca_modelo'][$key]['id'],  $viewmodel['computador']['marca_modelo']);   ?> 
         <?php echo "<option value='" . $viewmodel['marca_modelo'][$key]['id'] . "' " . $selecionado . " >" . 
           $viewmodel['marca_modelo'][$key]['nome']  .  "</option>";?>
      <?php endforeach; ?>
  </select>
   </td>


  <td align="left"> 
    <label for="cidade">Cidade</label> <br>
    <select name="cidade" > 
      <option value="ANAPOLIS" <?php echo selected('ANAPOLIS', $viewmodel['computador']['cidade']); ?>>ANAPOLIS</option> 
      <option value="CERES" <?php echo selected('CERES', $viewmodel['computador']['cidade']); ?>>CERES</option> 
      <option value="FORMOSA" <?php echo selected('FORMOSA', $viewmodel['computador']['cidade']); ?>>FORMOSA</option> 
      <option value="LUZIANIA" <?php echo selected('LUZIANIA', $viewmodel['computador']['cidade']); ?>>LUZIANIA</option> 
      <option value="URUACU" <?php echo selected('URUACU', $viewmodel['computador']['cidade']); ?>>URUACU</option> 
    </select>
   <td> 

</tr>
 </table>
 <table class="table-borderless table-condensed" cellspacing="20">
 <tr>
  <td>
    <label for="observacao">Observação </label> 
    <br>
    <textarea rows="4" cols="100" name="observacao"> <?php echo $viewmodel['computador']['observacao'];?></textarea>   
  </td> 
 </tr>    
  <td>
    <br>
    <input type="submit" class="btn btn-primary" name="submit" value="Salvar">
    <input type="reset" class="btn btn-primary" value="Limpar">
  </td>
  <tr>
 </tr>
</table>
 
</fieldset>
</form>

<script type="text/javascript">
document.addEventListener('keydown', function (event) {
    if (event.keyCode == 13)
       event.preventDefault();
});
</script>
