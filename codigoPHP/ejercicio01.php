<?php
        /*
            * Ejercicio 1
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 25/11/2021
        */
        //Si el usuario/password no son admin/paso
    if ($_SERVER['PHP_AUTH_USER']!='admin' || $_SERVER['PHP_AUTH_PW']!='paso') {
        header('WWW-Authenticate: Basic realm="Contenido restringido"'); //Pedir autenticación con el header
        header("HTTP/1.0 401 Unauthorized");  //Error en caso de credenciales incorrecas
        exit; //No ejecutar lo de debajo
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
            echo "Nombre de usuario: ".$_SERVER['PHP_AUTH_USER']."<br>"; //Mostrado del nombre de usuario
            echo "Hash de la contraseña: ".hash("sha256",$_SERVER['PHP_AUTH_PW']); //Mostrado del hash de la contraseña (sha256)
        ?>
    </body>
</html>
