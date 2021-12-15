<?php
    /*
        * Ejercicio 2
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * Última modificación: 25/11/2021
    */
    //Incluir el archivo de configuración
    include '../config/confDB.php';
    //Si no se ha autenticado el usuario
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="Contenido restringido"'); //Pedir autenticación con el header
        header("HTTP/1.0 401 Unauthorized"); //Error en caso de credenciales incorrecas
        exit; //No ejecutar lo de debajo
    }
    //Si ha introducido credenciales: Comprobación
    else{
        try{
            //Conexión con la base de datos
            $miDB = new PDO(HOST, USER, PASSWORD);
            //Configuración de atributos de errores
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Elaboración de la consulta
            $consulta=<<<QUERY
                    SELECT T01_Password FROM T01_Usuario
                    WHERE T01_CodUsuario ='$_SERVER[PHP_AUTH_USER]'
                    QUERY;
            //Preparación de la consulta
            $resultadoConsulta = $miDB->prepare($consulta);
            //Ejecución de la consulta
            $resultadoConsulta->execute();
            //Extración de los resultados a un objeto PHP
            $oRegistro = $resultadoConsulta->fetch(PDO::FETCH_OBJ);
            //Si los datos introducidos no coinciden con los del usuario de la base de datos
            if($oRegistro->T01_Password != hash('sha256', $_SERVER['PHP_AUTH_USER'].$_SERVER['PHP_AUTH_PW'])){
                //Vuelve a pedir autenticación
                header('WWW-Authenticate: Basic realm="Contenido restringido"'); 
                header("HTTP/1.0 401 Unauthorized"); 
                exit;
            }
            //Si las credenciales son correctas
            else{
                //Mostrado de mensaje, nombre de usuario y hash de la contraseña
                echo "<h1>Logueado con éxito!</h1>";
                echo "Nombre de usuario: ".$_SERVER['PHP_AUTH_USER']."<br>";
                echo "Hash de la contraseña: ".hash("sha256",$_SERVER['PHP_AUTH_PW']);
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
