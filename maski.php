<!DOCTYPE html>
<html>
<head><title>Maski</title></head>
<body>
<center>
<h2>Report your stay!</h2>
<p>Submit information for the others to know, when you are @ TAU
<br>Sytem allows one day at a time submission. Submit another later, if necessary.
<br>Report your stay for the ongoing and the following week. 
<br><br>See <b><a href="./taulukko.php">table</a></b> to see current and future "reservations" at a glance.
</p>
<hr width="30%">

<h3>I'm going to work @ TAU: </h3>
<form action="./working.php"> 
  <label for="room">Your name:(e.g. Jarmo)</label><br>
  <input type="text" id="name" name="name" value=""><br>
  <label for="room">Your room or location: (e.g. B2063)</label><br>
  <input type="text" id="room" name="room" value=""><br>
  <label for="date">Date:</label><br>
  <select type="date" id="date" name="date">
  <?php
	/*
  Generates a dropdown with dates starting 3 days before today.
  */
	for($day =-3; $day < 12; $day++)
	{
		$date = date("Y-m-d", mktime(0,0,0,date("m"),date("d")+$day,date("Y")));
		if($day==0)
			echo "<option value =".$date." selected='selected'>".date("l d.m.", strtotime($date))."</option>";
		else	
			echo "<option value =".$date.">".date("l d.m.", strtotime($date))."</option>";
	}
  ?>
  </select>
 <table>
 <tr>
	<td>
		<label for="start">Start working:</label><br>
		<select type="time" style="width:85px;" name="start" id="start">
    /*
    Generates a dropdown with times for the starting time
    */
		<?php
			for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
				for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30'
					echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                    .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
		?>
		</select>
	</td>
	<td>
		<label for="end">Stay until:</label><br>
		<select type="time" style="width:85px;" name="end" id="end">
		<?php
     /*
    Generates a dropdown with times for the ending time
    */
			for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
				for($mins=0; $mins<60; $mins+=30) // the interval for mins is '30'
					echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
					.str_pad($mins,2,'0',STR_PAD_LEFT).'</option>';
		?>
		</select>
	</td>
</tr>
</table>
<br><input type="submit" value="See others and submit">
</form>
<hr width="30%">
<p>contact: paavo arvola</p>
</center>
</body>
</html>
