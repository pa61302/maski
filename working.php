<html>
<body>
<center>
<? if($_GET["end"] < $_GET["start"]) exit(); ?>
<h3>Confirm your working hours</h3>
<!--<p> Are you sure, you want to report the following working hours:</p>-->
<p> 
<b>Date:</b> <?php /*print($_GET["date"]);*/ echo date("l d.m.", strtotime($_GET["date"])); ?> <br>
<b>Time:</b> <?php print($_GET["start"]." - ".$_GET["end"]);?></p>
<form action="./save.php">
<input type="hidden" id="save" name="save" value="<?php echo $_GET["name"].";".$_GET["room"].";".$_GET["date"].";".$_GET["start"].";".$_GET["end"]; ?>">
<input type="submit" value="Confirm">
</form>
If not, go back. <!--, or <a href="./maski.php">start all over--></a>
<hr width="30%">
<h4>Others working @ TUNI during your selected period:</h4>
<pre>
<?php
$workers = 0;
$file = fopen("./working.log","r");
while(! feof($file))
{
	
	$worker = explode(";", fgets($file));
	if($_GET["date"] == $worker[2])
	{
		if(  $worker[3] <= $_GET["end"] && $worker[4] >= $_GET["start"] )
		{
			echo $worker[0]."\t".$worker[1]."\t".$worker[3]."\t".$worker[4];
			$workers++;
		}
	}
	
}
echo "<br>Altogether ".$workers." people working.";
fclose($file);
?>
</pre>
</hr>
<hr width="30%">
<p> <small>Unfortunately, no guarantee of anything what so ever!
<br> Your report won't be removed! Report but not come, up to you.
<br> Anything submitted by anyone will be visible to anyone.(See <a href="./working.log">log</a>)
</small></p>
</center>
</body>
</html>
