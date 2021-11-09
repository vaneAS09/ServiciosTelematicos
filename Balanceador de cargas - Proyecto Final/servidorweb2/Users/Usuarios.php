<?php
    $cons_usuario="vaneA";
    $cons_contra="Vane1234*";
    $cons_base_datos="baseBalanceador";
    $cons_equipo="192.168.50.3";

    $obj_conexion =
    mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);
    if(!$obj_conexion)
    {

        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    ELSE
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }

/*Ejemplo de insert*/
echo" <td> <form method='post' action='Usuarios.php'>
<fieldset>
<legend> Ingrese un usuario</legend>
<p>
<label> Escriba su nombre:
<input type='text' name='nombre' />
</label>
</p>
<p>
<label>Escriba su edad:
<input type='text' name='edad' />
</label>
</p>
<p>
<input type='submit' value='enviar'/>
</p>
</fieldset>";

//Validamos que hayan llegado estas variables, y que no esten vacias:
if (isset($_POST["nombre"], $_POST["edad"],) and $_POST["nombre"] !="" and $_POST["edad"]!="" ){

//traspasamos a variables locales, para evitar complicaciones con las comillas:
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];

//Preparamos la orden SQL

$sql = "INSERT INTO usuarios (nombre, edad)
VALUES ('$nombre','$edad')";

if ($obj_conexion->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $obj_conexion->error;

}

}

    /* ejemplo de una consulta */

    $var_consulta= "select * from usuarios where edad=19";    $var_resultado = $obj_conexion->query($var_consulta);


    if($var_resultado->num_rows>0)
      {

	echo "<div align='center'>Visualice los usuarios con edad 19.</div><br>";

        echo"<table border='1' align='center'>
         <tr bgcolor='#E6E6E6'>
            <th>Id</th>
            <th>Nombre</th>
            <th>Edad</th>
            
        </tr>";

    while ($var_fila=$var_resultado->fetch_array())
    {
        echo "<tr>
        <td>".$var_fila["id"]."</td>";
        echo "<td>".$var_fila["nombre"]."</td>";
        echo "<td>".$var_fila["edad"]."</td></tr>";
     }
    }
    else
      {
        echo "No hay Registros";
      }

    ?>
