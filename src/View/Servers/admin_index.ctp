<?php
    $datos = array();
    foreach ($servers as $server) {
        $services = array();
        foreach ($server['Service'] as $service) {
            array_push($services, $service['id']);
        }
        $members = array();
        foreach ($server['Account'] as $account) {
            array_push($members, $account['id']);
        }
        $server['Server']['is_saved']=true;
        $server['Server']['members']=  implode(',', $members);
        $server['Server']['services']=  implode(',', $services);
        array_push($datos,$server['Server']);
    }
    $respuesta = array(
        'success' => true,
        'total' => $this->Paginator->param('count'),
        'data' => $datos
    );
    echo json_encode($respuesta);
?>