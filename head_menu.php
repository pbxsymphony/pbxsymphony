<nav class="navbar navbar-default navbar navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button><a  href="index-menu.php"> 
      <div class="navbar-brand"><b> <font color="red" > PBX </font><font color="#00BFFF" > Symphony <sup> v1.0</sup>  </font> </b></div> </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> PBX <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index-sip-extensions.php"><span class="glyphicon glyphicon-phone-alt"></span> Extensions </a></li>
            <li><a href="index-sip-mails.php"><span class="glyphicon glyphicon-envelope"></span> VoiceMail </a></li>
            <li class="divider"></li>
            <li><a href="index-sip-routes.php"><span class="glyphicon glyphicon-transfer"></span> Routes </a></li>
            <li class="divider"></li>
            <li><a href="index-sip-queues.php"><span class="glyphicon glyphicon-earphone"></span> Queue </a></li>
            <li><a href="index-sip-agents.php"><span class="glyphicon glyphicon-user"></span> Queue Agent</a></li>
            <li><a href="index-sip-queues-member.php"><span class="glyphicon glyphicon-user"></span> Queue Admin Member</a></li>
            <!--<li><a href="index-sip-meetme.php"><span class="glyphicon glyphicon-tasks"></span>  Meetme </a></li>-->

          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Queuemonitor <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index-sip-queues-metric.php?refresh=5"> <span class="glyphicon glyphicon-dashboard"></span> Dashboard Queuemonitor</a></li>
            <li><a href="reporte_queue-metric.php"> <span class="glyphicon glyphicon-list-alt"></span> Reporte de Actividad </a></li>

          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Reports <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index-cdr.php"><span class="glyphicon glyphicon-phone-alt"></span> CDR </a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Misc <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="upload-file-call.php"> Upload File Calls </a></li>
            <li><a href="auto-dial-out.php"> Auto-Dial Out </a></li>
            <li class="divider"></li>
            <li><a href="upload-file-sounds.php"> Upload File Prompts </a></li>
            <li><a href="upload-list-file.php"> List Files Prompts </a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="users_maintenance.php">Users Maintenance</a></li>
            <li><a href="opciones.php">Option</a></li>
            <li><a href="licence.php">Licence</a></li>
            <li class="divider"></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks"></span><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">

            <li><a href="servers.php"> Server Client</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a  class="dropdown-toggle" data-toggle="dropdown"> Ayuda <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index-sip-queues-metric-help.php"> Info Queue Log</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a  class="dropdown-toggle" data-toggle="dropdown"><font color="red"> <?php echo $_SESSION['k_username']; ?> </font></a>

        </li>
      </ul>

    </div>
  </div>
</nav>
<br><br>