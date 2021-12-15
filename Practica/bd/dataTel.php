<?php 
require_once '../bd/data.php';
$data = new Data();

$id = $_POST['id'];

$cadena="<label>Modelo: </label>
         <select id = 'selModeloTel' name='selModeloTel' class='browser-default'>";

$lista = $data->getModelosByMarcaTel($id);         

foreach ($lista as $li) {
    $cadena= $cadena.'<option value='.$li["id"].'>'.$li["modeloTel"].'</option>';
}
echo $cadena. "</select>";
?>