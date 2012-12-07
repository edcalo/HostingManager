<?php
$datos = array();
foreach ($accounts as $account) {
    array_push($datos,$ftp_user['Account']);
}
$respuesta = array(
    'success' => true,
    'total' => count($datos),
    'data' => $datos
);
echo json_encode($respuesta);
?>
