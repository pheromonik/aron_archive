<?php

/* Session starten oder wieder aufnehmen*/
session_start(); 

/* Bei einem Aufruf von der Login-Seite: */
include_once 'includes/dbconnect.inc.php';

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
				<div class='faehigkeiten'>
					<table>
						<tr>
							<td>
								<label>Einsch&uuml;chtern (Phy)</label>
							</td>
							<td>
								<input type='number' name='einschuechtern' min='0' max='100'/>
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
					<p>Punkte &uuml;brig: <label class='counter'>20<label></p>
				</div>
				<div class='attribute'>
					<table class='atttabelle'>
						<tr>
							<td>
								<label class='attributsschrift'>Physis</label>
							</td>
							<td>
								<button class='attbuttonlinks'>-</button>
							</td>
							<td>
								<label class='counter'>8</label>
							</td>
							<td>
								<button class='attbuttonrechts'>+</button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='attributsschrift'>Intellekt</label>
							</td>
							<td>
								<button class='attbuttonlinks'>-</button>
							</td>
							<td>
								<label class='counter'>8</label>
							</td>
							<td>
								<button class='attbuttonrechts'>+</button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='attributsschrift'>Wirkung</label>
							</td>
							<td>
								<button class='attbuttonlinks'>-</button>
							</td>
							<td>
								<label class='counter'>8</label>
							</td>
							<td>
								<button class='attbuttonrechts'>+</button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='attributsschrift'>Telepathie</label>
							</td>
							<td>
								<button class='attbuttonlinks'>-</button>
							</td>
							<td>
								<label class='counter'>8</label>
							</td>
							<td>
								<button class='attbuttonrechts'>+</button>
							</td>
						</tr>
					</table>
				</div>
			</section>
		</form>
	</body>
</html>
";

?>