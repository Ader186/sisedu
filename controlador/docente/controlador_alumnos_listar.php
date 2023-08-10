<?php
    require '../../modelo/modelo_docente.php';
    $docent = new Docente;
    $idgrado = htmlspecialchars($_POST['idgradoencurso'],ENT_QUOTES,'UTF-8');
    $consulta = $docent->listar_Alumnos_de_grado($idgrado);
    if($consulta){
        echo json_encode($consulta);
    }else{
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }

?>