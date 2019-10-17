<?php

class HomeModel extends Model {

    public function Index() {
        $nome = '';
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $pesqisa = $post['submit'];

        if (($pesqisa == 'pesquisar') || ($pesqisa == 'Imprimir')):
            $nome = ' WHERE UPPER(' . $post['cbo_pesquisa'] . ')  LIKE ' . '"%' . mb_strtoupper($post['pesquisa'], 'UTF-8' ). '%"';
        endif;
        header('Content-type: text/html; charset=utf-8');

        $this->query("SELECT * FROM computadores  " . $nome . '  ORDER BY cidade, setor');
        $rows = $this->resultSet();
        if ($pesqisa == 'Imprimir'):
            $this->Imprimir($rows);
        endif; 
        
        return $rows;
    }

    public function Imprimir($rows) {

       // $this->query("SELECT * FROM computadores  ORDER BY cidade, setor");
       // $rows = $this->resultSet();

        $cidade = '';
        $setor = '';

        $pdf = new FPDF();

        $pdf->SetMargins(5, 5);
        $pdf->AddPage('L');
        $pdf->SetFont("Arial", 'B', 12); //Define a fonte a ser utilizada 
        // Cabecalho
        //$pdf->Image("images/image001.jpg", 10, 6, 30);
        // Move to the right
        // Title
        $pdf->Cell(30, 10, utf8_decode('Listagem de Computadores Casdastrados '), 0, 0, 'L');
        // Line break
        $pdf->Ln(10);

        $pdf->SetFillColor(255, 255, 0);
        $pdf->SetTextColor(0);

        $pdf->SetFont('Arial', '', 7);

        // criando os cabeçalhos
        $pdf->Cell(40, 4, 'Usuario', 1, 0, 'L', true);
        $pdf->Cell(25, 4, 'Nome', 1, 0, 'L', true);
        $pdf->Cell(25, 4, 'Pat CPU', 1, 0, 'L', true);
        $pdf->Cell(25, 4, 'NS CPU', 1, 0, 'L', true);
        $pdf->Cell(25, 4, 'Pat Monitor1', 1, 0, 'L', true);
        $pdf->Cell(25, 4, 'NS Monitor1', 1, 0, 'L', true);
        $pdf->Cell(25, 4, 'IP 1', 1, 0, 'L', true);
        $pdf->Cell(25, 4, 'MAC 1', 1, 0, 'L', true);
        $pdf->Cell(25, 4, 'Senha', 1, 0, 'L', true);
        $pdf->Cell(25, 4, 'status', 1, 0, 'L', true);

        $pdf->Ln(4);

        // montando a tabela com os dados 

        foreach ($rows as $row):
            if ($row['cidade'] <> $cidade) {
                $pdf->SetFont("Arial", 'B', 7);
                $pdf->Ln(3);
                $pdf->Cell(265, 4,'( '. $row['cidade'] . ' )', 1, 1, 'C', true);
                $pdf->SetFont('Arial', '', 7);
            }
            if ($row['setor'] <> $setor) {
                $pdf->SetFont("Arial", 'B', 7);
                $pdf->Ln(3);
                $pdf->Cell(265, 4, $row['setor'], 1, 1, 'C', true);
                $pdf->SetFont('Arial', '', 7);
            }
            $pdf->Cell(40, 4, $row['usuario'], 1, 0, 'L', false);
            $pdf->Cell(25, 4, $row['nome_computador'], 1, 0, 'L', false);
            $pdf->Cell(25, 4, $row['patrimonio_cpu'], 1, 0, 'L', false);
            $pdf->Cell(25, 4, $row['numero_serie_cpu'], 1, 0, 'L', false);
            $pdf->Cell(25, 4, $row['patrimonio_monitor1'], 1, 0, 'L', false);
            $pdf->Cell(25, 4, $row['numero_serie_monitor1'], 1, 0, 'L', false);
            $pdf->Cell(25, 4, $row['ip_1'], 1, 0, 'L', false);
            $pdf->Cell(25, 4, $row['mac_1'], 1, 0, 'L', false);
            $pdf->Cell(25, 4, $row['senha'], 1, 0, 'L',false);
            $pdf->Cell(25, 4, $row['status'], 1, 0, 'L', false);

            $pdf->Ln(4);
            $cidade = $row['cidade'];
            $setor = $row['setor'];
        endforeach;
        
        // exibindo o PDF
        $pdf->Output('', '', true);
    }

}
