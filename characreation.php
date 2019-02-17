<?php

echo"
<html>
	<head>
		<link rel='stylesheet' href='style/stylecharacreation.css'/>
	</head>
	<body>
		<form action='savechartodb.php' method='post'>
			<section class='namefield'>
				<p class='standardschrift'>Gib einen Namen ein: <input class='nameinput' type='text' name='vorname'></p>
			</section>
			<section class='fraktionsbereich'>
				<div class='fraktionstabelle'>
					<table>
						<tr>
							<td>
								<input type='radio' name='Fraktion' value='VfV'/>
							</td>
							<td>
								<label class='fraktionsname'>Vereinigung friedliebender V&ouml;lker</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type='radio' name='Fraktion' value='Prussianer'/>
							</td>
							<td>
								<label class='fraktionsname'>Prussianisches Kaiserreich</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type='radio' name='Fraktion' value='Hornets'/>
							</td>
							<td>
								<label class='fraktionsname'>H.O.R.N.E.T.S.</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type='radio' name='Fraktion' value='Catores'/>
							</td>
							<td>
								<label class='fraktionsname'>Handelsimperium Cator</label>
							</td>
						</tr>
					</table>
				</div>
				<div class='infocell'>
					<label class='fraktionsinfo'>W&auml;hle eine Fraktion aus, um Informationen &uuml;ber sie zu erhalten.</label>
				</div>
			</section>
			<section class='faehigkeitsbereich'>
				<div class='restpunkteskill'>
					<p>Punkte &uuml;brig: <label class='counter2'>80<label></p>
				</div>
				<div class='faehigkeiten'>
					<table>
						<tr>
							<td>
								<label class='skillschrift'>Bordgesch&uuml;tze (Phy)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Konstitution (Phy)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Nahkampf (Phy)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Pilotieren (Phy)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Schusswaffen (Phy)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr class='spacetr'></tr>
						<tr>
							<td>
								<label class='skillschrift'>Astrogation (Int)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Computer (Int)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Medizin (Int)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Reparatur (Int)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Sensoren (Int)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr class='spacetr'></tr>
						<tr>
							<td>
								<label class='skillschrift'>Etikette (Wir)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Feilschen (Wir)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Kommandieren (Wir)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>L&uuml;gen (Wir)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>&Uuml;berzeugen (Wir)</label>
							</td>
							<td>
								<button class='skillbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='skillbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
					</table>
				</div>
				<div class='startbereich'>
					<input type='submit' class='startbutton' value='Los geht&apos;s!'/>
				</div>
			</section>
			<section class='attributsbereich'>
				<div class='restpunkteatt'>
					<p>Punkte &uuml;brig: <label class='counter'>10<label></p>
				</div>
				<div class='attribute'>
					<table class='atttabelle'>
						<tr>
							<td>
								<label class='attributsschrift'>Physis</label>
							</td>
							<td>
								<button class='attbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>8</label>
							</td>
							<td>
								<button class='attbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='attributsschrift'>Intellekt</label>
							</td>
							<td>
								<button class='attbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>8</label>
							</td>
							<td>
								<button class='attbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='attributsschrift'>Wirkung</label>
							</td>
							<td>
								<button class='attbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>8</label>
							</td>
							<td>
								<button class='attbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='attributsschrift'>Telepathie</label>
							</td>
							<td>
								<button class='attbuttonlinks'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<label class='attwert'>0</label>
							</td>
							<td>
								<button class='attbuttonrechts'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
					</table>
				</div>
			</section>
		</form>
		<script src='jscripts/increaseValueBy1.js'></script>
	</body>
</html>
";

?>