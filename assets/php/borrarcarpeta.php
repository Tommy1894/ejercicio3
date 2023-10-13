<?php   
    function eliminararchivos($carpeta) {
        if (is_dir($carpeta)) {
            $archivos = scandir($carpeta);
            foreach ($archivos as $archivo) {
                if ($archivo != '.' && $archivo != '..') {
                    $ruta = $carpeta . '/' . $archivo;
                    if (is_dir($ruta)) {
                        eliminararchivos($ruta);
                    } else {
                        unlink($ruta);
                    }
                }
            }
            rmdir($carpeta);
        }
    }
    if (isset($_GET['carpeta'])) {
        $carpeta = $_GET['carpeta'];
    
        // Verifica que el nombre de la carpeta sea seguro (puedes agregar más validaciones si es necesario).
       
            $ruta_carpeta = '../../carpetas/'.$carpeta;
    
            if (is_dir($ruta_carpeta)) {
                eliminararchivos($ruta_carpeta);
                echo "Carpeta '$carpeta' y su contenido han sido eliminados con éxito.";
                header('Location: ../../index.php');
            } else {
                echo "La carpeta '$carpeta' no existe.";
            }
        
    } else {
        echo "No se proporcionó el nombre de la carpeta a eliminar.";
    }
?>