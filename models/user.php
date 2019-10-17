<?php

class UserModel extends Model {

    public function register() {
        // Sanitize POST
        if ($_GET['id'] >= '1') {
            $this->deletar($_GET['id']);
            return;
        }

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = md5($post['password']);
        $pesqisa = $post['submit'];
        if ($pesqisa == 'pesquisar') {
            $this->query('SELECT * FROM usuarios WHERE nome like  :nome');
            $this->bind(':nome', '%' . $post['pesquisa'] . '%');
            $row = $this->resultSet();
            if ($row) {
                return $row;
            }
            return;
        }
        // se tiver editando
        if ($post['submit']) {
            if ($post['usuario'] == '' || $post['nome'] == '' || $post['email'] == '' || $post['password'] == '') {
                Messages::setMsg('Por favor preencha todos os campos!', 'error');
                return;
            }

            $this->query('SELECT * FROM usuarios WHERE usuario = :usuario');
            $this->bind(':usuario', $post['usuario']);
            $row = $this->single();
            if ($row) {
                Messages::setMsg('Usuario já cadastrado', 'error');
                return;
            }


            // Insert into MySQL
            $this->query('INSERT INTO usuarios (nome,usuario, email,senha,  admin)
			               VALUES(:nome,:usuario, :email, :password, :admin)');
            $this->bind(':nome', $post['nome']);
            $this->bind(':usuario', $post['usuario']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            if (!isset($post['admin'])) {
                $this->bind(':admin', False);
            } else {
                $this->bind(':admin', True);
            }

            $this->execute();
            // Verify
            if ($this->lastInsertId()) {
                // Redirect
                header('Location: ' . ROOT_URL . 'user/register');
            }
        }
        return;
    }

    public function login() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $password = md5($post['password']);

        if ($post['submit']) {
            // Compare Login
            $this->query('SELECT * FROM usuarios WHERE usuario = :usuario AND senha= :password');
            $this->bind(':usuario', $post['usuario']);
            $this->bind(':password', $password);

            $row = $this->single();
            if ($row) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id" => $row['id'],
                    "name" => $row['nome'],
                    "usuario" => $row['usuario'],
                    "email" => $row['email'],
                    "admin" => $row['admin'],
                );
                header('Location: ' . ROOT_URL . 'home');
            } else {
                Messages::setMsg('Login incorreto', 'error');
            }
            return;
        }
    }

    public function deletar($id) {
        $this->query('DELETE FROM usuarios WHERE id =  :id');
        $this->bind(':id', $id);
        $this->execute();
        header('Location: ' . ROOT_URL . 'user/register');
    }

    public function editar() {
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['submit']) {
            if ($post['usuario'] == '' || $post['nome'] == '' || $post['email'] == '') {
                Messages::setMsg('Por favor preencha todos os campos!', 'error');
                return;
            }
            $nome = $post['nome'];
            $usuario = $post['usuario'];
            $email = $post['email'];
            $admin = $post['admin'];
            $password = $post['password'];
            $queryPass = '';
            if (trim($password) != ''):
                $password = md5($post['password']);
                $queryPass = ", senha ='$password' ";
            endif;

            if ($post['admin']):
                $admin = 1;
            else:
                $admin = 0;
            endif;
            $query = "UPDATE usuarios SET nome = '$nome', usuario = '$usuario',";
            $query .= " email = '$email', admin = '$admin' ";
            $query .= $queryPass . " WHERE id = '$id' ";
            $this->query($query);
            $this->execute();
        } else {
            $this->query('SELECT * FROM usuarios WHERE id = :id');
            $this->bind(':id', $_GET['id']);
            $row = $this->single();
            return $row;
        }
        header('Location: ' . ROOT_URL . 'user/register');
    }

}
