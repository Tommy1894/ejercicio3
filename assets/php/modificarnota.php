<?php
    $carpeta=$_GET['carpeta'];
    $archivo=$_GET['archivo'];
    $file=fopen("../../carpetas/".$carpeta."/".$archivo,"r");

    $contenido= fread($file, filesize("../../carpetas/".$carpeta."/".$archivo));

    
    fclose($file);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Block de notas</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <style>
        #idConte{
            border: red 1px solid;
            border-radius: 10px;
        }
        #idConte:hover{
            border: red 2px solid;
            border-radius: 14px;
        }
        body{
            background-color: #ffffff;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 15pt;
        }
        .input-field label {
            font-size: 14pt;
        }
        label {
            font-size: 12pt;
        }
    </style>
</head>
<body>
    <nav id="bloc" class="nav-wrapper deep-orange lighten-2">
        <div class="container">
            <div>
                <a class="brand-logo center">Bloc de Notas</a>
            </div>
        </nav>
    </div>
    
    <br><br>
    
    <div class="container">
        <div class="container">
        <h3 class="card-panel teal lighten-5 black-text center">Modificar Nota</h3><br>
        <form action="<?php $_SERVER['PHP_SELF'] ?>"  method="POST">
            <label for="idCarpeta" >Ubicación</label>
            <select class="input-field" name="txtCarpeta" id='idCarpeta' required>
                <?php
                    $carpetas = glob('../../carpetas/*', GLOB_ONLYDIR);
                    foreach ($carpetas as $carpeta) {
                        $nombre_carpeta = basename($carpeta);
                        echo "<option value='$nombre_carpeta'>$nombre_carpeta</option>";
                    }
                    ?>
        </select>
        <div class="input-field">
            <input required type="text" name='txtNombre' id='idNombre' value='<?php echo basename($archivo,".txt")?>'><br>
            <label for="idNombre">Nombre</label>
        </div>
    </div><br>
        <textarea required class="materialize-textarea" name="txtConte" id="idConte" cols="30" rows="10"><?php echo $contenido?></textarea>
        <br><br>
        <div class="container">
        <div class="center-align">
            <a href=""><button type='submit' name='btn' value='Guardar' class="waves-effect deep-orange lighten-2 black-text btn">Guardar
                <i class="material-icons right">save</i>
            </button></a>
        </form>
            <a href="../../index.php"><button class="waves-effect deep-orange lighten-2 black-text btn">Regresar
                <i class="material-icons right">keyboard_backspace</i>
            </button></a>
        </div>
        </div>
        <?php 
           if(isset($_POST['btn'])){
            if(!is_null($_POST['txtNombre']) && !is_null($_POST['txtConte'])){
                unlink("../../carpetas/".$_GET['carpeta']."/".$_GET['archivo']);
                $mensaje= $_POST['txtConte'];
                $file= '../../carpetas/'.$_POST['txtCarpeta']."/".$_POST['txtNombre'].'.txt';
                $fp= fopen($file,'w');
                fwrite($fp,$mensaje);
                fclose($fp);
                header("Location: ../../index.php");
            }
            else{
                echo "<h5 class='center-align'>No se permite valores vacios</h5>";
            }
            // $dir="notas/$mensaje";
            // echo getcwd();
            // chdir('carpetas');
            // echo "<br>".getcwd();
            
            // if(!file_exists($dir)){
            //     mkdir($dir,0777,true);
            // }
        }
            
        ?>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, );
  });
    </script>

</body>

</html>