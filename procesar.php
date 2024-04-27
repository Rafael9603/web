<?php
$directorio_destino = '/srv/http/';
$archivo_destino = $directorio_destino . basename($_FILES['archivo']['name']);

// Verifica si el archivo se está cargando correctamente
if ($_FILES['archivo']['error'] !== UPLOAD_ERR_OK) {
    echo "Error al cargar el archivo: " . $_FILES['archivo']['error'];
    exit; // Detén la ejecución del script si hay un error
}

// Muestra información sobre el archivo temporal
echo "Nombre del archivo temporal: " . $_FILES['archivo']['tmp_name'] . "<br>";

// Verifica si la ubicación temporal del archivo es accesible
if (!is_uploaded_file($_FILES['archivo']['tmp_name'])) {
    echo "La ubicación temporal del archivo no es accesible.";
    exit; // Detén la ejecución del script si la ubicación temporal no es accesible
}

// Intenta mover el archivo al directorio de destino
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo_destino)) {
    echo "El archivo ha sido subido correctamente.";
} else {
    echo "Hubo un error al subir el archivo.";
}
?>