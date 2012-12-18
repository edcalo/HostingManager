<?php

if($update) {    
    $list_servers = array();
    foreach ($servers as $server) {
        array_push($list_servers, $server['Server']);
    }
    $response = array(
        'success' => $update,
        'data'=>$list_servers
    );
}else {
    $response = array(
        'success'=> $update,
        'mensage'=> array(
            'titulo'=> 'Error al guardar',
            'msg'=> 'El formulario tiene errores, corrijalos y vuelva ha intentarlo'
        ),
        'errors' => $this->validationErrors['Server']
    );
}
echo json_encode($response);
?>