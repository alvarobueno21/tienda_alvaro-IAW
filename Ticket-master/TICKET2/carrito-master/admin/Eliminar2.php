<?php
include 'Configuracion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Modificar Productos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .container {
            padding: 20px;
        }

        .cart-link {
            width: 100%;
            text-align: right;
            display: block;
            font-size: 22px;
        }
    </style>
</head>
</head>

<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">

                <ul class="nav nav-pills">
                    <li role="presentation"><a href="index.php">Inicio</a></li>
                    <li role="presentation"><a href="VerCarta.php">Carrito de Compras</a></li>
                    <li role="presentation"><a href="Pagos.php">Pagar</a></li>
                    <li role="presentation"><a href="AgregarProducto.php">Nuevo Producto</a></li>
                    <li role="presentation" ><a href="ModificarProducto.php">Modificar Producto</a></li>
                    <li role="presentation" class="active"><a href="Eliminar1.php">Eliminar Producto</a></li>
                </ul>
            </div>

            <div class="panel-body">
                <h1>Tienda de Productos - MODIFICAR</h1>
                </br>
                    <?php
                        //start session
                        session_start();
                        //Incluimos el fichero de configuración para poder conectarnos con la BBDD.
                        include 'Configuracion.php';
                        if(!empty($_REQUEST['id'])){

                            $id = $_REQUEST['id'];
                            $_SESSION["id"]=$id;

                            $selectquery = "SELECT id, name, description, price FROM mis_productos WHERE id=$id;";
                            $result = mysqli_query($db , $selectquery) or die(mysqli_error($db));

                            //Si es mayor que cero el número de filas obtenidas
                            if (mysqli_num_rows($result) > 0) {
                            //Recorremos cada una de las filas de la tabla para obtener todos los productos.
                                while($row = mysqli_fetch_assoc($result)) {
                                    $nombre= $row["name"];
                                    $descripcion = $row["description"];
                                    $precio = $row["price"];
                                    $fecha_actual = date("Y-m-d h:i:s");
                                }
                            }
                        }
                        else
                        {
                            echo "<script>alert('0 Producto Seleccionado');</script>";
                        }
                    ?>

                <!--<a href="VerCarta.php" class="cart-link" title="Ver Carta"><i class="glyphicon glyphicon-shopping-cart"></i></a>-->
                <div id="products" class="row list-group">
                    <form method="POST" action="CRUD.php">
				<div class="form-group">
					<label for="username">Nombre Producto</label>
					<input type="text" name="nombre" placeholder="Nombre del Producto" readonly value= "<?php echo $nombre; ?>" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Descripción</label>
					<input type="text" name="descripcion" placeholder="Descripción del Producto" readyonly value= "<?php echo $descripcion; ?>"class="form-control" required>
				</div>
				<div class="form-group">
					<label>Precio</label>
					<input type="text" name="precio" placeholder="Precio del Producto" readonly value= "<?php echo $precio; ?>"class="form-control" required>
				</div>
                <button type="submit" class="btn btn-warning" name="delete">Eliminar Producto</button>
 			</form>
                </div>
            </div>
        </div>
        <!--Panek cierra-->

    </div>
</body>

</html>