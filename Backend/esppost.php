<?php

	$Temp=$_POST["temperature"];
	$Humidity=$_POST["humidity"];
	$Light=$_POST["light_level"];
	$Write="<p>Temperature: " . $Temp . " C</p>"."<p>Humidity: ".$Humidity." % </p>" ."<p>Light level: ". $light_level." </p>";
	file_put_contents('sensors.html',$Write);
	

?>