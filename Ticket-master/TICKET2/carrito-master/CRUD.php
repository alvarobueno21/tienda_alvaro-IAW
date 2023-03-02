<?php
//start session
session_start();
//Incluimos el fichero de configuración para poder conectarnos con la BBDD.
include 'Configuracion.php';
//Si hemos hecho clic en el botón de Registrar Producto. Tenemos que poner la etiqueta name del elemento button.
if(isset($_POST['register'])){
    //Vamos a comprobar si algún dato nos lo pasa vacío.
    if (! $_POST
    || trim($_POST['nombre'])   === '' //trim nos quita los espacios al principio y al final del texto
    || trim($_POST['descripcion'])     === ''
    || trim($_POST['precio'])     === ''
    ) {
        echo "<script>alert('Los campos no pueden estar vacios');</script>";
        //Nos redireccionamos de nuevo al Registro del Producto
        header("Location:AgregarProducto.php");
    }
    else
    {
        //Si queremos acceder a los datos desde otro php, UTILIZAMOS SESIONES - VER UNIDAD DIDÁCTICA DE SESIONES.
        //DEJO ENLACE --> https://www.mclibre.org/consultar/php/lecciones/php-sesiones.html
        /*
        //CREAMOS VARIABLES DE SESIONES
        $_SESSION['nombre'] = $_POST['nombre'];
		$_SESSION['descripcion'] = $_POST['descrpcion'];
		$_SESSION['precio'] = $_POST['precio'];
        
        //Borramos los datos de la sesión.
        unset($_SESSION['nombre']);
        unset($_SESSION['descripcion']);
        unset($_SESSION['precio']);
        
        //Destruimos la sesión.
        session_destroy();
        */

        //VARIABLES LOCALES
        $nombre= $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
        $fecha_actual = date("Y-m-d h:i:s");


        //INSERTAMOS EN LA BASE DE DATOS
        $query = "INSERT INTO mis_productos(name,description,price,created,modified) VALUES ('$nombre' , '$descripcion' , '$precio' , '$fecha_actual', '$fecha_actual')";
        $resultado = mysqli_query($db , $query) or die(mysqli_error($db));

         if (mysqli_affected_rows($db) > 0) {
            echo "<script>alert('Nuevo Producto Agregado');
            window.location.href='index.php';</script>";
        }
        else {
            echo "<script>alert('Ha ocurrido un error, inténtalo otra vez');</script>";
        }

        //OTRA MANERA DE HACER LO MISMO CON POO. VER UNIDAD DIDACTICA DE PROGRAMACION ORIENTADA A OBJETOS.
        /*
        $resultado = $db->query("INSERT INTO mis_productos(name,description,price,created,modified) VALUES ('$nombre' , '$descripcion' , '$precio' , '$fecha_actual', '$fecha_actual')");
        */
    }

}elseif(isset($_POST['modify'])){ //Se produce un error por lo cual mostramos que lo vuela a intentar de nuevo
	//Vamos a comprobar si algún dato nos lo pasa vacío.
    if (! $_POST
    || trim($_POST['nombre'])   === '' //trim nos quita los espacios al principio y al final del texto
    || trim($_POST['descripcion'])     === ''
    || trim($_POST['precio'])     === ''
    ) {
        echo "<script>alert('Los campos no pueden estar vacios');</script>";
        //Nos redireccionamos de nuevo al Registro del Producto
        header("Location:AgregarProducto.php");
    }
    else
    {
        //VARIABLES LOCALES
        $id=$_SESSION["id"]; //VARIIABLE OBTENIDA MEDIANTE UNA SESION.
        $nombre= $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
        $fecha_actual = date("Y-m-d h:i:s");


        //ACTUALIZAMOS EL PRODUCTO EN LA BASE DE DATOS
        $updatequery = "UPDATE mis_productos SET name = '$nombre', description='$descripcion' , price= '$precio' , modified= '$fecha_actual' WHERE id='$id'";
        $result1 = mysqli_query($db , $updatequery) or die(mysqli_error($db));

        if (mysqli_affected_rows($db) > 0) {
            echo "<script>alert('Producto Actualizado Correctamente.');
            window.location.href='index.php';</script>";
        }
        else {
            echo "<script>alert('Se produjo un error. Intenta nuevamente!');</script>";
        }
    }
}
elseif(isset($_POST['delete'])){ //Se produce un error por lo cual mostramos que lo vuela a intentar de nuevo
	//Vamos a comprobar si algún dato nos lo pasa vacío.
    if (! $_POST
    || trim($_POST['nombre'])   === '' //trim nos quita los espacios al principio y al final del texto
    || trim($_POST['descripcion'])     === ''
    || trim($_POST['precio'])     === ''
    ) {
        echo "<script>alert('Los campos no pueden estar vacios');</script>";
        //Nos redireccionamos de nuevo al Registro del Producto
        header("Location:AgregarProducto.php");
    }
    else
    {
        //VARIABLES LOCALES
        $id=$_SESSION["id"]; //VARIIABLE OBTENIDA MEDIANTE UNA SESION.
        $nombre= $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
        $fecha_actual = date("Y-m-d h:i:s");


        //ELIMINAMOS EL PRODUCTO EN LA BASE DE DATOS
        $updatequery = "DELETE FROM mis_productos  WHERE id='$id'";
        $result1 = mysqli_query($db , $updatequery) or die(mysqli_error($db));

        if (mysqli_affected_rows($db) > 0) {
            echo "<script>alert('Producto Actualizado Correctamente.');
            window.location.href='index.php';</script>";
        }
        else {
            echo "<script>alert('Se produjo un error. Intenta nuevamente!');</script>";
        }
    }
}
else
{
    echo "<script>alert('Ha ocurrido un error, inténtalo otra vez');</script>";
    //redirect to the home page
    header("Location:AgregarProducto.php");
}