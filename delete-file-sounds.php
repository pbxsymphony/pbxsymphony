<?php
session_start();
if (isset($_SESSION['k_username'])) { /* echo 'user:'.$_SESSION["k_username"]; */} else { echo '<SCRIPT LANGUAGE="javascript">location.href = "logout.php" </SCRIPT>'; } 

$delete_files=$_GET['delete_files'];

echo "/usr/share/asterisk/sounds/prompts/".$delete_files;
unlink("/usr/share/asterisk/sounds/prompts/".$delete_files);

?>
<html>
<head>
<title>PBX-CAM01</title>
<meta http-equiv="refresh" content="0;url=upload-list-file.php">

</head>
<body>
</body>
</html>
