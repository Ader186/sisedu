<?php
    class  Horario{
        public  $codigo;

        private $conexion;
        function __construct(){
            require_once 'modelo_conexion.php';
            $this->conexion = new conexion();
            $this->conexion->conectar();
            $this->codigo='';
        }
    
 function listar_combo_cursos(){
     $sql = "SELECT idcurso, nonbrecurso FROM curso";
      $arreglo = array();
      if ($consulta = $this->conexion->conexion->query($sql)) {
        while ($consulta_VU = mysqli_fetch_array($consulta)) {
                        $arreglo[] = $consulta_VU;
        }
        return $arreglo;
        $this->conexion->cerrar();
      }
  }

 function Registar_horario( $codigo,$xidhorario, $idhora, $idcurso, $dia,$idgradoH) {
            
         $sql ="INSERT INTO horario_curso (codigo,idhorariocurso, idhora, idcurso, dia,gradoid,FechRegistro,statushorario) VALUES ('$codigo','$xidhorario', '$idhora', '$idcurso', '$dia','$idgradoH',NOW(),'ACTIVO') ";
            if ($consulta = $this->conexion->conexion->query($sql)) {
            return 1;
                
            }else{
                return 0;
                 $this->conexion->cerrar();
            } 
       
        }


   function consultahorarioCurso($dia, $hora) {
            $arreglo = array();
            
                return $arreglo;
                $this->conexion->cerrar();
            }

  function ListarHoras() {

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

         function eliminar($xidhorario){
          
             $sql=  "DELETE FROM horario_curso WHERE idhorariocurso = '$xidhorario' ";

            if ($consulta = $this->conexion->conexion->query($sql)) {
              return 1;
        
            }else{
                return 0;
             }



    } 
  
   function listar_Horario(){
      $sql=  "select DISTINCT  codigo ,gradonombre ,statushorario  from horario_curso
           inner join  grado on horario_curso.gradoid = grado.idgrado";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                    $arreglo["data"][]=$consulta_VU;

                }
                return $arreglo;
                $this->conexion->cerrar();
            }
           }


 function mostratarHorario($dia,$hora,$miCodigo){

    $sql="select idhorariocurso,nonbrecurso from horario_curso 
             inner join curso  on curso.idcurso = horario_curso.idcurso
             WHERE idhora = '$hora' AND dia = '$dia' AND codigo='$miCodigo'";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                    $arreglo[]=$consulta_VU;

                }
                return $arreglo;
                $this->conexion->cerrar();
            }
            
           }

   function ConsultarHorario($dia,$hora){

    $sql="select idhorariocurso,nonbrecurso from horario_curso 
             inner join curso  on curso.idcurso = horario_curso.idcurso
             WHERE idhora = '$hora' AND dia = '$dia' ";
            $arreglo = array();
            if ($consulta = $this->conexion->conexion->query($sql)) {
                while ($consulta_VU = mysqli_fetch_assoc($consulta)) {

                    $arreglo[]=$consulta_VU;

                }
                return $arreglo;
                $this->conexion->cerrar();
            }
            
           }


   function delete_registro($codigo){

     $sql=  "DELETE FROM horario_curso WHERE codigo = '$codigo' ";

            if ($consulta = $this->conexion->conexion->query($sql)) {
              return 1;
        
            }else{
                return 0;
             }
   }


    }
?>