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
								<input type='radio' name='Fraktion' value='VfV'/ onclick='ShowFracInfo(1)'>
							</td>
							<td>
								<label class='fraktionsname'>Vereinigung friedliebender V&ouml;lker</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type='radio' name='Fraktion' value='Prussianer'/ onclick='ShowFracInfo(2)'>
							</td>
							<td>
								<label class='fraktionsname'>Prussianisches Kaiserreich</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type='radio' name='Fraktion' value='Hornets' onclick='ShowFracInfo(3)'/>
							</td>
							<td>
								<label class='fraktionsname'>H.O.R.N.E.T.S.</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type='radio' name='Fraktion' value='Catores' onclick='ShowFracInfo(4)'/>
							</td>
							<td>
								<label class='fraktionsname'>Handelsimperium Cator</label>
							</td>
						</tr>
					</table>
				</div>
				<div class='infocell'>
					<textarea type='text' class='fraktionsinfo' id='fracInfo' readonly>W&auml;hle eine Fraktion aus, um Informationen &uuml;ber sie zu erhalten.</textarea>
				</div>
			</section>
			<section class='faehigkeitsbereich'>
				<div class='restpunkteskill'>
					<p>Punkte &uuml;brig: <input type='text' class='counter' value='80' size='1' id='SkillAmount' readonly></p>
				</div>
				<div class='faehigkeiten'>
					<table>
						<tr>
							<td>
								<label class='skillschrift'>Bordgesch&uuml;tze (Phy)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Bordg, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Bordg' name='BG' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Bordg, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Konstitution (Phy)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Konst, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Konst' name='Konst' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Konst, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Nahkampf (Phy)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Nahka, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Nahka' name='Nahka' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Nahka, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Pilotieren (Phy)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Pilot, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Pilot' name='Pilot' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Pilot, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Schusswaffen (Phy)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Schus, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Schus' name='schus' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Schus, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr class='spacetr'></tr>
						<tr>
							<td>
								<label class='skillschrift'>Astrogation (Int)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Astro, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Astro' name='Astro' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Astro, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Computer (Int)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Compu, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Compu' name='Compu' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Compu, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Medizin (Int)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Mediz, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Mediz' name='Mediz' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Mediz, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Reparatur (Int)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Repar, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Repar' name='Repar' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Repar, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Sensoren (Int)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Senso, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Senso' name='Senso' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Senso, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr class='spacetr'></tr>
						<tr>
							<td>
								<label class='skillschrift'>Etikette (Wir)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Etike, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Etike' name='Etike' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Etike, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Feilschen (Wir)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Feils, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Feils' name='Feils' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Feils, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>Kommandieren (Wir)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Komma, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Komma' name='Komma' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Komma, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>L&uuml;gen (Wir)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Luege, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Luege' name='Luege' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Luege, SkillAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='skillschrift'>&Uuml;berzeugen (Wir)</label>
							</td>
							<td>
								<button type='button' class='skillbuttonlinks' onclick='DecreaseByOne(Ueber, SkillAmount)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Ueber' name='Ueber' readonly>
							</td>
							<td>
								<button type='button' class='skillbuttonrechts' onclick='IncreaseByOne(Ueber, SkillAmount)'><img src='img/rightarrow.png'></button>
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
					<p>Punkte &uuml;brig: <input type='text' class='counter' value='10' size='1' id='AttAmount' readonly></p>
				</div>
				<div class='attribute'>
					<table class='atttabelle'>
						<tr>
							<td>
								<label class='attributsschrift'>Physis</label>
							</td>
							<td>
								<button type='button' class='attbuttonlinks' onclick='DecreaseByOne(Physi, AttAmount, 8)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='8' size='1' id='Physi' name='Physi' readonly>
							</td>
							<td>
								<button type='button' class='attbuttonrechts' onclick='IncreaseByOne(Physi, AttAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='attributsschrift'>Intellekt</label>
							</td>
							<td>
								<button type='button' class='attbuttonlinks' onclick='DecreaseByOne(Intel, AttAmount, 8)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='8' size='1' id='Intel' name='Intel' readonly>
							</td>
							<td>
								<button type='button' class='attbuttonrechts' onclick='IncreaseByOne(Intel, AttAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='attributsschrift'>Wirkung</label>
							</td>
							<td>
								<button type='button' class='attbuttonlinks' onclick='DecreaseByOne(Wirku, AttAmount, 8)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='8' size='1' id='Wirku' name='Wirku' readonly>
							</td>
							<td>
								<button type='button' class='attbuttonrechts' onclick='IncreaseByOne(Wirku, AttAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
						<tr>
							<td>
								<label class='attributsschrift'>Telepathie</label>
							</td>
							<td>
								<button type='button' class='attbuttonlinks' onclick='DecreaseByOne(Telep, AttAmount, 0)'><img src='img/leftarrow.png'></button>
							</td>
							<td>
								<input type='text' class='attwert' value='0' size='1' id='Telep' name='Telep' readonly>
							</td>
							<td>
								<button type='button' class='attbuttonrechts' onclick='IncreaseByOne(Telep, AttAmount)'><img src='img/rightarrow.png'></button>
							</td>
						</tr>
					</table>
				</div>
			</section>
		</form>
		<script>
			function ShowFracInfo(fraction)
			{
				switch(fraction)
				{
					case 1:
						fracInfo.value = 'Die Vereinigung friedliebender V\u00f6ker ist ein Zusammenschluss zahlreicher Welten und Spezies, deren St\u00e4rke vor allem in Diplomatie und Zusammenarbeit liegt.';
						break;
					case 2:
						fracInfo.value = 'Die Angeh\u00f6irgen des Prussianischen Kaiserreiches legen Wert auf Tradition und milit\u00e4rische Macht.';
						break;
					case 3:
						fracInfo.value = 'Die Hornets leben in der Galaxie verstreut in Nestern und Raumschiffen. Sie gehen oft eine Symbiose mit ihren fast lebendigen Schiffen ein.';
						break;
					case 4:
						fracInfo.value = 'Die Catores sind f\u00fcr ihre galaxieumspannenden Handelsaktivit\u00e4ten, ihren zur Schau gestellten Reichtum und ihre \u00fcberbordende Korruption bekannt.';
						break;
					default:
						fracInfo.value = 'Unbekannte Auswahl';
				}
			}		
			function IncreaseByOne(id, attr)
			{
				var idInt = parseInt(id.value);
				var maxSkill = 50;
				var maxAttr = 16;
				if(attr === SkillAmount)
				{
					var amountInt = parseInt(SkillAmount.value);
					if(idInt < maxSkill && amountInt > 0)
					{
						idInt = idInt + 1;
						id.value = idInt;
						amountInt = amountInt - 1;
						SkillAmount.value = amountInt;
					}
				}
				if(attr === AttAmount)
				{
					var amountInt = parseInt(AttAmount.value);
					if(idInt < maxAttr && amountInt > 0)
					{
						idInt = idInt + 1;
						id.value = idInt;
						amountInt = amountInt - 1;
						AttAmount.value = amountInt;
					}
				}
			}
			function DecreaseByOne(id, attr, minVal)
			{
				var idInt = parseInt(id.value);
				if(attr === SkillAmount)
				{
					var amountInt = parseInt(SkillAmount.value);
					if(idInt > 0)
					{
						idInt = idInt - 1;
						id.value = idInt;
						amountInt = amountInt + 1;
						SkillAmount.value = amountInt;
					}
				}
				if(attr === AttAmount)
				{
					var amountInt = parseInt(AttAmount.value);
					if(idInt > minVal)
					{
						idInt = idInt - 1;
						id.value = idInt;
						amountInt = amountInt + 1;
						AttAmount.value = amountInt;
					}
				}
			}
		</script>
	</body>
</html>
";

?>