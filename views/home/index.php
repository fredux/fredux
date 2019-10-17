<style type="text/css">
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #666;
        font-size: 12px
    }

    table#t01 {
        width: 100%; 
        border: 0px solid #666;

    }

    thead {
        background:url(images/bg-article.png)repeat-x; repeat-x left center;
        border-top: 1px solid #a5a5a5;
        border-bottom: 1px solid #a5a5a5;
        color:white;
    }
    tr:hover {
        background-color:black;
        color: white;
    }
    thead:hover {
        background-color: transparent;
        color: inherit;
    }
    tr {
        border: 1px solid #666;
    }
    td {
        border: 1px solid #666;
    }

    th {
        font-weight: normal;
        text-align: left;
    }
    th, td {
        padding: 0.1em 1em;
    }
    #menu ul {
        padding:0px;
        margin:0px;
        background-color:#00205b;
        list-style:none;
    }
    #menu ul li { display: inline; }
    #menu ul li a {
        padding: 2px 10px;
        display: inline-block;

        /* visual do link */
        background-color:#00205b;
        color: white;
        text-decoration: none;
        border-bottom:3px solid #00205b;
        .clear {
            zoom: 1;s
            display: block;
        }


    }</style>
    <?php
        $_SESSION['ultimo_submit'] = $_POST;
        $criterio = '';
        if(isset($_SESSION['ultimo_submit']['cbo_pesquisa'])):
           $criterio =  $_SESSION['ultimo_submit']['cbo_pesquisa'];
           unset($_SESSION['ultimo_submit']);
        endif;   
     ?>

<div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
        <div class="form-group">
            <select name="cbo_pesquisa" autofocus style="height: 28px;">
              <option value="usuario" <?=($criterio == 'usuario')?'selected':''?>>usuario</option>
              <option value="nome_computador" <?=($criterio=='nome_computador')?'selected':''?>>Nome do Computador</option>
              <option value="patrimonio_cpu" <?=($criterio=='patrimonio_cpu')?'selected':''?>>patrimonio CPU</option>
              <option value="patrimonio_monitor1"<?=($criterio== 'patrimonio_monitor1')?'selected':''?>>Patrimonio Monitor1</option>
              <option value="ip_1" <?=($criterio == 'ip_1')?'selected':''?>>IP</option>
              <option value="mac_1" <?=($criterio == 'mac_1')?'selected':''?>>MAC</option>
              <option value="setor" <?=($criterio == 'setor')?'selected':''?>>Setor</option>
              <option value="cidade" <?=($criterio == 'cidade')?'selected':''?>>Cidade</option>
              <option value="numero_serie_cpu" <?=($criterio == 'numero_serie_cpu')?'selected':''?>>Serie da CPU</option>
              <option value="numero_serie_monitor1" <?=($criterio == 'numero_serie_monitor1')?'selected':''?>>Serie do Monitor1</option>
		  
            </select>      

            <label for="pesquisa"> </label>
            <input type="text" autofocus name="pesquisa" size ="60" maxlength=50  placeholder="Pesquisar  - em branco busca todos" />
            <input type="submit" name="submit" class="btn btn-primary" value="pesquisar"/>
            <input type="submit" name="submit" class="btn btn-primary" value="Imprimir"/>
        </div>
    </form>
    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['admin'] = True): ?> 
        <form method="post" action="<?php echo ROOT_PATH . 'computador/add'; ?>">
         <div class="form-group">
                <input type="submit" name="novo_computador" class="btn btn-primary" value="Novo" />
            </div>  
       </form>
    <?php endif; ?> 

</div>

<div>
    <div >
        <nav  id="menu" >
            <ul>
                <li><a href="#ANAPOLIS">ANÁPOLIS</a></li>
                <li><a href="#CERES">CERES</a></li>
                <li><a href="#FORMOSA">FORMOSA</a></li>
                <li><a href="#LUZIANIA">LUZIÂNIA</a></li>
                <li><a href="#URUACU">URUAÇÚ</a></li>
            </ul>
        </nav>
    </div>
    <?php
    $cidade = '';
    $setor = '';
    foreach ($viewmodel as $item):
        if ($item['cidade'] <> $cidade) {
            echo '<table id="playlistTable">';
            echo '<p id = "' . $item['cidade'] . '"> <h3 style="background-color:#00205b; color:white;text-align:center">' . $item['cidade'] . '</h3></p>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Usuario</th>';
            echo '<th>Nome Computador</th>';
            echo '<th>Patrimonio CPU</th>';
            echo '<th>Pat. Monitor1</th>';
            echo '<th>Pat. Monitor2</th>';
            echo '<th>IP</th>';
            echo '<th>MAC</th>';
            echo '<th>Ações</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
        }
        if ($item['setor'] <> $setor) {
            echo '<thead>';
            echo '<tr>';
            echo '<td style="background-color:#00205b; color:white;">' . $item['setor'] . '</td>';
            echo '<td style="background-color:#00205b; color:white;"></td>';
            echo '<td style="background-color:#00205b; color:white;"></td>';
            echo '<td style="background-color:#00205b; color:white;"></td>';
            echo '<td style="background-color:#00205b; color:white;"></td>';
            echo '<td style="background-color:#00205b; color:white;"></td>';
            echo '<td style="background-color:#00205b; color:white;"></td>';
            echo '<td style="background-color:#00205b; color:white;"></td>';
            echo '</tr>';
            echo '</tr>';
            echo '</thead>';
        }
        echo '<tr>';
        echo '<td style= "width: 20%;">' . trim($item['usuario']) . '</td>';
        echo '<td>' . trim($item['nome_computador']) . '</td>';
        echo '<td>' . trim($item['patrimonio_cpu']) . '</td>';
        echo '<td>' . trim($item['patrimonio_monitor1']) . '</td>';
        echo '<td>' . trim($item['patrimonio_monitor2']) . '</td>';
        echo '<td>' . trim($item['ip_1']) . '</td>';
        echo '<td>' . trim($item['mac_1']) . '</td>';
        if (isset($_SESSION['is_logged_in']) && $_SESSION['user_data']['admin'] = True): 
            echo '<td> <a href="'. ROOT_URL .'computador/editar/' . $item['id'] . '">Editar</a>'; 
            echo '<a href="'. ROOT_URL .'computador/deletar/' . $item['id'] . '" onclick="return confirm(\'Deseja realmente deletar?\')"> Deletar</a>';
            echo '</td>';
        else:
            echo '<td></td>';
        endif;
        echo '</tr>';
        $cidade = $item['cidade'];
        $setor = $item['setor'];
        if ($item['cidade'] <> $cidade) {
            echo '</tbody>';
            echo '</table>';
        }
    endforeach;
    ?>
</tbody>
</table>


</div>
