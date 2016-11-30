<?php
session_start();
if (isset($_SESSION['k_username'])) { /* echo 'user:'.$_SESSION["k_username"]; */} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

  include("database.php");

  // Variable de Fecha si esta vacia 

  $fecha=date('Y-m-d');
  $fecha_hora=date('Y-m-d H:m:s');

  $refresh=$_GET['refresh'];

  $event=$_GET['event'];
  if ($event =="") { $event ="ABANDON" ;}
  // inicio Query

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="<?php echo $refresh; ?>">
<meta charset="utf-8">

<?php include 'title.php'; ?>

<script src="js/Chart.js"></script>

</head>
<body>

	<?php
	include 'head_menu.php'; 
	?> <br>


    <div class="container-fluid" >
<h3 class='post-title entry-title' itemprop='name'>
QUEUE_LOG
</h3>
<div class='post-header'>
<div class='post-header-line-1'></div>
</div>
<div class='post-body entry-content' id='post-body-8612946994992009845' itemprop='description articleBody'>
Con el fin de gestionar adecuadamente las colas de ACD (Automatic Call Distribution), es importante hacer un seguimiento detallado de los eventos que se ejecutan en las mismas. Para ello, Asterisk implementa el queue_log, que es un archivo donde se registran dichas acciones en formato de texto plano y por defecto se encuentra en /var/log/asterisk/queue_log.<br />
<br />
Por lo general las herramientas de estadísticas de call center, como Asternic y QueueMetrics, entre otras, basan su funcionamiento en la información que es entregada en este archivo. Por lo tanto, en este artículo nos dedicaremos a analizar en profundidad los datos que podremos encontrar en este log.<br />
<br />
Al editar el archivo, encontraremos que los registros se encuentran con el siguiente formato:<br />
<br />
TIMESTAMP|UNIQUEID|QUEUE_NUMBER|AGENT|EVENT|DATA1|DATA2|DATA3|DATA4|DATA5<br />
<br />
<span style="font-family: Verdana;"><strong>Timestamp:</strong> </span><br />
<span style="font-family: Verdana;">&nbsp;&nbsp;&nbsp;&nbsp; Es la fecha y hora en formato unix time</span><br />
<span style="font-family: Verdana;"><strong>UniqueID:</strong> </span><br />
<span style="font-family: Verdana;">&nbsp;&nbsp;&nbsp;&nbsp; El id único que identifica el canal</span><br />
<span style="font-family: Verdana;"><strong>Queue_number:</strong> </span><br />
<span style="font-family: Verdana;">&nbsp;&nbsp;&nbsp;&nbsp; El numero de interno de la cola o NONE si se trata de un evento general como AGENTLOGOFF</span><br />
<span style="font-family: Verdana;"><strong>Agent:</strong> </span><br />
<span style="font-family: Verdana;">&nbsp;&nbsp;&nbsp;&nbsp; Si el llamado fue asignado a un agente: Tecnología/Interno o NONE si es un evento general como ABANDON</span><br />
<span style="font-family: Verdana;"><strong>Data n:</strong></span><br />
<span style="font-family: Verdana;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Son los valores que retorna cada evento, luego de su ejecución.&nbsp;Por ejemplo la duración de un llamado cuando es finalizado.</span><br />
<br />
<span style="font-family: Verdana;">Ahora que conocemos la estructura general del archivo queue_log, pasaremos a ver en detalle los eventos y los valores que devuelve cada uno.</span><br />
<br />
<span style="font-family: Verdana;"><strong>ABANDON:</strong></span><br />
<span style="font-family: Verdana;">&nbsp;&nbsp;&nbsp;&nbsp; Este evento se produce, cuando una persona abandona su posición en la Cola, antes de ser atendido. Los data que devuelve son: </span><br />
<br />
<span style="font-family: Verdana;">- Data 1: position, la posición que tenía en la cola cuando realizó el hangup</span><br />
<span style="font-family: Verdana;">- Data 2: origposition, la posición en la que entró en la cola</span><br />
<span style="font-family: Verdana;">- Data&nbsp;3: waittime, el tiempo que espero en la cola</span><br />
<br />
<strong>&nbsp;AGENTDUMP:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; El agente rechazó el llamado, mientras el cliente escuchaba el anuncio de la cola.<br />
<br />
<strong>AGENTLOGIN:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El agente es logueado.<br />
<br />
- Data 1: channel, el canal donde se genero el logueo<br />
<br />
<strong>AGENTCALLBACKLOGIN:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El agente del tipo "callback" es logueado en la cola. Un agente del tipo "callback", a diferencia de un "agent/"&nbsp;es aquel que espera los llamados con el teléfono colgado, y en el momento que un llamado entra a la cola el teléfono suena y es logueado a la cola.<br />
<br />
- Data 1: exten@context, el interno@contexto del agente.<br />
<br />
<strong>AGENTLOGOFF:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El agente se desloguea<br />
<br />
- Data 1: channel, el canal donde se origino el deslogueo<br />
- Data 2: logintime, la cantidad de tiempo que el agente estuvo logueado. (en segundos)<br />
<br />
<strong>AGENTCALLBACKLOGOFF:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El agente del tipo "callback" es deslogueado de la cola.<br />
<br />
- Data 1: exten@context, el interno@contexto utilizado por el agente.<br />
- Data 2: logintime, el tiempo que estuvo logueado<br />
- Data 3: reason, la razón por la cual fue deslogueado, si no es un logoff normal. Ej: Autologoff, Chanunavail<br />
<br />
<strong>COMPLETEAGENT:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El llamado fue conectado con un agente, y este fue finalizado normalmente por el agente.<br />
<br />
- Data 1: holdtime, Tiempo que espero el cliente a ser atendido<br />
- Data 2: holdtime, Duración de la llamada<br />
- Data 3: origposition, Posición donde ingresó en que ingresó el llamado a la cola.<br />
<br />
<br />
<strong>COMPLETECALLER:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El llamado fue conectado con un agente, y este fue finalizado normalmente por el cliente.<br />
<br />
<br />
- Data 1: holdtime, Tiempo que espero el cliente a ser atendido<br />
- Data 2: holdtime, Duración de la llamada<br />
- Data 3: origposition, Posición donde ingresó en que ingresó el llamado a la cola.<br />
<br />
<strong>CONFIGRELOAD:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; La configuración ha sido re-cargada. (ej: asterisk -rx "reload")<br />
<br />
<strong>CONNECT:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El llamado fue conectado con un agente.<br />
<br />
- Data 1: holdtime, la cantidad de tiempo que el cliente estuvo en hold<br />
- Data 2: bridgedchanneluniqueid, es el uniqueid del canal del agente que toma el llamado<br />
<br />
<strong>ENTERQUEUE:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; Un llamado ha ingresado a la cola.<br />
<br />
- Data 1: URL, si es especificada<br />
- Data 2: CallerID, Número de teléfono del cliente<br />
<br />
<strong>EXITEMPTY:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; La llamada es rechazada por la cola, debido a que no existen agentes logueados para atender la misma.<br />
<br />
- Data 1: position, posición de la llamada en el momento que fue rechazada<br />
- Data 2: origposition, posición de la llamada cuando ingresó a la cola<br />
- Data 3: waittime, tiempo de espera<br />
<br />
<strong>EXITWITHKEY:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El cliente utilizó una opción del menú, para salir de la cola.<br />
<br />
- Data 1: key, tecla que presionó<br />
- Data 2: position, posición en la que se encontraba en la cola<br />
<br />
<strong>EXITWITHTIMEOUT:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El cliente estuvo demasiado tiempo en hold, y el tiempo expiró<br />
<br />
- Data 1: position, posición del cliente en la cola<br />
<br />
<strong>QUEUESTART:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El sistema de colas ha sido iniciado.<br />
<br />
<strong>RINGNOANSWER:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; El llamado es conectado a un agente, pero este no lo atiende.<br />
<br />
- Data 1: ringtime, tiempo que estuvo sonando el teléfono del agente.<br />
<br />
<strong>SYSCOMPAT:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; La llamada es atendida por el agente, pero el sistema la rechaza porque los canales no son compatibles.<br />
<br />
<strong>TRANSFER:</strong><br />
&nbsp;&nbsp;&nbsp;&nbsp; La llamada es transferida a otro interno.<br />
<br />
- Data 1: extension, interno de destino<br />
- Data 2: context, contexto utilizado<br />
- Data 3: holdtime, tiempo en espera del agente hasta que se realizó la transferencia<br />
- Data 4: calltime, duración de la llamada hasta que fue transferida.
<div style='clear: both;'></div>



    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.bundle.js"></script>

</body>
</html>