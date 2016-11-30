<?php
$files=$_GET['files'];
//$file_line=count(file('temp/'.$files));
//echo $file_line.'<br/>';

$row = 1;
$time=12;
if (($handle = fopen("temp/".$files, "r")) !== FALSE) {
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
$num = count($data);
//var_dump($data);
//echo "<p> $num Datos la linea $row: <br /></p>\n";
if ( $row > 1 ) { 

for ($c=0; $c < $num; $c++) {


if ( $c == '0' ){ 
//echo "***************************************************<br />\n";
//echo "Channel: ".$data[$c] . "<br />\n"; 
$line_tmp= "Channel: ".$data[$c]."\n"; 
} 

elseif ( $c == "1" ){ 
// echo "Callerid: ".$data[$c] . "<br />\n";
$line_tmp.= "Callerid: ".$data[$c]."\n"; 
}
elseif ( $c == "2" ){ 
//echo "MaxRetries: ".$data[$c] . "<br />\n";
$line_tmp.= "MaxRetries: ".$data[$c]."\n"; 
}
elseif ( $c == "3" ){ 
//echo "RetryTime: ".$data[$c] . "<br />\n";
$line_tmp.= "RetryTime: ".$data[$c]."\n"; 
}
elseif ( $c == "4" ){ 
//echo "WaitTime: ".$data[$c] . "<br />\n";
$line_tmp.= "WaitTime: ".$data[$c]."\n"; 
}
elseif ( $c == "5" ){ 
//echo "Context: ".$data[$c] . "<br />\n";
$line_tmp.= "Context: ".$data[$c]."\n"; 
}
elseif ( $c == "6" ){ 
//echo  "Extension: ".$data[$c] . "<br />\n";
//echo "***************************************************<br />\n";
$line_tmp.= "Extension: ".$data[$c]."\n"; 
$file_name=$data[$c]; 
//guardar file
file_put_contents("/var/spool/asterisk/outgoing/".$file_name.".txt", $line_tmp);

if ( $row == $time ){
sleep(5);
$time=$time+12;
}
}
         
//echo $data[$c] . "<br />\n"; 

//echo 'linea linea lie'.$num;     
}
}
$row++;
}
fclose($handle);
}

?>
