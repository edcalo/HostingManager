<?php
$datos = array();
foreach ($servers as $server) {
    $ftp_group['Server']['id']=$server['FtpGroup']['gid'];
    $ftp_group['Server']['save']=1;
    array_push($datos,$server['Server']);
}
$respuesta = array(
    'success' => true,
    'total' => count($datos),
    'data' => $datos
);
echo json_encode($respuesta);
?>