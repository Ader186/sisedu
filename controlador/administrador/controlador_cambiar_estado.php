

<?php
     require '../../modelo/modelo_administrador.php';
    $MU = new Modelo_Administrador();
   $fecha_actual = date('Y-m-d H:i:s');
      // $fecha_actual = date('2022-01-10 05:10:25');

    $consulta = $MU->Cambiar_Estado_Pago($fecha_actual);
    echo $consulta;
?>