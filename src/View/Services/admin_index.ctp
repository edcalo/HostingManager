<?php
    $datos = array();
    foreach ($services as $service) {
        $service['Service']['is_saved']=true;
        array_push($datos,$service['Service']);
    }
    $respuesta = array(
        'success' => true,
        'total' => $this->Paginator->param('count'),
        'data' => $datos
    );
    echo json_encode($respuesta);
?>