<?php
    class Docente{
        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }

    function VerificarDocente($usuario,$contra){
       $sql = "select iddocente,nombre,contra,roldocente,status from docente
                where nombre ='$usuario'";

            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    if(password_verify($contra, $consulta_VU["contra"]))
                    {
                        $arreglo[] = $consulta_VU;
                    }
                }
                return $arreglo;
                $this->conexion->cerrar();
            }


    }



function CambiarContra_Docente($usuid,$contranew,$newfoto){
             $sql = "UPDATE docente SET contra = '$contranew',docen_foto='$newfoto' WHERE iddocente = '$usuid'";
            if ($consulta = $this->conexion->conexion->query($sql)) {      
              return 1;
              
            }else{
              return 0;
            }
      }

      function CambiarContra_Docente_sinfoto($usuid,$contranew,$fotoActual){
             $sql = "UPDATE docente SET contra = '$contranew',docen_foto='$fotoActual' WHERE iddocente = '$usuid'";
            if ($consulta = $this->conexion->conexion->query($sql)) {      
              return 1;
              
            }else{
              return 0;
            }
      }

   function listar_docente(){
        $sql=  "select iddocente, nombre, apellido, sexo,tipo, status from docente";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                    $arreglo["data"][]=$consulta_VU;

                }
                return $arreglo;
                $this->conexion->cerrar();
            }
        }

      function Docente_Asignado($iddocente,$arreglo,$vectoC,$Semest){

             $sql = "insert into docenteasignado(docenteid, grado_id, curso_id ,semestre) values ('$iddocente','$arreglo','$vectoC','$Semest')";
     
            if ($consulta = $this->conexion->conexion->query($sql)) {
             return 1;
                
               }else{
                return 0;
              }

           }



      function Quitar_cursoDocente($idcurso){
        $sql=   "DELETE FROM docenteasignado  WHERE curso_id = '$idcurso'";
      if ($consulta = $this->conexion->conexion->query($sql)) {
        
         $this->Recontruir_stado_curso($idcurso);

        return 1;
        
      }else{
        return 0;
      }

      }   
  function Recontruir_stado_curso($idcurso){//VOLVER EL ESTADO A PENDIENTE

     $sql = "UPDATE curso SET stadodocent = 'PENDIENTE' WHERE idcurso = '$idcurso'";
      if ($consulta = $this->conexion->conexion->query($sql)) {
        return 1; 
      }else{
        return 0;
      }


  }


		function Cambiar_estado_curso($vectoC){
     $sql = "UPDATE curso SET stadodocent = 'DICTANDO' WHERE idcurso = '$vectoC'";
      if ($consulta = $this->conexion->conexion->query($sql)) {
        return 1;
        
      }else{
        return 0;
      }

    }

function Update_Docente($iddocente,$nomdoce,$doctapell,$statusdoct,$sexodocet,$tipodocet){

$sql = "UPDATE docente SET nombre = '$nomdoce',apellido='$doctapell',sexo='$sexodocet',status='$statusdoct',tipo='$tipodocet' WHERE iddocente = '$iddocente'";
      if ($consulta = $this->conexion->conexion->query($sql)) {
        return 1; 
      }else{
        return 0;
      }


}

function listar_combo_niveles(){
  $sql = "SELECT idgrado, gradonombre FROM grado";
      $arreglo = array();
      if ($consulta = $this->conexion->conexion->query($sql)) {
        while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
        }
        return $arreglo;
        $this->conexion->cerrar();
      }
}



function Traer_curso($idnivel){

     /* $sql = "select idcurso,nonbrecurso from grado_curso 
                inner join  curso on curso.idcurso= grado_curso.curso_id  where grado_id='$idnivel'";*/
           $sql = "select idcurso,nonbrecurso from grado_curso 
                inner join  curso on curso.idcurso = grado_curso.curso_id  where grado_id='$idnivel' and stadodocent='PENDIENTE'";

              $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
              while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
            }
           return $arreglo;
             $this->conexion->cerrar();
      }
}

function Curso_general(){
  $sql = "SELECT idcurso,nonbrecurso FROM curso";
      $arreglo = array();
      if ($consulta = $this->conexion->conexion->query($sql)) {
        while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
        }
        return $arreglo;
        $this->conexion->cerrar();
      }
    
}

/*
function listar_grados(){
        $sql=  "SELECT idgrado, gradonombre, gradostatus FROM grado";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                    $arreglo["data"][]=$consulta_VU;

                }
                return $arreglo;
                $this->conexion->cerrar();
            }
        }*/


