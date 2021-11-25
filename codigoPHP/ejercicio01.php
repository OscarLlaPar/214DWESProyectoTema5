<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
            * Ejercicio 1
            * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
            * Última modificación: 25/11/2021
        */
        $aErrores= [
            'usuario' => null,
            'password' => null
        ];
        $aRespuestas= [
            'usuario' => null,
            'password' => null
        ];
        $entradaOK = true;
        if(isset($_REQUEST['enviar'])){
            
        }
        else{
            $entradaOK=false;
        }
        if($entradaOK){
            $aRespuestas= [
            'usuario' => $_REQUEST['usuario'],
            'password' => $_REQUEST['password']
            ];
        }
        else{
        ?>
        <form>
            <fieldset>
                <legend>Log in</legend>
                
            </fieldset>
        </form>
        <?php
        }
        ?>
    </body>
</html>
