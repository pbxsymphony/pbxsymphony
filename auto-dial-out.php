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
            <p> List Files </p>
            <table id="table" class="table table-bordered table-hover"> 
            <thead>
            <tr class="success">
            <th></th>
            <th></th>
            <th>File</th> 
            <th>Calls</th> 
            <th>Tiempo Aprox.</th>
            <th></th>
            </tr> 
            </thead> 
            <tbody>
            <?php
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


            //Output findings
            foreach($results_array as $files)
            {
                
                if ( $files != ".") {
                    if ( $files != "..") { 
                      ?>
                          <tr >
                          <td><a target="_blank" class="btn btn-success" href="temp/<?php echo $files ; ?>" >View</a></td>
                          <td><a class="btn btn-info" onClick="$.get('process_file.php?files=<?php echo $files; ?>');"   id="load" data-loading-text="<span class='glyphicon glyphicon-ban-circle' ></span> Loading" >Process</a> </td>
                          <!--<a class='label label-default' style='background-color:#2E2EFE;' onClick=\"$.get('review_chlogbks.php?idlogbk=%s&idelemt=%s&idcheck=%s&status=M'); $('#%s').toggle( 'explode' );\" >M</a>  !-->
                          <!--<td> <a class="btn btn-info" href="process_file.php?files=<?php  $files; ?>" tarjet="_blank" >Process</a></td>!-->

                          <td><?php echo $files; ?></td>
                          <td><?php $calls=count(file('temp/'.$files)) - 1; echo $calls; ?>
                          <td><?php $tiempototal=($calls/12)/60;echo intval($tiempototal).' minutos' ; ?></td>                          
                          <td><a class="btn btn-warning" href="delete_file.php?delete_files=<?php echo $files; ?>"');" > Delete </a> </td>
								      
                          </tr>
                      <?php

                      $lines=array();
                      $fp=fopen('temp/'.$files, 'r');
                      while (!feof($fp))
                      {
                          $line=fgets($fp);

                          //process line however you like
                          $line=trim($line);

                          //add to array
                          $lines[]=$line;

                      }
                      fclose($fp);

                    }
                }
            }
            ?>
          </tbody>
        </table>

        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <script>
        $('#load').on('click', function() {

            var $this = $(this);
          $this.button('loading');
          setTimeout(function() {
          $this.button('reset');
          }, 60000);
        });
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>

</html>