function Curso_grado($idgrado,$semestre,$arreglo){
 $sql = "insert into grado_curso( grado_id, semestre,curso_id) values ('$idgrado','$semestre','$arreglo')";
            if ($consulta = $this->conexion->conexion->query($sql)) {
             return 1; 
               }else{
                return 0;
              }
}


 function Registrar_Docente($nom,$usuapell,$contra,$sexo,$tipo,$dni){
$sql = "INSERT INTO docente(nombre, apellido,contra, sexo, tipo,dni,docen_foto) VALUES ('$nom','$usuapell','$contra','$sexo','$tipo','$dni','imagenes/images.png')";
     
            if ($consulta = $this->conexion->conexion->query($sql)) {

           return 1;
                
            }else{
                return 0;
            }

 }

   function Extraer_contracenaDocent($idprofe){
               $sql = "SELECT iddocente,contra,docen_foto FROM docente WHERE iddocente='$idprofe'";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_array($consulta)) {
                   
                        $arreglo[] = $consulta_VU;
                    
                }
                return $arreglo;
                $this->conexion->cerrar();
            }
        }

 function Eliminar_Docente($idprofe){
  $sql=   "DELETE FROM docente WHERE iddocente = '$idprofe'";
      if ($consulta = $this->conexion->conexion->query($sql)) {
        return 1;
      }else{
        return 0;
      }
 }
 function Ver_CargosAsignados($iddocente){
     $sql  = "select idcurso, nonbrecurso,idgrado,gradonombre from docenteasignado
            inner join  curso on curso.idcurso = docenteasignado.curso_id
            inner join  grado on grado.idgrado = docenteasignado.grado_id
            where docenteid ='$iddocente'";     
            $arreglo = array();
                if ($consulta = $this->conexion->conexion->query($sql)) {
                 while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                         $arreglo['data'][]=$consulta_VU;
                }
                return $arreglo;
                $this->conexion->cerrar();

               }

 }

//NETAMENTE DE DOCENTES


 function listar_gradosdocent($idprofe){
 $sql  = "select DISTINCT idgrado,gradonombre,cantidad_alum from docenteasignado
            inner join  grado on grado.idgrado = docenteasignado.grado_id
            where docenteid ='$idprofe'";

        /* $sql  = "select DISTINCT idgrado,gradonombre,count(grado_id) AS totalAlum from docenteasignado
            inner join  grado on grado.idgrado = docenteasignado.grado_id
            where docenteid ='$idprofe' group by idgrado";*/  
            $arreglo = array();
                if ($consulta = $this->conexion->conexion->query($sql)) {
                 while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                         $arreglo['data'][]=$consulta_VU;
                }
                return $arreglo;
                $this->conexion->cerrar();

               }

 }
 function listar_gradoscursosdocent($idgrado,$iddoce ){

    $sql  = "select idcurso, nonbrecurso  from docenteasignado
            inner join  curso on curso.idcurso = docenteasignado.curso_id
            where grado_id ='$idgrado' and docenteid='$iddoce' ";     
            $arreglo = array();
                if ($consulta = $this->conexion->conexion->query($sql)) {
                 while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                         $arreglo['data'][]=$consulta_VU;
                }
                return $arreglo;
                $this->conexion->cerrar();

               }



 }

function listar_Alumnos_de_grado($idgrado){

$sql  = "select idalumno, apellidop, alumnonombre  from alumno
           
            where grado ='$idgrado'";     
            $arreglo = array();
                if ($consulta = $this->conexion->conexion->query($sql)) {
                 while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                         $arreglo['data'][]=$consulta_VU;
                }
                return $arreglo;
                $this->conexion->cerrar();

               }

}

/*
function Registrar_Notas($curso,$alumnoid,$practica1,$practica2,$practica3,$practica4,$trabajo1,$trabajo2,$trabajo3,$trabajo4,$parcial1,$parcial2,$parcial3,$parcial4,$exsamen1,$exsamen2){

  $sql = "insert into notas(curso,alumnoid,practica1,practica2,practica3,practica4,trabajo1,trabajo2,trabajo3,trabajo4,parcial1,parcial2,parcial3,parcial4,exsamen1,exsamen2)

   values ('$curso','$alumnoid','$practica1','$practica2','$practica3','$practica4','$trabajo1','$trabajo2','$trabajo3','$trabajo4','$parcial1','$parcial2','$parcial3','$parcial4','$exsamen1','$exsamen2')";
     
            if ($consulta = $this->conexion->conexion->query($sql)) {
             return 1;
                
               }else{
                return 0;
              }
}
*/

/*
function Registrar_Notas($curso,$alumnoid,$practica1,$practica2,$trabajo1,$trabajo2,$parcial1,$parcial2,$exsamen1){

  $sql = "insert into notas(curso,alumnoid,practica1,practica2,trabajo1,trabajo2,parcial1,parcial2,exsamen1)

   values ('$curso','$alumnoid','$practica1','$practica2','$trabajo1','$trabajo2','$parcial1','$parcial2','$exsamen1')";
     
            if ($consulta = $this->conexion->conexion->query($sql)) {
             return 1;
                
               }else{
                return 0;
              }
}

*/


//fuccion nuevo

