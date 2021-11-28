<?php
        /*
            * Ejercicio 2
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 25/11/2021
        */
        //Incluir el archivo de configuración
    include '../config/confDB.php';
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Contenido restringido"');
    header("HTTP/1.0 401 Unauthorized");
exit;
}
else{
    try{
        $miDB = new PDO(HOST, USER, PASSWORD);
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $consulta=<<<QUERY
                SELECT T01_CodUsuario, T01_Password FROM T01_Usuario
                WHERE T01_CodUsuario ='$_SERVER[PHP_AUTH_USER]'
                QUERY;
    
        $resultadoConsulta = $miDB->prepare($consulta);
        $resultadoConsulta->execute();
        $oRegistro = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
        if(($oRegistro->T01_CodUsuario == $_SERVER['PHP_AUTH_USER']) && ($oRegistro->T01_Password == hash('sha256', $_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW']))){
            echo "Nombre de usuario: ".$_SERVER['PHP_AUTH_USER']."<br>";
            echo "Hash de la contraseña: ".hash("sha256",$_SERVER['PHP_AUTH_PW']);
        }
        else{ // Si no existe, se vuelven a pedir las credenciales hasta que se introduzcan correctamente
            header('WWW-Authenticate: Basic realm="Contenido restringido"'); //Muestra de nuevo la cabecera de autentificacion
            header("HTTP/1.0 401 Unauthorized"); //Redirige con el estado Unauthorized
            exit;
        }
    }    
    //Gestión de errores relacionados con la base de datos
    catch(PDOException $miExceptionPDO){
        echo "Error: ".$miExceptionPDO->getMessage();
        echo "<br>";
        echo "Código de error: ".$miExceptionPDO->getCode();
    }
    finally{
     //Cerrar la conexión
     unset($miDB);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
        ?>
    </body>
</html>
