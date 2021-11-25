<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-DWES - Ejercicio 0</title>
    </head>
    <body>
        <?php
        /*
            * Ejercicio 0
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 25/11/2021
        */
        ?>
        <main>
            <h1>$_SERVER</h1>
            <pre>
            <?php
                print_r($_SERVER);
            ?>
            </pre>
            <h1>$_SESSION</h1>
            <pre>
            <?php
                print_r(!isset($_SESSION)?"Variable no inicializada":$_SESSION);
            ?>
            </pre>
            <h1>$_COOKIE</h1>
            <pre>
            <?php
                print_r($_COOKIE);
            ?>
            </pre>
            <h1>$_REQUEST</h1>
            <pre>
            <?php
                print_r($_REQUEST);
            ?>
            </pre>
            <h1>$_FILES</h1>
            <pre>
            <?php
                print_r($_FILES);
            ?>
            </pre>
            <h1>phpinfo()</h1>
            <?php
                phpinfo();
            ?>
        </main>
    </body>
</html>
