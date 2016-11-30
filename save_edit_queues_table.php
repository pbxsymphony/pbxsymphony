<?php
session_start();

if ( isset($_SESSION['k_username']) OR isset($_SESSION['k_user']) ) {  } else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$id=$_POST['id'];
$name=$_POST['name'];
$musiconhold=$_POST['musiconhold'];	
$announce=$_POST['announce'];	
$context=$_POST['context'];
$timeout=$_POST['timeout'];
$monitor_join=$_POST['monitor_join'];
$monitor_format=$_POST['monitor_format'];
$queue_youarenext=$_POST['queue_youarenext'];
$queue_thereare=$_POST['queue_thereare'];
$queue_callswaiting=$_POST['queue_callswaiting'];
$queue_holdtime=$_POST['queue_holdtime'];
$queue_minutes=$_POST['queue_minutes'];
$queue_seconds=$_POST['queue_seconds'];
$queue_lessthan=$_POST['queue_lessthan'];
$queue_thankyou=$_POST['queue_thankyou'];
$queue_reporthold=$_POST['queue_reporthold'];
$announce_frequency=$_POST['announce_frequency'];
$announce_round_seconds=$_POST['announce_round_seconds'];
$announce_holdtime=$_POST['announce_holdtime'];
$retry=$_POST['retry'];
$wrapuptime=$_POST['wrapuptime'];
$maxlen=$_POST['maxlen'];
$servicelevel=$_POST['servicelevel'];
$strategy=$_POST['strategy'];
$joinempty=$_POST['joinempty'];
$leavewhenempty=$_POST['leavewhenempty'];
$eventmemberstatus=$_POST['eventmemberstatus'];
$eventwhencalled=$_POST['eventwhencalled'];
$reportholdtime=$_POST['reportholdtime'];
$memberdelay=$_POST['memberdelay'];
$weight=$_POST['weight'];
$timeoutrestart=$_POST['timeoutrestart'];
$periodic_announce=$_POST['periodic_announce'];
$periodic_announce_frequency=$_POST['periodic_announce_frequency'];
$ringinuse=$_POST['ringinuse'];
$setinterfacevar=$_POST['setinterfacevar'];
$observation=$_POST['observation'];


include("database.php");

	$sql = sprintf("UPDATE queue_table SET name='$name', musiconhold='$musiconhold', announce='$announce', context='$context', timeout='$timeout', monitor_join='$monitor_join', monitor_format='$monitor_format', queue_youarenext='$queue_youarenext', queue_thereare='$queue_thereare', queue_callswaiting='$queue_callswaiting', queue_holdtime='$queue_holdtime', queue_minutes='$queue_minutes', queue_seconds='$queue_seconds', queue_lessthan='$queue_lessthan', queue_thankyou='$queue_thankyou', queue_reporthold='$queue_reporthold', announce_frequency='$announce_frequency', announce_round_seconds='$announce_round_seconds', announce_holdtime='$announce_holdtime', retry='$retry', wrapuptime='$wrapuptime', maxlen='$maxlen', servicelevel='$servicelevel', strategy='$strategy', joinempty='$joinempty', leavewhenempty='$leavewhenempty', eventmemberstatus='$eventmemberstatus', eventwhencalled='$eventwhencalled', reportholdtime='$reportholdtime', memberdelay='$memberdelay', weight='$weight', timeoutrestart='$timeoutrestart', periodic_announce='$periodic_announce', periodic_announce_frequency='$periodic_announce_frequency', ringinuse='$ringinuse', setinterfacevar='$setinterfacevar', observation='$observation' WHERE id='$id'");

	
	$guardar = mysql_query($sql);
	if(!$guardar){
	echo "<script>alert('Error en Insert validar con Administracion');</script>";
	die("<script>alert('Verificar informacion');</script>");
		header("Location: index-sip-queues.php");
	} else {
	echo "<script>alert('Se Crea Informacion de Alumno de la Base de Datos');</script>";
		header("Location: index-sip-queues.php");
	}
	mysql_close();
?>