 <?php
    session_start();
    require_once("conexion/conexion.php");
    $db = new Database();
    $con = $db -> conectar();


  if (isset($_POST['validar']))
   {

    $documento= $_POST['documento'];    
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $enfermedad= $_POST['enfermedad'];
 
   

     $sql= $con -> prepare ("SELECT * FROM urgencias ");
     $sql -> execute();
     $fila = $sql -> fetchAll(PDO::FETCH_ASSOC);

    
        
        
   
   
     if ( $documento=="" || $nombre=="" || $apellido=="" || $enfermedad=="" )
      {
         echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
         
      }
      
      else{

        
        $insertSQL = $con->prepare("INSERT INTO urgencias( documento , nombre, apellido , enfermedad) VALUES( '$documento', '$nombre', '$apellido', '$enfermedad',)");
        $insertSQL -> execute();
        echo '<script> alert("REGISTRO EXITOSO");</script>';
       
     }  
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="stylesheet" href="css/trabajo.css">
   
    <title>paciente</title>
</head>
<body>
    
<form  method="POST" autocomplete="off" class="formulario" id="formulario">
             <h1>registro del paciente</h1>
        <div class="conte" id="conte">
                    <h2>documento del paciente</h2>
             <input type="number" class="inter" name="documento" id="documento" placeholder="ingrese documento">
                        
                        <br>

                    <h2>nombre del paciente</h2>
             <input type="text" class="inter" name="nombre" id="nombre" placeholder="ingrese nombre">
             <br>

                    <h2>apellido del paciente</h2>
            <input type="text" class="inter" name="apellido" id="apellido" placeholder="ingrese nombre">
             <br>

             <h2>enfermedad del paciente</h2>
            <input type="text" class="inter" name="enfermedad" id="enfermedad" placeholder="ingrese la enfermedad">
             <br>

             

             <input class="b"     type="submit" name="validar" value="Registro">
             <input class="c"     type="submit" name="ingresar" value="ingresar a la tabla" >
             

                        </div>
         
              

                      
                      
    </form>

</body>
</html>