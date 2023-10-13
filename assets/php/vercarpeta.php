<?php
    if(isset($_GET['carpeta'])){
        $carpeta=$_GET['carpeta'];
        if(isset($_GET['eliminar'])){
            $archivo=$_GET['eliminar'];
            unlink("../../carpetas/".$carpeta."/".$archivo);
        }
        $archivos=glob("../../carpetas/".$carpeta."/*.txt");
        // foreach($archivos as $archivo){
        //     $nombre=basename($archivo);
        //     echo '<a href=vernota.php?carpeta='.$carpeta.'&archivo='.$nombre.'>'.$nombre.'</a>';
        // }
        
    }
    
   
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
        body{
            background-color: #ffffff;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 15pt;
        }
        .input-field label {
            font-size: 14pt;
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

        <h3 class="card-panel teal lighten-5 black-text center">Directorio de Notas</h3><br>
        
    <div class="responsive-table">
    <table class='striped centered'>
        <thead>
            <tr>
                <th>Notas</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <?php
                $carpetas=glob('carpetas/*', GLOB_ONLYDIR);
                    foreach($archivos as $archivo){
                        $nombre=basename($archivo);
                        echo '<tr>';
                        echo "<td>".basename($archivo)."<td>";
                        echo "<td><a href='vernota.php?carpeta=".$carpeta."&archivo=".$nombre."'><button class='waves-effect deep-orange lighten-2 black-text btn'>Ver</button></a></td>";
                        echo "<td><a href='modificarnota.php?carpeta=".$carpeta."&archivo=".$nombre."'><button class='waves-effect deep-orange lighten-2 black-text btn'>Modificar</button></a></td>";
                        echo "<td><a href='vercarpeta.php?carpeta=".$carpeta."&archivo=".$nombre."&eliminar=".$nombre."'><button class='waves-effect red lighten-2 black-text btn'>Borrar</button></a></td>";
                        echo '</tr>';
                    }
                
                ?>   

</tbody>
</table>
</div>
<form action="crearnota.php" method="POST" class='center-align'>
    <br><br>
    <button class="waves-effect deep-orange lighten-2 black-text btn " type='submit' name='notabtn' value='crearnota'>Crear Nota</button>
</form>
<form action="../../index.php" method="POST" class='center-align'>
    <br><br>
    <button class="waves-effect deep-orange lighten-2 black-text btn " type='submit' name='notabtn' value='crearnota'>Regresar</button>
</form>
        </div>
    </div>
    
</body>
</html>