function Registrar_Notas($gradoID,$curso,$alumnoid,$practica1,$practica2,$trabajo1,$trabajo2,$parcial1,$parcial2,$exsamen1){

  $sql = "insert into notas(notasGrado,curso,alumnoid,practica1,practica2,practica3,practica4,trabajo1,trabajo2,trabajo3,trabajo4,parcial1,parcial2,parcial3,parcial4,exsamen1,exsamen2)

   values ('$gradoID','$curso','$alumnoid','$practica1','$practica2','0','0','$trabajo1','$trabajo2','0','0','$parcial1','$parcial2','0','0','$exsamen1','0')";
     
            if ($consulta = $this->conexion->conexion->query($sql)) {
             return 1;
                
               }else{
                return 0;
              }
}


function listar_Notas_Reportes($gradoID,$cursoID){

 $sql = "select apellidop,alumnonombre,gradonombre,nonbrecurso,
 practica1, practica2, practica3,practica4,
 trabajo1, trabajo2, trabajo3, trabajo4,
 parcial1, parcial2,parcial3, parcial4, 
 exsamen1, exsamen2 
 from notas
            inner join  alumno on alumno.idalumno = notas.alumnoid
            inner join  grado on grado.idgrado = notas.notasGrado
              inner join  curso on curso.idcurso = notas.curso
            where notasGrado ='$gradoID' ";
   $arreglo = array();
      if ($consulta = $this->conexion->conexion->query($sql)) {
        while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo['data'][] = $consulta_VU;
        }
        return $arreglo;
        $this->conexion->cerrar();
      }
}



function Editar_notas($idalumno,$cursoid){
   $sql = "SELECT practica1, practica2, practica3, practica4, trabajo1, trabajo2, trabajo3, trabajo4, parcial1, parcial2, parcial3, parcial4, exsamen1, exsamen2 FROM notas where alumnoid='$idalumno' and curso='$cursoid' ";

      $arreglo = array();
      if ($consulta = $this->conexion->conexion->query($sql)) {
        while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
        }
        return $arreglo;
        $this->conexion->cerrar();
      }
}


function vernotas_notas($idalumno,$cursoid){
   $sql = "SELECT idnotas,practica1, practica2, practica3, practica4, trabajo1, trabajo2, trabajo3, trabajo4, parcial1, parcial2, parcial3, parcial4, exsamen1, exsamen2 FROM notas where alumnoid='$idalumno' and curso='$cursoid' ";

      $arreglo = array();
      if ($consulta = $this->conexion->conexion->query($sql)) {
        while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo['data'][] = $consulta_VU;
        }
        return $arreglo;
        $this->conexion->cerrar();
      }
}


function Actualizar_Notas($curso,$alumnoid,$practica3,$practica4,$trabajo3,$trabajo4,$parcial3,$parcial4,$exsamen2){
  $sql = "UPDATE notas set practica3='$practica3',practica4='$practica4',trabajo3='$trabajo3',trabajo4='$trabajo4',parcial3='$parcial3',parcial4='$parcial4',exsamen2='$exsamen2' where alumnoid='$alumnoid' and curso='$curso' ";
     
            if ($consulta = $this->conexion->conexion->query($sql)) {
             return 1;
                
               }else{
                return 0;
              }
}
 //FUCCION LISTAR AULAS DEL GRADO
function listar_aulas($idgrado){
$sql  = "select idaula, nombreaula, piso, numero, aforro, seccion from grado
            inner join  aula on aula.idaula = grado.aula_id
            where idgrado ='$idgrado'";     
            $arreglo = array();
                if ($consulta = $this->conexion->conexion->query($sql)) {
                 while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
                         $arreglo['data'][]=$consulta_VU;
                }
                return $arreglo;
                $this->conexion->cerrar();

               }


}


//FUNCION DE HORARIOS



 function ListarHoras_docent() {

              $sql = "SELECT * FROM hora";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
                }
                return $arreglo;
                $this->conexion->cerrar();
            }

           }


 function mostratarHorario_docent($dia,$hora,$idgrado ){

    $sql="select idhorariocurso,nonbrecurso from horario_curso 
             inner join curso  on curso.idcurso = horario_curso.idcurso
             WHERE idhora = '$hora' AND dia = '$dia' AND gradoid='$idgrado '";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                    $arreglo[]=$consulta_VU;

                }
                return $arreglo;
                $this->conexion->cerrar();
            }
            
           }

  function Quitar_Notas($idnotas){
    $sql=   "DELETE FROM notas  WHERE idnotas = '$idnotas'";
      if ($consulta = $this->conexion->conexion->query($sql)) {
        return 1;
        
      }else{
        return 0;
      }

  }

  function listar_docente_report(){
  
   $sql=  "select iddocente, nombre, apellido, sexo,tipo, dni,status from docente";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                    $arreglo["data"][]=$consulta_VU;

                }
                return $arreglo;
                $this->conexion->cerrar();
            }

  }


    }
?>
