<?php 
require_once '../bd/data.php';
$data = new Data();

$id = $_POST['id'];

$cadena="<label>Modelo: </label>
         <select id = 'selModelo' name='selModelo' class='browser-default'>";

$lista = $data->getModelosByMarca($id);         

foreach ($lista as $li) {
    $cadena= $cadena.'<option value='.$li["id"].'>'.$li["nombre"].'</option>';
}
echo $cadena. "</select>";
?>