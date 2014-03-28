
<?php
/**
 * Archivo que es ejecutado en los servidores donde este corriendo apache para
 * hosting virtual.
 * 
 * Se tiene la variable de cofiguracion $config donde se almacena datos especificos
 * para el servidor donde se esta ejecutando el script
 * 
 * $config['work_directory']: Indica el directorio de trabajo del servidor, por 
 * ejemplo: /home, /srv, etc. este parametro puede ser enviado desde la peticion
 * POST si asi se lo desea 
 * 
 * $config['configuration_file']: archivo en el cual se escriben las configuraciones
 * 
 * $config['domain']: dominio de trabajo del servidor, esta es la base para el 
 * hosting virtual
 * 
 * $config['authorization_key_file']: archivo donde esta almacenado la clave de 
 * autorizacion, es un archivo que tiene informacion que es comparada con el que
 * manda el usuario para saber si el usuario y el equipo esat autorizado para poder
 * hacer cambios en el archivo de configuracion del servidor, esto psra evitar 
 * usos amas intencionads.
 * 
 */

$config['work_directory']= '/srv';
$config['domain']= 'cs.umss.edu.bo';

$config['configuration_file']="httpd-vhosts.conf";
$config['authorization_key_file']= 'auth-key.server';

$acount = $_POST['account'];
$email = $_POST['email'];
$action=$_POST['action'];
$security = $_POST['authorization_key'];
if (isset($acount) && $acount != '') {
    $srv = '/srv';
    $domain = 'cs.umss.edu.bo';
    $configApache = "
    ##regionStart $acount
        <VirtualHost *:80>
            ServerAdmin $email
            DocumentRoot $srv/$acount.$domain
            ServerName webtis-$acount.$domain
            ServerAlias www.webtis-$acount.$domain
            ErrorLog logs/$acount.$domain-error.log
            CustomLog logs/$acount.$domain-access.log combined
        </VirtualHost>
    ##regionEnd $acount
    ";

    if (is_writable($config['configuration_file'])) {

        if (!$gestor = fopen($config['configuration_file'], 'a')) {
            echo "0";
            exit;
        }

        if (fwrite($gestor, $configApache) === FALSE) {
            echo "1";
            exit;
        }

        echo "2";

        fclose($gestor);
    } else {
        echo "";
    }
} else {
    echo "NO se ha recibido datos ";
    exit;
}
?>
