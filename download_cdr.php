<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=CDR.xls");
header("Pragma: no-cache");
header("Expires: 0");

$fecha=$_GET['hoy'];

if ( $fecha == "" ) { 
  $fecha=date("Y-m-d");
} 

$fecha2=$_GET['hoy2'];

if ( $fecha2 == "" ) { 
  $fecha2=date("Y-m-d");
}  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CDR</title>
</head><body>
<p><strong>CDR de Llamadas</strong></p>
<table id="myTable" border="1" cellspacing="0">  
<thead>
<tr> 
    <th >calldate</th> 
            	<th >clid</th> 
                <th >src</th>
                <th >dst</th>
                <th >dcontext</th>
                <th >channel</th>
                <th >dstchannel</th>
                <th >lastapp</th>
                <th >lastdata</th>
                <th >duration</th>
                <th >billsec</th>
                <th >disposition</th>
                <th >amaflags</th>
                <th >accountcode</th>
                <th >userfield</th>
                <th >uniqueid</th>
                <th >linkedid</th>
                <th >sequence</th>
                <th >peeraccount</th>
</tr> 
</thead> 

<?php 
        include("database.php");
        $lista = mysql_query("SELECT * FROM bit_cdr WHERE calldate >= '$fecha 00:00:00' AND calldate <='$fecha2 23:59:59'");
        while ($listando = mysql_fetch_array($lista)) {
        printf("<tr bgcolor='#FFFFFF' bordercolor='#0000FF'>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td>
        <td> %s </td></tr>", 
        $listando["calldate"], 
        $listando["clid"], 
        $listando["src"],
        $listando["dst"],
		$listando["dcontext"],
		$listando["channel"],
		$listando["dstchannel"],
		$listando["lastapp"],
		$listando["lastdata"],
		$listando["duration"],
		$listando["billsec"],
		$listando["disposition"],
		$listando["amaflags"],
		$listando["accountcode"],
		$listando["userfield"],
		$listando["uniqueid"],
		$listando["linkedid"],
		$listando["sequence"],
        $listando["peeraccount"]);
        }
        mysql_free_result($lista);
        mysql_close(); 
        ?>
</table>
</body>
</html>