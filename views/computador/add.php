<?php
if (!isset($_SESSION['is_logged_in'])) {
    die('Você tem que esta logado para acessar');
}
if ($_SESSION['user_data']['admin'] != 1) {
    die('Você não tem permissão para acessar');
}
  
$_SESSION['last_submit'] = $_POST;
$setor ='';
$usuario = '';
$cpf = '';
$email = '';
$cidade = '';
$nome_computador = '';
$patrimonio_cpu = '';
$numero_serie_cpu = '';
$patrimonio_monitor1 = '';
$numero_serie_monitor1 = '';
$patrimonio_monitor2 = '';
$numero_serie_monitor2 = '';
$ip_1 = '';
$ip_2 = '';
$mac_1 = '';
$mac_2 = '';
$status = '';
$so = '';
$data_recebimento = '';
$senha = '';
$senha_setup = '';
$tipo = '';
$marca_modelo = '';
$observacao = '';


if (isset($_SESSION['last_submit']['nome_computador']))
{
    $setor = $_SESSION['last_submit']['setor'];
    $usuario = $_SESSION['last_submit']['usuario'];
    $cpf = $_SESSION['last_submit']['cpf'];
    $email = $_SESSION['last_submit']['email'];
    $cidade = $_SESSION['last_submit']['cidade'];
    $nome_computador = $_SESSION['last_submit']['nome_computador'];
    $patrimonio_cpu = $_SESSION['last_submit']['patrimonio_cpu'];
    $numero_serie_cpu = $_SESSION['last_submit']['numero_serie_cpu'];
    $patrimonio_monitor1 = $_SESSION['last_submit']['patrimonio_monitor1'];
    $numero_serie_monitor1 = $_SESSION['last_submit']['numero_serie_monitor1'];
    $patrimonio_monitor2 = $_SESSION['last_submit']['patrimonio_monitor2'];
    $numero_serie_monitor2 = $_SESSION['last_submit']['numero_serie_monitor2'];
    $ip_1 = $_SESSION['last_submit']['ip_1'];
    $ip_2 = $_SESSION['last_submit']['ip_2'];
    $mac_1 = $_SESSION['last_submit']['mac_1'];
    $mac_2 = $_SESSION['last_submit']['mac_2'];
    $status = $_SESSION['last_submit']['status'];
    $so = $_SESSION['last_submit']['so'];
    $data_recebimento = $_SESSION['last_submit']['data_recebimento'];
    $senha = $_SESSION['last_submit']['senha'];
    $senha_setup = $_SESSION['last_submit']['senha_setup'];
    $tipo = $_SESSION['last_submit']['tipo'];
    $marca_modelo = $_SESSION['last_submit']['marca_modelo'];
    $observacao = $_SESSION['last_submit']['observacao'];
   unset($_SESSION['last_submit']);
}
?>


  <div class="panel-heading">
    <h3 class="panel-title">Novo Computador</h3>
  </div>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<fieldset>
 <table class="table table-condensed"">
  <tr >
  <td >  
    <label for="nome">Setor</label> <br>
    <select name="setor" autofocus> 
      <option value="SETOR1">SETOR1</option> 
      <option value="SETOR2">SETOR2</option> 
      <option value="SETOR3">SETOR3</option> 
      <option value="SETOR4">SETOR4</option> 
      <option value="SETOR5">SETOR5</option> 
      <option value="SETOR6">SETOR6</option> 
      <option value="SETOR7">SETOR7</option> 
      <option value="SETOR8">SETOR8</option> 
      <option value="SETOR9">SETOR9</option> 
      <option value="SETOR10">SETOR10</option> 
      <option value="SETOR11">SETOR11</option> 
      <option value="SETOR12">SETOR12</option> 
      <option value="TREINAMENTO">TREINAMENTO</option> 
      <option value="RESERVA">RESERVA</option> 
      <option value=" SETOR13">SETOR13</option> 
      <option value=" CPD">CPD</option> 
    </select>
  </td>
  
  <td > 
    <label for="Usuario">Usuario </label>
    <input type="text" required maxlength="100" name="usuario"> 
  </td>
    
  <td align="left"> 
    <label for="CPF">CPF </label> 
    <input type="text" maxlength="20" name="cpf" > 
  </td>
  
    
  <td align="left"> 
    <label for="E-mail">E-mail </label>
    <input type="text" maxlength="50" name="email" > 
  </td>

     
  <td align="left"> 
    <label for="nome_computador">Nome do computador </label>
    <input type="text" required style="text-transform:uppercase" maxlength="20" name="nome_computador"> 
  </td>
  <td> </td>
  
  </tr>
  <tr>
    
  <td align="left"> 
    <label for="patrimonio_cpu">Patrimônio CPU </label>
    <input type="text" maxlength="20" name="patrimonio_cpu" > 
  </td>

    
  <td align="left"> 
    <label for="numero_serie_cpu">NS CPU </label>
    <input type="text" style="text-transform:uppercase" maxlength="20" name="numero_serie_cpu"> 
  </td>
  <td align="left"> 
    <label for="patrimonio_monitor1">Patrimônio Monitor1 </label>
    <input type="text" maxlength="20" name="patrimonio_monitor1"> 
  </td>
  <td align="left"> 
    <label for="numero_serie_monitor1">NS Monitor1 </label>
    <input type="text" style="text-transform:uppercase" maxlength="20" name="numero_serie_monitor1" > 
  </td>

  <td align="left"> 
    <label for="patrimonio_monitor2">Patrimônio Monitor2 </label>
    <input type="text" maxlength="20" name="patrimonio_monitor2" >
  </td>

    
  <td align="left"> 
    <label for="numero_serie_monitor2">NS Monitor2 </label>
    <input type="text" style="text-transform:uppercase" maxlength="20" name="numero_serie_monitor2" > 
  </td>

  
 </tr>
 <tr>
 <td align="left"> 
    <label for="ip_1">IP 1 </label>
    <input type="text" maxlength="20" name="ip_1" > 
  </td>
  <td align="left"> 
    <label for="ip_1">IP 2 </label>
    <input  type="text" maxlength="20" name="ip_2" > 
  </td>

  <td align="left"> 
    <label for="mac_1">MAC 1 </label>
    <input id="mac"  id= "mac1" type="text" style="text-transform:uppercase" maxlength="20" name="mac_1" > 
  </td>
  
  <td align="left"> 
    <label for="mac_2">MAC 2 </label>
    <input type="text" id= "mac2" style="text-transform:uppercase" maxlength="20" name="mac_2" > 
  </td> 

  <td align="left"> 
    <label for="nome">Status</label> <br>
    <select name="status"> 
      <option value="HABILITADA" >HABILITADA</option> 
      <option value="DESABILITADA">DESABILITADA</option> 
    </select>
  </td> 

  <td align="left"> 
    <label for="so">SO</label> <br>
    <select name="so"> 
      <option  value="WINDOWS 7">WINDOWS 7</option> 
      <option value="WINDOWS 8" >WINDOWS 8</option> 
      <option value="WINDOWS 10">WINDOWS 10</option> 
      <option value="WINDOWS XP">WINDOWS XP</option> 
    </select>
  </td> 

 </tr>
