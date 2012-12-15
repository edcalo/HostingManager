<?php

if($update) {    
    $list_services = array();
    foreach ($services as $service) {
        array_push($list_services, $service['Service']);
    }
    $response = array(
        'success' => $update,
        'data'=>$list_services
    );
}else {
    $response = array(
        'success'=> $update,
        'mensage'=> array(
            'titulo'=> 'Error al guardar',
            'msg'=> 'El formulario tiene errores, corrijalos y vuelva ha intentarlo'
        ),
        'errors' => $this->validationErrors['Service']
    );
}
echo json_encode($response);
?>