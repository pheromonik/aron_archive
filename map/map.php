<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galaxiekarte</title>
  <link rel='stylesheet' href='mapstyle.css'/>
</head>
<body onload="initMap()">
	<form action='startfly.php' method='post'>
		<section class='galaxymap'>
			<canvas id="starMap" width="920" height="720"></canvas>
			<button type='button' onclick="startRot(stars)"><img src='img/rotate.png'></button>
			<button type='button' onclick="stopRot()"><img src='img/stop.png'></button>
			<button type='button' class="modeChange" onclick="colorMode(0, stars)">Standard</button>
			<button type='button' class="modeChange" onclick="colorMode(1, stars)">Fraktionen</button>
			<button type='button' class="modeChange" onclick="colorMode(2, stars)">Reise</button>
			<button type='button' class="modeChange" onclick="fly(stars)">Starten</button>
		</section>
		<section class='cockpit'>
			 <div class="grid-container">
				  <div class="grid-item1"><img class="centerImg" id="screenImg" height="100%" src='img/port1.png'></div>
				  <div class="grid-item2"><img id="targetPreview" width="100%" src='img/planet0.png'></div>
				  <div class="grid-item">3</div>
				  <div class="grid-item">4</div>
				  <div class="grid-item">5</div>
				  <div class="grid-item">6</div>
				  <div class="grid-item">7</div>
				  <div class="grid-item">8</div>
				  <div class="grid-item">9</div>
				  <div class="grid-item">10</div>
				  <div class="grid-item">11</div>
				  <div class="grid-item">12</div>
				  <div class="grid-item">13</div>
				  <div class="grid-item">14</div>
				  <div class="grid-item">15</div>
				  <div class="grid-item">16</div>
				  <div class="grid-item">17</div>
			</div> 
		</section>
	</form>
	<?php include('mapscript.php')?>
</body> 