<?php
/*
* Empresa		: BlackPrince S.A. 2009
* Aplicación	: Sistemas de Citas
* Análisis		: R&R
* Desarrollo	: Randiel J. Melgarejo
* Fecha			: Viernes, 07 de agosto 2009 
**
**
**
*/

$js .= "
	var evtDate = new Array();    
	for(var x=0; x < 10; x++) {		
		evtDate[x] = new Date(2009, 7, 9).add('d',x*5);    
	}
	
	var jslang = 'ES';
	calendar = new Ext.ux.DatePickerPlus({
		value:            new Date(),
		minDate:          new Date(),
		noOfMonth:        1,
		noOfMonthPerRow:  1,
		weekendDays: [0, 6], //0 = Domingos 6 = Sabados
		//disabledDatesText :'En esta fecha no habra atención para los padres.',
		showWeekNumber:   false,
		showActiveDate:   true,
		renderTodayButton: false,
		//eventDates: evtDate,
		styleDisabledDates: true,
		minDate : new Date(2009,7,10),
		maxDate : new Date(2009,9,9),
		strictRangeSelect: true,
		markWeekends: true,
		listeners:
		  {	
			render: function(){ set_dates(); },
			'Select':function(){
				var mydate = this.value; 
				Ext.get('date').dom.value = String(mydate).substr(0,15);
			}
	}});

	calendar.selectedDates = [new Date(2009,10,1),new Date(2009,9,5),new Date(2009,9,8)] 
	//calendar.selectedDates.push(new Date(2009,9,8));
	
	function set_dates()
	  {
	  var aDates =
		[{
		text: 'Elegir dia de Cita',
		cls:  'x-date-dispo',
		date: new Date(2009, 7, 10)
		},{
		text: 'Elegir dia de Cita',
		cls:  'x-date-dispo',
		date: new Date(2009, 7, 12)
		},{
		text: 'Elegir dia de Cita',
		cls:  'x-date-dispo',
		date: new Date(2009, 7, 17)
		},{
		text: 'Elegir dia de Cita',
		cls:  'x-date-dispo',
		date: new Date(2009, 7, 19)
		},{
		text: 'Elegir dia de Cita',
		cls:  'x-date-dispo',
		date: new Date(2009, 7, 24)
		},{
		text: 'Elegir dia de Cita',
		cls:  'x-date-dispo',
		date: new Date(2009, 7, 26)
		},{
		text: 'Elegir dia de Cita',
		cls:  'x-date-dispo',
		date: new Date(2009, 7, 31)
		},{
		text: 'Elegir dia de Cita',
		cls:  'x-date-dispo',
		date: new Date(2009, 8, 2)
		},{
		text: 'Elegir dia de Cita',
		cls:  'x-date-dispo',
		date: new Date(2009, 8, 7)
		}]
	  cal.setEventDates(aDates);
	}
";
?>