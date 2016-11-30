<?php
session_start();
if (isset($_SESSION['k_username'])) { /* echo 'user:'.$_SESSION["k_username"]; */} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$delete_files=$_GET['delete_files'];

echo "temp/".$delete_files;
unlink("temp/".$delete_files);

?>
<html>
<head>
<title>PBX-CAM01</title>
<meta http-equiv="refresh" content="0;url=auto-dial-out.php">

</head>
<body>
</body>
</html>
