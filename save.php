<html>
<body>
<center>
<h3>Thank you! Be careful!</h3>
<?php 
/**
LOG the data given by the user
*/
if(isset($_GET["save"]))
	file_put_contents("working.log", $_GET["save"]."\n",FILE_APPEND);
?>
<p><a href="./maski.php">Back to form</a>
<hr width="30%">
<h4>All reservations today and onwards</h4>
<?php
/***
PRINT the table of all reservations (commitments)
*/
$file = fopen("./working.log","r");
$date = array();
while(! feof($file))
{	
	$worker = explode(";", fgets($file));
	if($worker[2] < date("Y-m-d"))
		continue;
	
	if (!isset($date[$worker[2]]))			
	{
		
		$date[$worker[2]] = ""; //päivämäärä
	}
	
	if(isset($date[$worker[2]]))
		$date[$worker[2]] .= $worker[0].": ".$worker[3]." - ".$worker[4]."<br>";
		
}
fclose($file);



echo "<table border='1'><tr>";
ksort($date);
foreach(array_keys($date) as $day)
{
	echo "<th>";
		//echo $day;
		echo date("l d.m.", strtotime($day));  
	echo "</th>";
}
echo"</tr>";
foreach($date as $day)
{
	echo "<td valign='top'>";
		echo $day;
	echo "</td>";
}

echo "</table>";

?>

<p><a href="./working.log">See log</a>
</center>
</body>
</html>
