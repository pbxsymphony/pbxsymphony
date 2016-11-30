<?php
	session_start();
	if (isset($_SESSION['k_username'])) { /*echo 'user:'.$_SESSION["k_username"];*/} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

?>
			
<!DOCTYPE html>
<html lang="en">
 <title>PBX Symphony</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="stylesheet" href="css/mistyle.css">
</head>
<body>

	<?php
	include 'head_menu.php'; 
	?>
    
    <div class="container">
    <?php if($mensaje !=""){ echo '<div class="alert alert-warning">'.$mensaje.'</div>'; } ?> 
    
    <div class="well" >
		<H2><span class="label label-info">Crear Extensions</span></H2>
        <form class="form-horizontal" action="save_extensions.php" method="post" >
        <fieldset>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name"> Context </label>  
          <div class="col-md-4">
          <input id="context" name="context" type="text" placeholder="Context" class="form-control input-md">
          <span class="help-block"> Ejemplo: from-sip</span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="callerid"> Exten	</label>  
          <div class="col-md-4">
          <input id="exten" name="exten" type="text" placeholder="Exten" class="form-control input-md">
          <span class="help-block"> Ejemplo: 56226568753 o _X. </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="defaultuser"> Priority </label>  
          <div class="col-md-4">
          <input id="priority" name="priority" type="text" placeholder="priority" class="form-control input-md">
          <span class="help-block"> Ejemplo: 1 </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="regexten"> APP </label>  
          <div class="col-md-4" >
          <!--<input id="app" name="app" type="text" placeholder="APP" class="form-control input-md"> !-->

          <select class="form-control" id="app" name="app"> 
          <option>AddQueueMember</option>
          <option>ADSIProg</option>
          <option>AELSub</option>
          <option>AgentLogin</option>
          <option>AgentMonitorOutgoing</option>
          <option>AGI</option>
          <option>AlarmReceiver</option>
          <option>AMD</option>
          <option>Answer</option>
          <option>Authenticate</option>
          <option>BackGround</option>
          <option>BackgroundDetect</option>
          <option>Bridge</option>
          <option>Busy</option>
          <option>CallCompletionCancel</option>
          <option>CallCompletionRequest</option>
          <option>CELGenUserEvent</option>
          <option>ChangeMonitor</option>
          <option>ChanIsAvail</option>
          <option>ChannelRedirect</option>
          <option>ChanSpy</option>
          <option>ClearHash</option>
          <option>ConfBridge</option>
          <option>Congestion</option>
          <option>ContinueWhile</option>
          <option>ControlPlayback</option>
          <option>DAHDIBarge</option>
          <option>DAHDIRAS</option>
          <option>DAHDIScan</option>
          <option>DAHDISendCallreroutingFacility</option>
          <option>DAHDISendKeypadFacility</option>
          <option>DateTime</option>
          <option>DBdel</option>
          <option>DBdeltree</option>
          <option>DeadAGI</option>
          <option>Dial</option>
          <option>Dictate</option>
          <option>Directory</option>
          <option>DISA</option>
          <option>DumpChan</option>
          <option>EAGI</option>
          <option>Echo</option>
          <option>EndWhile</option>
          <option>Exec</option>
          <option>ExecIf</option>
          <option>ExecIfTime</option>
          <option>ExitWhile</option>
          <option>ExtenSpy</option>
          <option>ExternalIVR</option>
          <option>Flash</option>
          <option>FollowMe</option>
          <option>ForkCDR</option>
          <option>GetCPEID</option>
          <option>Gosub</option>
          <option>GosubIf</option>
          <option>Goto</option>
          <option>GotoIf</option>
          <option>GotoIfTime</option>
          <option>Hangup</option>
          <option>IAX2Provision</option>
          <option>ImportVar</option>
          <option>Incomplete</option>
          <option>Log</option>
          <option>Macro</option>
          <option>MacroExclusive</option>
          <option>MacroExit</option>
          <option>MacroIf</option>
          <option>MailboxExists</option>
          <option>MeetMe</option>
          <option>MeetMeAdmin</option>
          <option>MeetMeChannelAdmin</option>
          <option>MeetMeCount</option>
          <option>Milliwatt</option>
          <option>MixMonitor</option>
          <option>Monitor</option>
          <option>Morsecode</option>
          <option>MSet</option>
          <option>MusicOnHold</option>
          <option>MYSQL</option>
          <option>NBScat</option>
          <option>NoCDR</option>
          <option>NoOp</option>
          <option>Originate</option>
          <option>Page</option>
          <option>Park</option>
          <option>ParkAndAnnounce</option>
          <option>ParkedCall</option>
          <option>PauseMonitor</option>
          <option>PauseQueueMember</option>
          <option>Pickup</option>
          <option>PickupChan</option>
          <option>Playback</option>
          <option>PlayTones</option>
          <option>PrivacyManager</option>
          <option>Proceeding</option>
          <option>Progress</option>
          <option>Queue</option>
          <option>QueueLog</option>
          <option>RaiseException</option>
          <option>Read</option>
          <option>ReadExten</option>
          <option>ReadFile</option>
          <option>Record</option>
          <option>RemoveQueueMember</option>
          <option>ResetCDR</option>
          <option>RetryDial</option>
          <option>Return</option>
          <option>Ringing</option>
          <option>SayAlpha</option>
          <option>SayCountedAdj</option>
          <option>SayCountedNoun</option>
          <option>SayCountPL</option>
          <option>SayDigits</option>
          <option>SayNumber</option>
          <option>SayPhonetic</option>
          <option>SayUnixTime</option>
          <option>SendDTMF</option>
          <option>SendImage</option>
          <option>SendText</option>
          <option>SendURL</option>
          <option>Set</option>
          <option>SetAMAFlags</option>
          <option>SetCallerPres</option>
          <option>SetMusicOnHold</option>
          <option>SIPAddHeader</option>
          <option>SIPDtmfMode</option>
          <option>SIPRemoveHeader</option>
          <option>SLAStation</option>
          <option>SLATrunk</option>
          <option>SMS</option>
          <option>SoftHangup</option>
          <option>SpeechActivateGrammar</option>
          <option>SpeechBackground</option>
          <option>SpeechCreate</option>
          <option>SpeechDeactivateGrammar</option>
          <option>SpeechDestroy</option>
          <option>SpeechLoadGrammar</option>
          <option>SpeechProcessingSound</option>
          <option>SpeechStart</option>
          <option>SpeechUnloadGrammar</option>
          <option>StackPop</option>
          <option>StartMusicOnHold</option>
          <option>StopMixMonitor</option>
          <option>StopMonitor</option>
          <option>StopMusicOnHold</option>
          <option>StopPlayTones</option>
          <option>System</option>
          <option>TestClient</option>
          <option>TestServer</option>
          <option>Transfer</option>
          <option>TryExec</option>
          <option>TrySystem</option>
          <option>UnpauseMonitor</option>
          <option>UnpauseQueueMember</option>
          <option>UserEvent</option>
          <option>Verbose</option>
          <option>VMAuthenticate</option>
          <option>VMSayName</option>
          <option>VoiceMail</option>
          <option>VoiceMailMain</option>
          <option>Wait</option>
          <option>WaitExten</option>
          <option>WaitForNoise</option>
          <option>WaitForRing</option>
          <option>WaitForSilence</option>
          <option>WaitMusicOnHold</option>
          <option>WaitUntil</option>
          <option>While</option>
          <option>Zapateller</option>
          </select>
          <span class="help-block"> Ejemplo: Dial </span>
          </div>
        </div>
                <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="secret"> Appdata </label>  
          <div class="col-md-4">
          <input id="appdata" name="appdata" type="text" placeholder="Appdata" class="form-control input-md">
          <span class="help-block"> Ejemplo: CALLERID(num)=56226567790 </span>
          </div>
        </div>
               

       <!-- Textarea -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="checks_obs">Observaciones</label>
          <div class="col-md-4">                     
            <textarea class="form-control" id="checks_obs" name="checks_obs" placeholder="Observaci&oacute;n " ></textarea>
          </div>
        </div>
        
        <!-- Multiple Checkboxes -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Submit"></label>
          <div class="col-md-8">
            <button id="Submit" name="Submit" type="submit" class="btn btn-success">Guardar</button>
            <button id="Reset" name="Reset" type="reset" class="btn btn-danger">Reset</button>
          </div>
        </div>
        
        </fieldset>
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
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>