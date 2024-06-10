<?php
require('../fpdf/fpdf.php');
include("../php/conexion_be.php");

class PDF extends FPDF {
    // Header
    function Header() {
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'Lista de Usuarios',0,1,'C');
        $this->Ln(10);
        $this->Cell(10,10,'ID',1);
        $this->Cell(40,10,'Nombre Completo',1);
        $this->Cell(40,10,'Usuario',1);
        $this->Cell(50,10,'Contrasena',1);
        $this->Cell(50,10,'Correo',1);
        $this->Ln();
    }

    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Cargar datos
    function LoadData($conexion) {
        $sql = "SELECT * FROM usuarios";
        $result = mysqli_query($conexion, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // Tabla
    function BasicTable($data) {
        $this->SetFont('Arial','',12);
        foreach($data as $row) {
            $this->Cell(10,10,$row['id'],1);
            $this->Cell(40,10,$row['nombre_completo'],1);
            $this->Cell(40,10,$row['usuario'],1);
            $this->Cell(50,10,$row['contrasena'],1);
            $this->Cell(50,10,$row['correo'],1);
            $this->Ln();
        }
    }
}

// Crear PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$data = $pdf->LoadData($conexion);
$pdf->BasicTable($data);
$pdf->Output();
?>
