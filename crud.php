<?php
/*
 * RobertLara
 */
define("FILE_LOG", "logs.txt"); //Nom del fitxer

$today = getdate(); //Obtenim la data actual
file_put_contents(FILE_LOG, $_SERVER['REQUEST_METHOD'] . " " . $today['year'] . "-" . $today['month'] . "-" . $today['mday'] . "//" . $today['hours'] . ":" . $today['minutes'] . ":" . $today['seconds'] . "" . chr(13) . chr(10), FILE_APPEND | LOCK_EX); //Registrem request en un log

if ($_SERVER['REQUEST_METHOD'] == 'GET') { //Read
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (file_exists($id . ".txt")) {
            $file = fopen($id . ".txt", "r"); //Permisos de lectura
            $result = fread($file, 9000); //Buffer suficient per llegir el fitxer
            fclose($file);
            echo $result;
        } else {
            echo "El fitxer no existeix";
        }
    } else { //Mostrem tots els fitxers
        $dir = opendir("."); //ruta actual
        while ($file = readdir($dir)) //arxiu per arxiu
        {
            if (!is_dir($file) && substr($file, -3) == "txt" && $file != FILE_LOG) //Mostrem els fitxers txt excepte el del log
            {
                echo $file . " "; //Nom del fitxer
            }
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Actualizar
    $id = $_POST['id'];
    $name = $_POST['name'];
    if (file_exists($id . ".txt")) {
        $file = fopen($id . ".txt", "w"); //Obrim el fitxer
        $body = "id: " . $id . chr(13) . chr(10) . "name: " . $name; //Guardem les dades
        fwrite($file, $body, 9000); //Inserta el contingut
        fclose($file); //Tanquem el fitxer
        echo "Fitxer actualitzat";
    } else { //En cas de no exitir el fitxer
        echo "El fitxer no existeix";
    }

} else if ($_SERVER['REQUEST_METHOD'] == 'PUT') { //Inserta
    parse_str(file_get_contents("php://input"), $str);
    $id = $str['id'];
    $name = $str['name'];
    if (file_exists($id . ".txt"))
        echo "El fitxer ya exiteix. Se esta sobreescribint";
    $file = fopen($id . ".txt", "w"); //Obre el fitxer
    $body = "id: " . $id . chr(13) . chr(10) . "name: " . $name; //Contingut
    fwrite($file, $body, 9000); //Dades a desar
    fclose($file); //Tanquem el fitxer
    echo "Fitxer creat";

} else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') { //Eliminar
    parse_str(file_get_contents("php://input"), $str);
    $id = $str['id'];
    if (file_exists($id . ".txt")) { //En cas d'existir
        unlink($id . ".txt"); //Elimina
        echo "Fitxer eliminat";
    } else {
        echo "El fitxer no existeix"; //En cas de no existir
    }
} else {
    $retval = array('estat' => 'ERROR'); //En cas d'error
}


?>