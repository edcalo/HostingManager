<?php
$datos = array();
foreach ($servers as $server) {
    //$server['Server']['id']=$server['Server']['gid'];
    $server['Server']['save']=1;
    array_push($datos,$server['Server']);
}
$respuesta = array(
    'success' => true,
    'total' => count($datos),
    'data' => $datos
);
echo json_encode($respuesta);
?>