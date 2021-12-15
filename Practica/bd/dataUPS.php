<?php 
require_once '../bd/data.php';
$data = new Data();

$id = $_POST['id'];

$cadena="<label>Modelo: </label>
         <select id = 'selModeloUPS' name='selModeloUPS' class='browser-default'>";

$lista = $data->getModelosByMarcaUPS($id);         

foreach ($lista as $li) {
    $cadena= $cadena.'<option value='.$li["id"].'>'.$li["modeloUPS"].'</option>';
}
echo $cadena. "</select>";
?>