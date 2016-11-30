<?php
session_start();
if (isset($_SESSION['k_username'])) { echo '<SCRIPT LANGUAGE="javascript">location.href = "index-menu.php" </SCRIPT>';} else {  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php
include 'title.php';
?>
<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
</head>
<body>

<!-- NAV INICIO !-->
<nav class="navbar navbar-default navbar navbar-fixed-top" role="navigation">

  <!-- DIV INICIO !-->
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
      <div class="navbar-brand" href="index-menu.php"> <b> <font color="red" >PBX </font><font color="#00BFFF" > Symphony <sup> v1.0</sup></font> </b> </div>
    </div>

    <!-- DIV INICIO !-->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <!-- UL !-->
      <ul class="nav navbar-nav navbar-right">

          <!-- inicio !-->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><span  class="glyphicon glyphicon-cog"></span></b> </a>
            <ul id="login-dp" class="dropdown-menu">
              <li>
              <div class="row">
                <div class="col-md-12"> <p> Login Administrator </p> 
                  <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputEmail2">Login</label>
                      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Administrator" required>
                    </div>
                    <div class="form-group">
                      <label class="sr-only" for="exampleInputPassword2">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-danger "> Login Admin </button>
                    </div>
                  </form>
                </div>
               </div>
              </li>
            </ul>
          </li>
          <!-- FIN !-->



      </ul>
      <!-- UL FIN !-->
    </div>
  <!-- DIV FIN !-->


  </div>
<!-- DIV FIN !-->

</nav>
<!-- NAV FIN !-->

<!-- DIV container  !-->
    <div class="container-fluid">
                 

                  <form class="form-signin" role="form" method="post" action="login-agent.php" accept-charset="UTF-8" id="login-nav">
                  <h2 class="form-signin-heading" > Login Agente </h2> 
                    <div class="form-group">
                      <input type="text" class="form-control" id="agent" name="agent" placeholder="Agente" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="passwordagent" name="passwordagent" placeholder="password" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success" active > Login Agent </button> 
                    </div>
                  </form>

    </div> 
<!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>

</html>
