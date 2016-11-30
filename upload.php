<?php
session_start();
if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 
?>
<!DOCTYPE html>

<html lang="es">
<head>
<?php
include 'title.php';
?>
</head>

<body role="document">

  <?php

    if ( isset($_SESSION['k_username']) ) { include 'head_menu.php'; }

  ?>
    <div class="container-fluid">
        <div class="well" >

            <?php

            //ini_set('html_errors', true);
            //ini_set('display_errors', true);

            $status = "";
            $ti=microtime(true);

            if ($_POST["action"] == "upload") {
              // obtenemos los datos del archivo 
              $tamano = $_FILES["archivo"]['size'];
              if ($tamano < 1048576){
                  $tipo = $_FILES["archivo"]['type'];
                  $archivo = $_FILES["archivo"]['name'];
                  $prefijo = substr(md5(uniqid(rand())),0,6);
                  if ($archivo != "") {
                    $destino =  "temp/".substr($archivo,0,-4)."-".date("Ymd-His").".txt";
                    if(copy($_FILES['archivo']['tmp_name'],$destino)) {
                		echo "Archivo subido: /var/www/html/temp/".$destino."</b> <br>\n";
                    }else{
                        echo "El formato del archivo no corresponde <br>\n";
                    }
                  }else{
                      $status = "Error al subir el archivo <br>\n";
                  }
              }
            }else{
                $status = "Error al subir archivo <br>\n";
            }
              
            $tf=microtime(true);

            $log_directory = '/var/www/html/temp/';

            $results_array = array();

            if (is_dir($log_directory))
            {
                    if ($handle = opendir($log_directory))
                    {
                            //Notice the parentheses I added:
                            while(($file = readdir($handle)) !== FALSE)
                            {
                                    $results_array[] = $file;
                            }
                            closedir($handle);
                    }
            }
            ?>

        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>

</html>