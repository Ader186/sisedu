
<?php
    require '../../modelo/modelo_grado.php';
    $grado = new Grado();
    $idcurso = htmlspecialchars($_POST['idcapturado'],ENT_QUOTES,'UTF-8');
     $consulta =  $grado->Quitar_curso($idcurso);
    echo $consulta;

?>