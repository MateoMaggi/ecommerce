<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include("../php/conexion_be.php");

// Consultar datos de la tabla
$sql = "SELECT * FROM usuarios";
$query = mysqli_query($conexion, $sql);

// Crear nuevo archivo de Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Escribir encabezados
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nombre Completo');
$sheet->setCellValue('C1', 'Usuario');
$sheet->setCellValue('D1', 'Contraseña');
$sheet->setCellValue('E1', 'Correo');

// Escribir datos
$rowNumber = 2; // Empezar en la segunda fila
while ($row = mysqli_fetch_assoc($query)) {
    $sheet->setCellValue('A' . $rowNumber, $row['id']);
    $sheet->setCellValue('B' . $rowNumber, $row['nombre_completo']);
    $sheet->setCellValue('C' . $rowNumber, $row['usuario']);
    $sheet->setCellValue('D' . $rowNumber, $row['contrasena']);
    $sheet->setCellValue('E' . $rowNumber, $row['correo']);
    $rowNumber++;
}

// Crear archivo Excel
$writer = new Xlsx($spreadsheet);
$filename = 'usuarios.xlsx';

// Enviar el archivo Excel al navegador para descarga
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'. $filename .'"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
?>
