<?php
    session_start();
    require_once("conexion/conexion.php");
    $db = new Database();
    $con = $db -> conectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<form action="" method="POST">

<td>
<div class="btn-container">
            
            <input type="submit" value="Regresar" name="regresar" id="regresar">
</div>
</tr>
</form>
<?php 
if (isset($_POST['regresar'])){
    header('Location: paciente.php');

}
?>
    <div class="formulario">

    <h1 class="title">consulta medica</h1>
        <form method="POST" action="">
        <table>
            <tr class="gris">
                
                <td>documento</td>
                <td>nombre del paciente</td>
                <td>apellido del paciente</td>
                <td>enfermedad del paciente</td>
                <td>nombre del doctor</td>
                <td>apellido del doctor</td>
                <td>hora de urgencias</td>
              

            </tr>
            
            <?php
             
                  $query = $con -> prepare("SELECT * FROM urgencias,doctor");
                  $query -> execute ();
                  $resultados = $query -> fetchAll(PDO::FETCH_ASSOC);

                  foreach ($resultados as $fila){
            ?>
            <tr>
                <td><?php echo $fila['documento']?></td>
                <td><?php echo $fila['nombre']?></td>
                <td><?php echo $fila['apellido']?></td>
                <td><?php echo $fila['enfermedad']?></td>
                <td><?php echo $fila['nom_doc']?></td>
                <td><?php echo $fila['ape_doc']?></td>
                <td><?php echo $fila['hora']?></td>
                
            </tr>
            <?php
                  }
            ?>

            
         
        </table>
 
        </form>               

    </div>

</body>
</html>