<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $numero = $_POST["numero"];
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");
        $data = [
            "nombre" => $nombre,
            "numero" => intval($numero),
            "fecha" => $fecha
        ];

        $jsonFile = 'noti.json';
        $jsonData = json_decode(file_get_contents($jsonFile), true);
        $jsonData[] = $data;
        $jsonContent = json_encode($jsonData, JSON_PRETTY_PRINT);
        file_put_contents($jsonFile, $jsonContent);
        echo "Datos recibidos y guardados correctamente.";

    } else {
        echo "Acceso no válido.";
        
    }
?>
