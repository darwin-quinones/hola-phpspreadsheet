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

for($indice_fila = 2; $indice_fila <= 4; $indice_fila++){
    $valorA = trim($current_sheet->getCellByColumnAndRow(1, $indice_fila));
    $valorB = trim($current_sheet->getCellByColumnAndRow(2, $indice_fila));
    $valorC = trim($current_sheet->getCellByColumnAndRow(3, $indice_fila));
    try{
    $valorA = trim($current_sheet->getCellByColumnAndRow(1, $indice_fila));
        $query_select_persona = mysqli_query($connection, "SELECT * FROM personas WHERE name= '".$valorA."' AND phone='".$valorB."'");
        if(mysqli_num_rows($query_select_persona) == 0){
            mysqli_query($connection, "INSERT INTO personas (name, phone, address) VALUES('$valorA', '$valorB', '$valorC')");
        }else{
            echo "La persona '".$valorA."'  ya se encuentra registrada". '<br/>';
        }
        
    }catch(Exception $e ){
        echo 'Error: ' . $e->getMessage();
    }
    
    
    //echo $valorA . ' ' . $valorB . ' ' . $valorC . ' '. '<br/>';
    // for($indice_columna = 1; $indice_columna <= $numero_letra; $indice_columna++){
    //     $valor = $current_sheet->getCellByColumnAndRow($indice_columna, $indice_fila);
    //     echo 'valor: '.$valor. ' ';
    // }
    // echo '<br/>';
}
echo 'Registros cargados';
?>
