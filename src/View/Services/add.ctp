<?php

switch ($guardado) {
    case 1: {
            $this->request->data['Service']['save'] = true;
            $respuesta = array(
                'success' => true,
                'mensage' => array(
                    'titulo' => 'Servicio guardado',
                    'msg' => 'El nuevo servicio fue guardado con exito en el catalogo del sistema'
                ),
                'data' => $this->request->data['Service']
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
                'errors' => $this->validationErrors['Service']
            );
            print json_encode($resultado);
        } break;
    case 2: {
            $resultado = array(
                'success' => false,
                'mensage' => array(
                    'titulo' => 'Error al guardar',
                    'msg' => 'NO se recibio datos para registrar el servicio'
                ),
                'errors' => array()
            );
            print json_encode($resultado);
        }break;
}
?>