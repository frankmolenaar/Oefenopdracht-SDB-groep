<!DOCTYPE html>
<html>
	<head>
		<title>Kalender Control</title>
		<link rel="stylesheet" href="./libs/scheduler/dhtmlxscheduler.css" type="text/css">
		<script src="./libs/jquery/jquery-1.9.1.js" type="text/javascript"></script>
		<script src="./libs/scheduler/dhtmlxscheduler.js" type="text/javascript"></script>
		<script src="./libs/scheduler/dhtmlxscheduler_multiselect.js"></script>

   		<script type="text/javascript">
			$(document).ready(function(){
				// todo: namen moeten uit de db komen
				// Lightbox opties voor de "gebruikers" checkboxes
				var all_user_options = [{key: 1,  label:"Gebruiker 1"}, 
									    {key: 2,  label:"Gebruiker 2"}, 
									    {key: 3,  label:"Gebruiker 3"}, 
									    {key: 4,  label:"Gebruiker 4"}, 
									    {key: 5,  label:"Gebruiker 5"}];

				scheduler.config.api_date="%Y-%m-%d %H:%i";
				scheduler.init('scheduler', new Date(),"month");
				
				// todo: Vertalingen in de lightbox labels
				scheduler.locale.labels.section_description = "Beschrijving";
				scheduler.locale.labels.section_location = "Locatie";
				scheduler.locale.labels.section_userselect = "Gebruikers";

				// defineer de lightbox secties
				scheduler.config.lightbox.sections=[	
					{ name:"description", height:50, map_to:"text", type:"textarea", focus:true },
					{ name:"userselect", height:22, map_to:"gebruikers", type:"multiselect", options: all_user_options, vertical:"false"  },
					{ name:"location", height:43, type:"textarea", map_to:"locatie" },
					{ name:"time", height:72, type:"time", map_to:"auto"}	
				]
	
				// Events ophalen 
				$.ajax({
					dataType: "json",
					url: 'events.php', //////// HIER MOET EEN C# script komen/////// FIXME
					data: {},

					success: function(data, status, xhr){
						for(var i = 0; i < data.length; i++){
							var ev = data[i];
							scheduler.addEvent({
								start_date: ev['startdate'][0] + " " + ev['startdate'][1],
								//todo: Nederlands/engels vertaling moet effe aangepast/gestandardiseerd worden
								end_date: ev['einddate'][0] + " " + ev['einddate'][1],
								text: ev['beschrijving'],
								gebruikers: ev['gebruiker_groep'].join(','), 
								locatie: ev['locatie']
							});
						}
					}
				});

				// Example extra event
				scheduler.attachEvent("onEventSave", function(id, data){
					$.ajax({
						dataType: "json",
						url: "edit_event.php",
						data: {id:id, data:data},
						success: function(data, status, xhr){
							console.log(data);
						}
					});
					return true;
				});
				// todo add more events: onDrag etc.
			}); // ends onready
		</script>
		<style>

			html {
				width:100%;
			}

			body{
				width: 100%;
				font-family:calibri;
				
			}

			#scheduler {
				margin:0 auto;
				width: 700px; 
				height: 700px;
				padding:10px;
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