<nav class="navbar navbar-default navbar navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand" href="index-menu-agent.php"> <span class="glyphicon glyphicon-music"></span><b> <font color="red" > PBX </font><font color="#00BFFF" > Symphony <sup> v1.0</sup> </font> </b> </div>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li><a href="#">Link</a></li> !-->
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> PBX <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index-sip-queues-agent.php"><span class="glyphicon glyphicon-earphone"></span> Queue Login / Logout</a></li>
            <?php if ($_SESSION["k_type"]=="ADMIN" ) { echo '<li class="divider"></li>'; } ?>
            <?php if ($_SESSION["k_type"]=="ADMIN" ) { echo '<li><a href="index-sip-agents.php"><span class="glyphicon glyphicon-user"></span> Queue Agent</a></li>'; } ?>
            <?php if ($_SESSION["k_type"]=="ADMIN" OR $_SESSION["k_type"]=="SUPER" ) { echo '<li><a href="index-sip-queues-member.php"><span class="glyphicon glyphicon-user"></span> Queue Admin Member</a></li>'; } ?>

          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Queuemonitor <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php if ($_SESSION["k_type"]=="ADMIN" OR $_SESSION["k_type"]=="SUPER") { echo '<li><a href="index-sip-queues-metric.php?refresh=5"> <span class="glyphicon glyphicon-dashboard"></span> Dashboard Queuemonitor</a></li>'; } ?>
            <?php if ($_SESSION["k_type"]=="ADMIN" OR $_SESSION["k_type"]=="SUPER") { echo '<li><a href="reporte_queue-metric.php"> <span class="glyphicon glyphicon-list-alt"></span> Reporte de Actividad </a></li>'; } ?>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Reports <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index-cdr.php"><span class="glyphicon glyphicon-phone-alt"></span> CDR </a></li>
          </ul>
        </li>



      </ul>


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <!--<li><a href="opciones-agent.php">Mi Perfil</a></li> -->
            <li class="divider"></li>
            <li><a href="logout.php">Salir</a></li>
          </ul>
        </li>
      </ul>
   
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a  class="dropdown-toggle" data-toggle="dropdown"> <?php echo $_SESSION["k_type"]; ?><font color="red">  <?php echo $_SESSION['k_user']; ?> </font></a>

        </li>
      </ul>
          
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br>