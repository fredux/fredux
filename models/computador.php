<?php

class ComputadorModel extends Model {

    public function Index() {
        return;
    }

    public function editar() {
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if ($post['submit']) {
        
            if ($post['setor']   == '' || 
                $post['usuario'] == '' ||
                $post['cidade']  == '' || 
                $post['nome_computador'] == '')
            {
                Messages::setMsg('Por favor preencha os campos obrigatorios!', 'error');
                return;
            }

            $setor = $post['setor'];
            $usuario = $post['usuario'];
            $cpf = $post['cpf'];
            $email = $post['email'];
            $nome_computador = $post['nome_computador'];
            $patrimonio_cpu = $post['patrimonio_cpu']; 
            $numero_serie_cpu = $post['numero_serie_cpu'];
            $patrimonio_monitor1 = $post['patrimonio_monitor1'];
            $numero_serie_monitor1 = mb_strtoupper($post['numero_serie_monitor1'], 'UTF-8' );
            $patrimonio_monitor2 = $post['patrimonio_monitor2'];
            $numero_serie_monitor2 = mb_strtoupper($post['numero_serie_monitor2'], 'UTF-8' );
            $ip_1 = $post['ip_1'];
            $ip_2 = $post['ip_2'];
            $mac_1 = mb_strtoupper($post['mac_1'], 'UTF-8' );
            $mac_2 = mb_strtoupper($post['mac_2'], 'UTF-8' );
            $status = $post['status'];
            $so = $post['so'];
            $data_recebimento = $post['data_recebimento'];
            $senha = $post['senha'];
            $senha_setup = $post['senha_setup'];
            $tipo = $post['tipo'];
            $marca_modelo = $post['marca_modelo'];
            $cidade = $post['cidade'];
            $observacao = $post['observacao'];


            $sql = "UPDATE computadores SET setor = '$setor', 
                                           usuario = '$usuario',
                                           cpf = '$cpf' ,
                                           email = '$email', 
                                           nome_computador= '$nome_computador',
                                           patrimonio_cpu = '$patrimonio_cpu', 
                                           numero_serie_cpu = '$numero_serie_cpu', 
                                           patrimonio_monitor1 = '$patrimonio_monitor1',
                                           numero_serie_monitor1= '$numero_serie_monitor1', 
                                           patrimonio_monitor2 = '$patrimonio_monitor2',
                                           numero_serie_monitor2 = '$numero_serie_monitor2',
                                           ip_1 = '$ip_1',ip_2 = '$ip_2',mac_1 = '$mac_1',mac_2 = '$mac_2',
                                           status = '$status', so = '$so',
                                           data_recebimento = '$data_recebimento',
                                           senha = '$senha',senha_setup = '$senha_setup',
                                           tipo = '$tipo', marca_modelo = '$marca_modelo',
                                           cidade = '$cidade', observacao = '$observacao'

                 WHERE id = '$id'";
            $this->query($sql);
         try {
			
            $this->execute();
		} catch (PDOException $e) {
            //Messages::setMsg(' Nome do computador já cadastrado - '. $e->getMessage(), 'error');
            Messages::setMsg(' Nome do computador já cadastrado ', 'error');
            $this->query('SELECT * FROM computadores WHERE id = :id');
            $this->bind(':id', $_GET['id']);
            $row['computador'] = $this->single();
            $this->query('SELECT * FROM  marca_modelo');
            $row['marca_modelo'] = $this->resultSet();
            return $row;
				
        }	
            
        } else {
            $this->query('SELECT * FROM computadores WHERE id = :id');
            $this->bind(':id', $_GET['id']);
            $row['computador'] = $this->single();
            $this->query('SELECT * FROM  marca_modelo');
            $row['marca_modelo'] = $this->resultSet();
            return $row;
        }
        header('Location: ' . ROOT_URL);


    }

