<?php
$respuesta = array(
    'success'=> $delete,
    'mensage'=> array(
        'titulo'=> 'Error al eliminar',
        'msg'=> 'No se puede eliminar la cuenta '
        
    ),
    'data'=>array()
);
echo json_encode($respuesta);
?>