<tr>
  <td align="left"> 
    <label for="data_recebimento">Data recebimento </label>
    <input type="text" maxlength="20" name="data_recebimento" > 
  </td> 
  <td align="left"> 
    <label for="senha">Senha </label>
    <input type="text" maxlength="30" name="senha" > 
  </td> 
  <td align="left"> 
    <label for="senha_setup">Senha setup </label>
    <input type="text" maxlength="30" name="senha_setup"> 
  </td> 

  <td align="left"> 
    <label for="tipo">Tipo</label> <br>
    <select name="tipo"> 
      <option value="Padrão" >Padrão</option> 
      <option value="Movel" >Movel</option> 
      <option value="Desktop">Desktop</option> 
      <option value="Notebook">Notebook</option> 
      <option value="Ultrabook">Ultrabook</option> 
      <option value="Tablet">Tablet</option> 
      <option value="Servidor">Servidor</option> 
      <option value="Switch">Switch</option> 
      <option value="Videoconferência">Videoconferência</option> 
      <option value="Acelerador">Acelerador</option> 
      <option value="Câmera">Câmera</option> 
      <option value="Roteador">Roteador</option> 
      <option value="Acess Point">Acess Point</option> 
      <option value="Acess Point">Impressora</option> 
      <option value="Acess Point">Scanner</option> 
    </select>
  </td> 
  <td> 
    <label for="marca_modelo">Equipamento</label> <br>
    <select name="marca_modelo" > 
      <?php foreach ($viewmodel as $item):
           $selecionado = '';
        ?>     
         <?php echo "<option value='" . $item['id'] . "' " . $selecionado . " >" . 
           $item['nome']  .  "</option>";?>
      <?php endforeach;?>     
   </select>
   </td>


  <td align="left"> 
    <label for="cidade">Cidade</label> <br>
    <select name="cidade" > 
      <option value="ANAPOLIS">ANAPOLIS</option> 
      <option value="CERES">CERES</option> 
      <option value="FORMOSA">FORMOSA</option> 
      <option value="LUZIANIA">LUZIANIA</option> 
      <option value="URUACU">URUACU</option> 
    </select>
   <td> 

</tr>
 </table>
 <table class="table-borderless table-condensed" cellspacing="20">
 <tr>
  <td>
    <label for="observacao">Observação </label> 
    <br>
    <textarea rows="4" cols="100" name="observacao"> </textarea>   
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
