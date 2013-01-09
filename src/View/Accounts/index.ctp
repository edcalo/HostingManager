<?php

$datos = array();
//print_r($accounts);
foreach ($accounts as $account) {
    $account['Account']['title'] = $account['User']['title'];
    $account['Account']['first_name'] = $account['User']['first_name'];
    $account['Account']['last_name'] = $account['User']['last_name'];
    $account['Account']['email'] = $account['User']['email'];
    $account['Account']['phone'] = $account['User']['phone'];
    $account['Account']['home_dir_config'] = 'custom_config';
    $account['Account']['quota_limit'] =50;
    $account['Account']['quota_tall'] =40;
    $account['Account']['is_saved'] = true;
    $servers = array();

    foreach ($account['Server'] as $server) {
        array_push($servers, $server['id']);
    }
    $account['Account']['servers'] = implode(',', $servers);
    array_push($datos, $account['Account']);
}
$respuesta = array(
    'success' => true,
    'total' => count($datos),
    'data' => $datos
);
echo json_encode($respuesta);
?>
