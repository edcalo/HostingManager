<?php

if ($update) {
    $list_accounts = array();
    foreach ($accounts as $account) {
        $data_account = array(
            'id' => $account['Account']['id'],
            'user_id' => $account['User']['id'],
            'title' => $account['User']['title'],
            'first_name' => $account['User']['first_name'],
            'last_name' => $account['User']['last_name'],
            'email' => $account['User']['email'],
            'phone' => $account['User']['phone'],
            'account_name' => $account['Account']['account_name'],
            'account_password' => $account['Account']['account_password'],
            'account_description' => $account['Account']['account_description'],
            'status' => $account['Account']['status'],
            'home_dir_config' => 'custom_config',
            'shell' => $account['Account']['shell'],
            'home_dir' => $account['Account']['home_dir'],
            'expired' => $account['Account']['expired'],
            'accessed' => $account['Account']['accessed'],
            'is_saved' => true,
            'is_active' => $account['Account']['status'] == 'enable',
            'is_delete' => $account['User']['is_delete'],
        );
        if (count($account['QuotaLimit']) > 0) {
            $bytes = $account['QuotaLimit'][0]['bytes_in_avail'];
            $data_account['quota_limit'] = $bytes / 1048576;
        } else {
            $data_account['quota_limit'] = 0;
        }

        if (count($account['QuotaTally']) > 0) {
            $bytes = $account['QuotaTally'][0]['bytes_in_avail'];
            $data_account['quota_tall'] = $bytes / 1048576;
        } else {
            $data_account['quota_tall'] = 0;
        }

        $servers = array();
        foreach ($account['Server'] as $server) {
            array_push($servers, $server['id']);
            $data_account['servers'] = $server['server_name'];
            array_push($list_accounts, $data_account);
        }
    }
    $response = array(
        'success' => $update,
        'data' => $list_accounts
    );
} else {
    $response = array(
        'success' => $update,
        'mensage' => array(
            'titulo' => 'Error al guardar',
            'msg' => 'El formulario tiene errores, corrijalos y vuelva ha intentarlo'
        ),
        'errors' => $this->validationErrors['Account']
    );
}
echo json_encode($response);
?>