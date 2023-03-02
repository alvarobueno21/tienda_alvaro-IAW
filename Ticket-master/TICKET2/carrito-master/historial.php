<?php
session_start();
include "Configuracion.php";
$usuario = $_SESSION["id"];

$historia = "SELECT * FROM orden WHERE customer_id = '".$usuario."'";
$ejecuta = $db->query($historia);
$lineas = $ejecuta->num_rows;
$query = "SELECT total_price FROM orden WHERE customer_id = '".$usuario."'";
$query_run = $db->query($query);
$qty = 0;
$total = 0;
while ($num = $query_run->fetch_assoc()) {
    $qty = $num['total_price'];
    $total += $num['total_price'];
}
if(isset($_POST['boton'])){
    $historia = "SELECT * FROM orden WHERE customer_id = '".$usuario."'";
    $historia_query = $db->query($historia);
    $historia_row = $historia_query->fetch_assoc();
    $updatequery = "UPDATE orden SET status = '2', modified= NOW() WHERE customer_id='".$usuario."' and id='".$historia_row["id"]."' ";
    $result1 = mysqli_query($db , $updatequery) or die(mysqli_error($db));
    
    if (mysqli_affected_rows($db) > 0) {
        echo "<script>alert('Producto Devuelto Correctamente.');
        window.location.href='historial.php';</script>";
    }
    else {
        echo "<script>alert('Se produjo un error. Intenta nuevamente!');</script>";
    }
}

$db->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pagos - PHP Carrito de compras Tutorial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Carrito.css" media="screen">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .container {
            padding: 20px;
        }

        .table {
            width: 65%;
            float: left;
        }

        .shipAddr {
            width: 30%;
            float: left;
            margin-left: 30px;
        }

        .footBtn {
            width: 95%;
            float: left;
        }

        .orderBtn {
            float: right;
        }
    </style>
</head>

<body>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <ul class="nav nav-pills">
        <li role="presentation"><a href="index.php">Inicio</a></li>
        <li role="presentation"><a href="Carrito.php">Carrito de Compras</a></li>
        <li role="presentation"><a href="Pagos.php">Pagar</a></li>
        <li role="presentation" class="active"><a href="historial.php">Historial de Compras</a></li>
      </ul>
    </div>
  </div>
</div>
    <?php if ($lineas > 0) {?>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col"><span class="icon-calendar"><span> Fecha </th>
                    <th scope="col"><span class="icon-cart"><span> Total </th>
<th scope="col"><span class="icon-location"><span> Estado </th>
<th scope="col"><span class="icon-reply"><span> Devolver </th>
</tr>
</thead>
<tbody>
<?php
                 while ($row = $ejecuta->fetch_assoc()) {?>
<tr>
<td><?php echo $row["created"];?></td>
<td><?php echo "$".$row["total_price"];?></td>
<td><?php if ($row["status"] == 1) {echo "En Proceso";} elseif ($row["status"] == 2) {echo "Devuelto";} else {echo "Completado";}?></td>
<td>
<?php if ($row["status"] == 1) {?>
<form method="post">
<input type="hidden" name="id" value="<?php echo $row["id"];?>">
<input type="submit" name="boton" value="Devolver" onclick="return confirm('¿Estás seguro que deseas devolver este producto?')">
</form>
<?php } ?>
</td>
</tr>
<?php } ?>
<tr>
<td></td>
<td><?php echo "$".$total;?></td>
<td></td>
<td></td>
</tr>
</tbody>
</table>
</div>
<?php } else {?>
<div class="container">
<div class="alert alert-info" role="alert">
Aún no tienes compras realizadas.
</div>
</div>
<?php } ?>
<a href="javascript:;" id="btnImprimir" class="btn btn-danger hidden-print">Imprimir PDF</a>
</body>
<script>
        $('#btnImprimir').on('click',function(){

            window.print();

            return false;

        })
                        
    </script>
</html>