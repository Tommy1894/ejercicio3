<?php
    $mensaje='';
    include_once("assets/php/crearcarpeta.php");
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

        <h3 class="card-panel teal lighten-5 black-text center">Directorio de Carpetas</h3><br>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class='center-align'>
        <div class="input-field">
            <input type="text" id="idCarpeta" name="txtCarpeta">
            <label for="idCarpeta">Nombre de la carpeta</label>
            <button class="waves-effect deep-orange lighten-2 black-text btn" type='submit' name='carbtn' value='crearcarpeta'>Crear Carpeta</button>
        </div>
    </form>
    
    <table class='striped centered'>
        <thead>
            <tr>
                <th>Carpeta</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <?php
                $carpetas=glob('carpetas/*', GLOB_ONLYDIR);
                foreach($carpetas as $carpeta){
                    $car=basename($carpeta);
                    echo '<tr>';
                    echo "<td>".basename($carpeta)."<td>";
                    echo "<td><a href='assets/php/vercarpeta.php?carpeta=".$car."'><button class='waves-effect deep-orange lighten-2 black-text btn'>Abrir</button></a></td>";
                    echo "<td><a href='assets/php/borrarcarpeta.php?carpeta=".$car."'><button class='waves-effect red lighten-2 black-text btn'>Borrar</button></a></td>";
                    echo '</tr>';
                }
                
                ?>   

</tbody>
</table>
<form action="assets/php/crearnota.php" method="POST" class='center-align'>
    <br><br>
    <button class="waves-effect deep-orange lighten-2 black-text btn " type='submit' name='notabtn' value='crearnota'>Crear Nota</button>
</form>
            <br><br><h5 class="center-align"><?php echo $mensaje?></h4> <br><br>
        </div>
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