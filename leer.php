<?php 

// adding phpspreadsheet
require 'vendor/autoload.php';
require 'conexion.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;;

$file_name = 'hello world.xlsx';
$document = IOFactory::load($file_name);
$total_sheets = $document->getSheetCount();
$current_sheet = $document->getSheet(0);
$number_rows = $current_sheet->getHighestDataRow(); 
$letter = $current_sheet->getHighestColumn();
$numero_letra = Coordinate::columnIndexFromString($letter);

for($indice_fila = 1; $indice_fila <= $number_rows; $indice_fila++){
    
    for($indice_columna; $indice_columna <= $numero_letra; $indice_columna++){

    }
    
    $valorA = $current_sheet->getCellByColumnAndRow(1, $indice_fila);
    $valorB = $current_sheet->getCellByColumnAndRow($numero_letra, $indice_fila);
    $valorC = $current_sheet->getCellByColumnAndRow(3, $indice_fila);
    echo 'valorA: '.$valorA. ' valorB: '. $valorB. ' valorC: '. $valorC. '<br/>';
}
?>
