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

        <h2> Asterisk auto-dial out / Asterisk Call Files</h2>

            <p> Asterisk call files are structured files which, when moved to the appropriate directory, 
              are able to automatically place calls using Asterisk. Call files are a great way place calls 
              automatically without using more complex Asterisk features like the AGI, AMI, and dialplan, 
              and require very little technical knowledge to use.</p>
            <p> /var/spool/asterisk/outgoing/ </p>
            
            <h3>Example outgoing file</h3>
            <pre>
Channel: local/1000@auto-dialout
Callerid: 56226560800
MaxRetries: 2
RetryTime: 60
WaitTime: 30
Context: auto-dialout
Extension: 56979996470</pre>

            <h3>Example upload File </h3>
            <pre>
Channel,Callerid,MaxRetries,RetryTime,WaitTime,Context,Extension
local/10@from-sip,56226560800,2,60,30,from-sip,56979996470
local/10@from-sip,56226560800,2,60,30,from-sip,56987864489</pre><br/>
                        
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <table style="" border="0" width="100%">
                <tbody>
              <tr>
                <th colspan="2" rowspan="1" align="left">Cargue el archivo (TXT|CVS): <br><br></th>
              </tr>
              <tr>
                <td style="width: 162px;"><input name="archivo" type="file" size="35" /></td>
                <td style="width: 600px;">
                  <input name="enviar" type="submit" value="Upload File" class="btn btn-danger" />
                  <input name="action" type="hidden" value="upload" class="btn btn-success" /> 
                </td>
                </tr>       
                </tbody>
              </table>
            </form>

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