    public function add() {

        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($post['submit'])) {
        
            if ($post['setor']   == '' || 
                $post['usuario'] == '' ||
                $post['cidade']  == '' || 
                $post['nome_computador'] == '')
            {
                Messages::setMsg('Por favor preencha os campos obrigatorios!', 'error');
                return;
            }

            $setor = $post['setor'];
            $usuario = $post['usuario'];
            $cpf = $post['cpf'];
            $email = $post['email'];
            $cidade = $post['cidade'];
            $nome_computador = $post['nome_computador'];
            $patrimonio_cpu = $post['patrimonio_cpu'];
            $numero_serie_cpu = $post['numero_serie_cpu'];
            $patrimonio_monitor1 = $post['patrimonio_monitor1'];
            $numero_serie_monitor1 = mb_strtoupper($post['numero_serie_monitor1'], 'UTF-8' );
            $patrimonio_monitor2 = $post['patrimonio_monitor2'];
            $numero_serie_monitor2 = mb_strtoupper($post['numero_serie_monitor2'], 'UTF-8' );
            $ip_1 = $post['ip_1'];
            $ip_2 = $post['ip_2'];
            $mac_1 = mb_strtoupper($post['mac_1'], 'UTF-8' );
            $mac_2 =  mb_strtoupper($post['mac_2'], 'UTF-8' );
            $status = $post['status'];
            $so = $post['so'];
            $data_recebimento = $post['data_recebimento'];
            $senha = $post['senha'];
            $senha_setup = $post['senha_setup'];
            $tipo = $post['tipo'];
            $marca_modelo = $post['marca_modelo'];
            $observacao = $post['observacao'];

            $this->query('SELECT * FROM computadores WHERE nome_computador = :nome_computador');
            $this->bind(':nome_computador', $post['nome_computador']);
            $row = $this->single();
            if ($row) {
                Messages::setMsg('computador já cadastrado', 'error');
                return $this->marcaModelo();
            }


            // Insert into MySQL
            $this->query('INSERT INTO computadores (setor,usuario, cpf, email, cidade, nome_computador,
                          patrimonio_cpu, numero_serie_cpu, patrimonio_monitor1, numero_serie_monitor1,
                           patrimonio_monitor2, numero_serie_monitor2,ip_1, ip_2, mac_1, mac_2, status, so,
                           data_recebimento,senha,senha_setup,tipo,marca_modelo,observacao)
                           VALUES(:setor,:usuario, :cpf, :email, :cidade, :nome_computador, :patrimonio_cpu, :numero_serie_cpu,
                                  :patrimonio_monitor1,:numero_serie_monitor1, :patrimonio_monitor2,:numero_serie_monitor2,:ip_1,:ip_2, :mac_1,:mac_2, :status,
                                  :so, :data_recebimento,:senha,:senha_setup,:tipo,:marca_modelo,:observacao)');
            
            $this->bind(':setor', $setor);
            $this->bind(':usuario', $usuario);
            $this->bind(':cpf', $cpf);
            $this->bind(':email', $email);
            $this->bind(':cidade', $cidade);
            $this->bind(':nome_computador', $nome_computador);
            $this->bind(':patrimonio_cpu', $patrimonio_cpu);
            $this->bind(':numero_serie_cpu', $numero_serie_cpu);
            $this->bind(':patrimonio_monitor1', $patrimonio_monitor1);
            $this->bind(':numero_serie_monitor1', $numero_serie_monitor1);
            $this->bind(':patrimonio_monitor2', $patrimonio_monitor2);
            $this->bind(':numero_serie_monitor2', $numero_serie_monitor2);
            $this->bind(':ip_1', $ip_1);
            $this->bind(':ip_2', $ip_2);
            $this->bind(':mac_1', $mac_1);
            $this->bind(':mac_2', $mac_2);
            $this->bind(':status', $status);
            $this->bind(':so', $so);
            $this->bind(':data_recebimento', $data_recebimento);
            $this->bind(':senha', $senha);
            $this->bind(':senha_setup', $senha_setup);
            $this->bind(':tipo', $tipo);
            $this->bind(':marca_modelo', $marca_modelo, PDO::PARAM_INT);
            $this->bind(':observacao', $observacao);

            $this->execute();
            // Verify
            if ($this->lastInsertId()) {
                // Redirect
                header('Location: ' . ROOT_URL);
            }
        return;
    } else {
        return $this->marcaModelo();
    }
}
 
    public function deletar() {

        if (!isset($_SESSION['is_logged_in'])) {
            die('Você tem que esta logado para acessar');
        }
        if ($_SESSION['user_data']['admin'] != 1) {
            die('Você não tem permissão para acessar');
        }
        
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        if (isset($id))
         {
            $this->query('DELETE FROM computadores WHERE id =  :id');
            $this->bind(':id', $id);
            $this->execute();
            header('Location: ' . ROOT_URL);
         }   
    }
	public function marcaModelo() {
        $this->query('SELECT * FROM  marca_modelo');
        $rows = $this->resultSet();
		return $rows;
	
	}
}
