Oefenopdracht-SDB-groep
=======================

Aantekeningen bij de opdracht

Front-end
Don't reinvent the wheel:
Er is gekozen voor een javascript library http://dhtmlx.com/docs/products/dhtmlxScheduler/index.shtml 
De opdracht beschreef een interface van slechts een week, zonder opties voor scrollen tussen dagen/weken/maanden etc. 
Deze library doet dit al wel (met het oog op de toekomst) en biedt zo veel meer extra event handlers al ingebouwd dat het in mijn ogen dom zou zijn
het wiel opnieuw uit te vinden. Hier een overzicht: http://docs.dhtmlx.com/scheduler/api__refs__scheduler.html#events 

Fixme:
Ook is er gekozen voor de html tag <input type="data"> te gebruiken. Dat bleek een fout omdat deze slechts ondersteund wordt in Chrome en Opera. 
Deze issue kan makkelijk gefixt worden door een andere datepicker library of andere oplossing.

Todo:
-De form onderaan de pagina kan nu gebruikt worden om afspraken te maken. Dit zou idealiter natuurlijk gebeuren door een klik op de agenda waarbij de aangeklikte
tijd alvast wordt overgenomen.
-De labels voor Locatie staat nu nog vast op 1 - 5, de gebruikers ook. Dit moeten aanpasbare velden zijn die zowel naar als
vanuit de db kunnen worden geschreven/gegenereerd in de toekomst.

----------

DB status:
Met de database is de huidige stand van zaken:
Via entity lukt het om data welke géén koppelingen kennen weg te schrijven naar een database. Hierbij is het ook inmidels gelukt om meerdere type data/objecten weg te schrijven (zoals locatie en personen). Ook is het gelukt om de data zowel in de LocalDB weg te schrijven als op de SQLServer. Echter hoe via entity de data moet worden weggeschreven welke gekoppeld is (zoals afspraak welke gekoppeld is aan locatie), lukt nog niet.
De andere weg welke tot nu toe es geprobeerd is het wegschrijven van data via zelfgemaakte queries. Hoe die queries eruit moeten komen te zien is geen probleem, ook niet wanneer de data foreign key constrains (koppelingen) kennen. Echter de queries uitvoeren (via transaction, execute e.d.) lukt echter nog niet.