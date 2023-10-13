<?php
    if(isset($_POST['carbtn'])){
        $dir='carpetas/'.$_POST['txtCarpeta'];
        if(!file_exists($dir)){
            mkdir($dir,0777,true);
            $mensaje= "se creo la carpeta";
        }
        else{
            $mensaje= "la carpeta ya existe";
        }
    }
?>