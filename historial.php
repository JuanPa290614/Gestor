<html>
    <head>
        
    </head>
    
    <body>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Modificado por</th>
                    <th>Accion</th>
                    <th>Estado actual del documento</th>
                    <th>Fecha de la accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    if (@!$iddocumento) {
                        $iddocumento = null;
                    }
                    
                    extract($_GET);
                    require("php/connect_db.php");
                    $sql=("CALL radicado_seguimientos(null, null, '$iddocumento', null, '$opcion');");
                    $query=mysqli_query($mysqli,$sql);

                    while($arreglo=mysqli_fetch_array($query)){

                        echo "<tr>";
                            echo "<td>$arreglo[0]</td>";
                            echo "<td>$arreglo[1]</td>";
                            echo "<td>$arreglo[2]</td>";
                            echo "<td>$arreglo[3]</td>";
                            echo "<td>$arreglo[4]</td>";
                        echo "</tr>";
				}
			?>
            </tbody>
        </table>
    </body>
</html>