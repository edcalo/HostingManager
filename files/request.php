<?php
/*
require_once 'libs/post_request.php';
$data = array('acount' => 'genso','email' => 'edcalo@gmail.com');
$url = "http://127.0.0.1:81/apache/";
echo $url;
$result = post_request($url, $data);
var_dump($result);
 * */
//Iniciamos cURL.
$ch = curl_init();
//Accedemos a la URL
curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:81/apache/");
//Indicamos que vamos a enviar datos por Post.
curl_setopt ($ch, CURLOPT_POST, true);
//Iniciamos una sesion
curl_setopt($ch, CURLOPT_COOKIE, 'PHPSESSID=cookie;');
//Indicamos que queremos imprimir el resultado
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
//Hacemos uso de un User Agent
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; es-ES; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13");
//Enviamos los datos por post
curl_setopt ($ch, CURLOPT_POSTFIELDS, "account=genso&email=edcalo@gmail.com");
//Ejecutamos e imprimimos el resultado
echo curl_exec($ch);
 
?>
