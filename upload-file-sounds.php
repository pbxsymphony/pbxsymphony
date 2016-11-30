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

        <h2> Asterisk Sound Prompts</h2>

            <h3> Sound Prompt Formats </h3>
            <p>Sound prompts come in a variety of file formats, such as .wav and .ulaw files. When asked to play a sound prompt from disk, Asterisk plays the sound prompt with the file format that can most easily be converted to the CODEC of the current call. For example, if the inbound call is using the alaw CODEC and the sound prompt is available in .gsm and .ulaw format, Asterisk will play the .ulaw file because it requires fewer CPU cycles to transcode to the alaw CODEC.
            You can type the command core show translation at the Asterisk CLI to see the transcoding times for various CODECs. The times reported (in Asterisk 1.6.0 and later releases) are the number of microseconds it takes Asterisk to transcode one second worth of audio. These times are calculated when Asterisk loads the codec modules, and often vary slightly from machine to machine.  To perform a current calculation of translation times, you can type the command core show translation recalc 60.
            </p>
            <p>Asterisk is very choosy in the case of file format. if you have Welcome message in WAV file format so it must be PCM emcoded , 16 Bits at 8000 HZ.</p>

            <h4> Example </h4>
<pre>
exten => s,1,NoOp()
exten => s,n,Answer
exten => s,n,Playback(prompts/music-on-hold.wav)
exten => s,n,Hangup</pre>

<p>The files are save in directory <b>/usr/share/asterisk/sounds/prompts</b></p>


<br/>


                        
            <form action="upload-sounds.php" method="post" enctype="multipart/form-data">
              <table style="" border="0" width="100%">
                <tbody>
              <tr>
                <th colspan="2" rowspan="1" align="left">Cargue el archivo (wav): <br><br></th>
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
