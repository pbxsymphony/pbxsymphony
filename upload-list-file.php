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
            <th></th> 
            <th></th> 
            <th>File</th> 
            <th></th>
            </tr> 
            </thead> 
            <tbody>
            <?php

            $log_directory = 'prompts/';

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
                          <td><a href=" prompts/<?php echo $files; ?>" > Play </a> </td>
                          <td><a href="converter_file.php?file=<?php echo $files; ?>&ext=ulaw" > ulaw </a> </td>
                          <td><a href="converter_file.php?file=<?php echo $files; ?>&ext=alaw" > ulaw </a> </td>
                          <td><a href="converter_file.php?file=<?php echo $files; ?>&ext=gsm" > gsm </a> </td>
                          <td><?php echo $files; ?></td>
                          <td><a class="btn btn-warning" href="delete-file-sounds.php?delete_files=<?php echo $files; ?>" > Delete </a> </td>
								      
                          </tr>
                      <?php

                    }
                }
            }
            ?>
          </tbody>
        </table>

        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>

</html>
