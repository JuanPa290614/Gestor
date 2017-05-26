<?php
session_start();
require("php/connect_db.php");

if (@!$_SESSION['usuario']) {
	header("Location:index.html");
}

extract($_GET);

    $consulta=mysqli_query($mysqli,"CALL documentos(null, null, 'contestar', null, null, null, null, null, null, '$iddocumento');");
    $arreglo=mysqli_fetch_array($consulta);

    $idradicado = $arreglo[11];

?>
 
 <hmtl>
    <head>
        <title>reasignar Documento</title>
        
    </head>
    
    <div id="til">Contestar Nuevo Documento</div>
    <div id="rest">
    <body>
        <form method="POST" action="php/cambiar_documento.php?iddocumento=<?php echo $iddocumento?>&idradicado=<?php echo $idradicado?>">
           
            <br>
            <label><a title="Asunto">Asunto:</a></label><br>
            <input readonly type="text" value="<?php echo $arreglo[0]?>"/><br><br>
            <label><a title="Nombre">Nombre:</a></label><br>
            <input readonly type="text" value="<?php echo $arreglo[1]?>"/><br><br>
            <a target="_blank" href="<?php echo $arreglo[2]?>">Click aqui para ver el documento:</a><br><br>
            <label><a title="Feche">Fecha:</a></label><br>
            <input readonly type="text" value="<?php echo $arreglo[3]?>"/><br><br>
            <label><a title="Tipo de documento">Tipo de documento:</a></label><br>
            <input readonly type="text" value="<?php echo $arreglo[4]?>"/><br><br>
            <label><a title="Estado de documento">Estado de documento:</a></label><br>
            <input readonly type="text" value="<?php echo $arreglo[5]?>"/><br><br>
            <label><a title="Dependencia">Dependencia:</a></label><br>
            <input readonly  name="txtdependencia" type="text" value="<?php echo $arreglo[6]?>"/><br><br>
            <label><a title="Detalles">Detalles:</a></label><br>
            <textarea readonly rows="10" cols="40" placeholder="~Pendiente~"><?php echo $arreglo[7]?></textarea><br><br>
            <label><a title="respuestas">Respuesta:</a></label><br>
            <textarea name="txtrespuesta" rows="10" cols="40" placeholder="~Pendiente~"><?php echo $arreglo[10]?></textarea><br><br>
            
            <label><a title="EL ID DEL DOCUMENTO SE  OBTIENE DE LA TABLA">CREADO POR: <?php echo $arreglo[8]?> <?php echo $arreglo[9]?></a></label><br><br>  
            
            <input type="submit" name="submit" value="Agregar"/>
            
        </form>
         <div><a href="estandar.php">X</a></div>
        
    </body>
    </div>
    
</hmtl>