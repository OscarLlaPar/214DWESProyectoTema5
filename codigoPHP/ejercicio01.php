<?php
        /*
            * Ejercicio 1
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 25/11/2021
        */
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Contenido restringido"');
    header("HTTP/1.0 401 Unauthorized");
exit;
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
            echo "Nombre de usuario: ".$_SERVER['PHP_AUTH_USER']."<br>";
            echo "Hash de la contraseña: ".hash("sha256",$_SERVER['PHP_AUTH_PW']);
            
            unset($_SERVER["PHP_AUTH_USER"]);
            unset($_SERVER["PHP_AUTH_PW"]); 
        ?>
    </body>
</html>
