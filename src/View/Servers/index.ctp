<?php
    $datos = array();
    foreach ($servers as $server) {
        $server['Server']['is_saved']=true;
        $server['Server']['members']=true;
        $server['Server']['services']=true;
        array_push($datos,$server['Server']);
    }
    $respuesta = array(
        'success' => true,
        'total' => count($datos),
        'data' => $datos
    );
    echo json_encode($respuesta);
?>