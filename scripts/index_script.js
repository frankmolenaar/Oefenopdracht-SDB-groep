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
		{ name:"location", height:43, type:"textarea", map_to:"locatie" }, //TODO replace textarea with actual options
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
			url: "edit_event.php", //////// HIER MOET EEN C# script komen/////// FIXME
			data: {id:id, data:data},
			success: function(data, status, xhr){
				console.log(data);
			}
		});
		return true;
	});
	// Example extra event 2
	scheduler.attachEvent("onEventDelete", function(id, data){
		$.ajax({
			dataType: "json",
			url: "delete_event.php", //////// HIER MOET EEN C# script komen/////// FIXME
			data: {id:id, data:data},
			success: function(data, status, xhr){
				console.log(data);
			}
		});
		return true;
	});
	// todo add more events: onDrag etc.
}); // ends onready