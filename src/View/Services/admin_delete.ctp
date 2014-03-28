<?php
$respuesta = array(
    'success'=> $delete,
    'mensage'=> array(
        'titulo'=> 'Error al eliminar',
        'msg'=> 'No se puede eliminar el cargo '
        
    ),
    'data'=>array()
);
echo json_encode($respuesta);
?>