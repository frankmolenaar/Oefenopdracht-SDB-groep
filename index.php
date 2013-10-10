<!DOCTYPE html>
<html>
	<head>
		<title>Kalender Control</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" href="./libs/scheduler/dhtmlxscheduler.css" type="text/css">
		<script src="./libs/jquery/jquery-1.9.1.js" type="text/javascript"></script>
		<script src="./libs/scheduler/dhtmlxscheduler.js" type="text/javascript"></script>
		<script src="./libs/scheduler/dhtmlxscheduler_multiselect.js"></script>
		<script type="text/javascript" src="./scripts/index_script.js"></script>
	</head>
	<body>
		<div id="scheduler" class="dhx_cal_container">
		    <div class="dhx_cal_navline">
		        <div class="dhx_cal_prev_button">&nbsp;</div>
		        <div class="dhx_cal_next_button">&nbsp;</div>
		        <div class="dhx_cal_today_button"></div>
		        <div class="dhx_cal_date"></div>
		        <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
		        <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
		        <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
		    </div>
		    <div class="dhx_cal_header"></div>
		    <div class="dhx_cal_data"></div>       
		</div>
		<form action="add_event.php" method="post">
			<div id="form_table">
				<table>
					<tr id="startDatum">
						<td>
							Startdatum:
						</td>
						<td>
							<!-- FIXME: Werkt alleen in chrome en opera, moet een extra JS library in voor date picker -->
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
							<textarea name="beschrijving" id="beschrijving"></textarea>
						</td>
					</tr>
				</table>
				<button id="verzend_knop">Verzenden</button>
			</div>
		</form>
	</body>
</html>