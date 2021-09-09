<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<style>
body {
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(background.jpg);
    background-position: center;
    background-size: cover;
    padding-left: 8%;
    padding-right: 8%;
    box-sizing: border-box;
}

.card {
    width: 180px;
    height: 380px;
    display: inline-block;
    border-radius: 10px;
    padding: 15px 25px;
    box-sizing: border-box;
    cursor: pointer;
    margin: 10px 15px;
    text-align: center;
    background-position: center;
    transition: transform 0.5s;
}

.logo {
    width: 500px;
    cursor: pointer;
}

.navbar {
    height: 12%;
    display: flex; 
    align-items: center;
    padding: 50px;
}

.col {
    flex-basis: 50%;
}
h1 {
    color: #ffffff;
    font-size: 85px;
}

p {
    color: #ffffff;
    font-size: 20px;
    line-height: 25px;
}

.card {
    width: 460px;
    height: 240px;
    display: inline-block;
    border-radius: 10px;
    padding: 15px 25px;
    position: apsolute;
    align-items: center;

    box-sizing: border-box;
    cursor: pointer;
    margin: 10px 15px;
    text-align: center;
    background-position: centre;
    transition: transform 0.5s;
    background-image: url(images/temperature.jpeg);
}

card:hover {
    transform: translateY(-10px);
}

</style>
<html><body>
<?php

$servername = "localhost";

$dbname = "data";
$username = "root";
$password = "database";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$room1 = "SELECT location, Temperature, Humidity, LightLevel, reading_time FROM SensorData WHERE location = 'Room1' ORDER BY id DESC LIMIT 1";
$room2 = "SELECT location, Temperature, Humidity, LightLevel, reading_time FROM SensorData WHERE location = 'Room2' ORDER BY id DESC LIMIT 1";
$room3 = "SELECT location, Temperature, Humidity, LightLevel, reading_time FROM SensorData WHERE location = 'Room3' ORDER BY id DESC LIMIT 1";

echo '<div class="card_1"></div><table class="card" cellspacing="5" cellpadding="5">
      <tr> 
        <td>Location</td> 
        <td>Temperature</td> 
        <td>Humidity</td>
        <td>Light Level</td> 
        <td>Timestamp</td> 
      </tr></div>';
      
echo '<div class="navbar">
            <a href="https://www.ferit.unios.hr">
                <img src="images/logo-ferit.png" class="logo">
        </a>
        </div>';
echo  '<div class="col">
                <h1>Statistics for today:</h1>
            </div>';
        
        
if ($resultr1 = $conn->query($room1) and $resultr2= $conn->query($room2) and $resultr3= $conn->query($room3)) {
    while ($rowr1 = $resultr1->fetch_assoc() and $rowr2 = $resultr2->fetch_assoc() and $rowr3 = $resultr3->fetch_assoc()) {
        $row_locationr1 = $rowr1["location"];
        $row_Temperaturer1 = $rowr1["Temperature"];
        $row_Humidityr1 = $rowr1["Humidity"]; 
        $row_LightLevelr1 = $rowr1["LightLevel"]; 
        $row_reading_timer1 = $rowr1["reading_time"];
        
        $row_locationr2 = $rowr2["location"];
        $row_Temperaturer2 = $rowr2["Temperature"];
        $row_Humidityr2 = $rowr2["Humidity"]; 
        $row_LightLevelr2 = $rowr2["LightLevel"]; 
        $row_reading_timer2 = $rowr2["reading_time"];
        
        $row_locationr3 = $rowr3["location"];
        $row_Temperaturer3 = $rowr3["Temperature"];
        $row_Humidityr3 = $rowr3["Humidity"]; 
        $row_LightLevelr3 = $rowr3["LightLevel"]; 
        $row_reading_timer3 = $rowr3["reading_time"];
        
      
        echo '<tr> 
                <td>' . $row_locationr1 . '</td> 
                <td>' . $row_Temperaturer1 . '</td> 
                <td>' . $row_Humidityr1 . '</td>
                <td>' . $row_LightLevelr1 . '</td> 
                <td>' . $row_reading_timer1 . '</td> 
              </tr>';
        
        echo '<tr> 
                <td>' . $row_locationr2 . '</td> 
                <td>' . $row_Temperaturer2 . '</td> 
                <td>' . $row_Humidityr2 . '</td>
                <td>' . $row_LightLevelr2 . '</td> 
                <td>' . $row_reading_timer2 . '</td> 
              </tr>';
        
        echo '<tr> 
                <td>' . $row_locationr3 . '</td> 
                <td>' . $row_Temperaturer3 . '</td> 
                <td>' . $row_Humidityr3 . '</td>
                <td>' . $row_LightLevelr3 . '</td> 
                <td>' . $row_reading_timer3 . '</td> 
              </tr>';
    }
    $resultr1->free();
    $resultr2->free();
}

$conn->close();
?> 
</table>
</body>
</html>
