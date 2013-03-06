<?php

switch ($saved) {
    case 1: {
            $data = array();
            foreach ($result['Account'] as $account) {
                $data_account = array(
                    'id' => $account['id'],
                    'user_id' => $account['User']['id'],
                    'title' => $account['User']['title'],
                    'first_name' => $account['User']['first_name'],
                    'last_name' => $account['User']['last_name'],
                    'email' => $account['User']['email'],
                    'phone' => $account['User']['phone'],
                    'account_name' => $account['account_name'],
                    'account_password' => $account['account_password'],
                    'account_description' => $account['account_description'],
                    'status' => $account['status'],
                    'home_dir_config' => 'custom_config',
                    'shell' => $account['shell'],
                    'home_dir' => $account['home_dir'],
                    'expired' => $account['expired'],
                    'accessed' => $account['accessed'],
                    'is_saved' => true,
                    'is_active' => $account['status'] == 'enable',
                    'is_delete' => $account['User']['is_delete'],
                );
                if (empty($account['QuotaLimit'])) {
                    $data_account['quota_limit'] = 0;
                } else {
                    $bytes = $account['QuotaLimit']['bytes_in_avail'];
                    $data_account['quota_limit'] = $bytes / 1048576;
                }

                if (empty($account['QuotaTally'])) {
                    $data_account['quota_tall'] = 0;
                } else {
                    $bytes = $account['QuotaTally']['bytes_in_used'];
                    $data_account['quota_tall'] = $bytes / 1048576;
                }

                $data_account['servers'] = $account['Server']['server_name'];
                array_push($data, $data_account);
            }

            $respuesta = array(
                'success' => true,
                'mensage' => array(
                    'titulo' => 'Cuenta guardado',
                    'msg' => 'La nueva ceunta fue guardada con exito en el catalogo del sistema'
                ),
                'data' => count($data)===1?$data[0]:$data
            );
            print json_encode($respuesta);
        } break;
    case 0: {

            $resultado = array(
                'success' => false,
                'mensage' => array(
                    'titulo' => 'Error al guardar',
                    'msg' => 'El formulario tiene errores, corrijalos y vuelva ha intentarlo'
                ),
                'errors' => $this->validationErrors['Account']
            );
            print json_encode($resultado);
        } break;
    case 2: {
            $resultado = array(
                'success' => false,
                'mensage' => array(
                    'titulo' => 'Error al guardar',
                    'msg' => 'NO se recibio datos para registrar la cuenta'
                ),
                'errors' => array()
            );
            print json_encode($resultado);
        }break;
}
?>