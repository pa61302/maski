<html>
<body>
<center>
<h3>People at work today and the following days</h3>
<?php
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

<p>See <a href="working.log">raw data</a> of the whole history</p>

</center>
</body>
</html>
