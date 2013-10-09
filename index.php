<!DOCTYPE html>
<html>
	<head>
		<style>
			body{
				font-family:calibri;
				
			}

			#form_table {
				width: 600px;
				margin:0 auto;
				padding: 20px;
				background: rgba(239,228,176,0.5);
				border: 1px black dashed;
			}

			#form_table td{
				vertical-align: top;
			}

			#beschrijving {
				max-width: 450px;
			}

			#verzend_knop {
				width: inherit;
				margin: 0 auto;
			}
		</style>
		<title>Kalender Control</title>
	</head>
	<body>
		<form action="test.php" method="get">
			<div id="form_table">
				<table>
					<tr id="startDatum">
						<td>
							Startdatum:
						</td>
						<td>
							<input id="startdate" name="startdate[]" type="date"> Tijd: <input type="time" id="starttime" name="startdate[]">
						</td>
					</tr>
					<tr id="eindDatum">
						<td>
							Einddatum:
						</td>
						<td>
							<input id="einddate" name="einddate[]" type="date"> Tijd: <input type="time" id="eindtime" name="einddate[]">
						</td>
					</tr>
					<tr id="gebruikers">
						<td>
							Gebruikers:
						</td>
						<td colspan="5">
							<input id="users" type="checkbox" name="gebruiker_groep[]" value=1>Gebruiker 1</checkbox>
							<input id="users" type="checkbox" name="gebruiker_groep[]" value=2>Gebruiker 2</checkbox>
							<input id="users" type="checkbox" name="gebruiker_groep[]" value=3>Gebruiker 3</checkbox>
							<input id="users" type="checkbox" name="gebruiker_groep[]" value=4>Gebruiker 4</checkbox>
							<input id="users" type="checkbox" name="gebruiker_groep[]" value=5>Gebruiker 5</checkbox>
						</td>
					</tr>
					<tr id="locatie">
						<td>
							Lokatie:
						</td>
						<td>
						 	<select id="locatie" name="locatie">
				 				<option value=1>Locatie 1</option>
								<option value=2>Locatie 2</option>
								<option value=3>Locatie 3</option>
								<option value=4>Locatie 4</option>
								<option value=5>Locatie 5</option> 
							</select>			
						</td>
					</tr>
					<tr>
						<td>
							Beschrijving: 
						</td>
						<td>
							<textarea id="beschrijving"></textarea>
						</td>
					</tr>
				</table>
				<button id="verzend_knop">Verzenden</button>
			</div>
		</form>
	</body>
</html>