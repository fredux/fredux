<?php

class Computador extends Controller {

    protected function Index() {
        $viewmodel = new ComputadorModel();
        $this->returnView($viewmodel->Index(), true);
    }

    protected function editar() {
        $viewmodel = new ComputadorModel();
        $this->returnView($viewmodel->editar(), true);
    }

    protected function add() {
        $viewmodel = new ComputadorModel();
        $this->returnView($viewmodel->add(), true);
    }
    protected function deletar() {
        $viewmodel = new ComputadorModel();
        $this->returnView($viewmodel->deletar(), true);
    }


}
