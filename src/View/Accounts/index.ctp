<?php
$datos = array();
//print_r($accounts);
foreach ($accounts as $account) {
    $account['Account']['email'] = $account['User']['email'];
    $account['Account']['is_saved'] = true;
    array_push($datos,$account['Account']);
}
$respuesta = array(
    'success' => true,
    'total' => count($datos),
    'data' => $datos
);
echo json_encode($respuesta);
?>
