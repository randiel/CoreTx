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
Ext.onReady(function(){
	
	Ext.QuickTips.init();
	var detailEl;

	var panelMenu = Ext.extend(Ext.Panel, {
		height:100,
        style: 'margin-top:0px; margin-bottom:0px;',
        bodyStyle: 'padding:10px; border: 0px; background: transparent; ',
        renderTo: 'toolbar',        
        autoScroll: false
    });
		
    new panelMenu({
        tbar: [{
            xtype: 'buttongroup',
            columns: 3,
            title: 'Menu Principal',
            items: [{
                text: '&nbsp;&nbsp;Principal&nbsp;&nbsp;',
                scale: 'large',
				iconCls: 'home',
                iconAlign: 'top',
				handler: function(){
					var redirect = 'http://www.champagnat.edu.pe/';
					window.location = redirect;
				}						
            },{
                text: 'Enviar Correo',
                scale: 'large',
                iconCls: 'email',
                iconAlign: 'top',
				handler: function(){
					Ext.example.msg('Importante!','Debe registrar un email en su ficha de datos!');					
				}					
            },{
                text: '&nbsp;Finalizar&nbsp;',
                scale: 'large',                
                iconCls: 'fin',
                iconAlign: 'top',
				handler: function(){
					var redirect = '../index.php';
					window.location = redirect;
				}									
            }]
        },{
            xtype: 'buttongroup',
            columns: 6,			
            title: 'Menu Padres',
            items: [{
                text: 'Registrar Cita',
                scale: 'large',
                iconCls: 'regCita',
                iconAlign: 'top',
				handler: function(){
					Ext.example.msg('Importante!','Primero debe seleccionar uno de sus hijos!');					
				}	
            },{
                text: 'Citas Pendientes',
                scale: 'large',
				iconCls: 'citaPen',
                iconAlign: 'top',
				handler: function(){
					Ext.example.msg('Importante!','Esta funcionalidad aun no esta preparada!');
				}		
            },{
                text: 'Cancelar cita',
                scale: 'large',
                iconCls: 'canCita',
                iconAlign: 'top',
				handler: function(){
					Ext.example.msg('Importante!','Esta funcionalidad aun no esta preparada!');
				}						
            },{
                text: 'Env Solicitud',
                scale: 'large',                
                iconCls: 'envSoli',
                iconAlign: 'top',
				handler: function(){
					Ext.example.msg('Importante!','Esta funcionalidad aun no esta preparada!');
				}						
            },{
                text: 'Actualizar Datos',
                scale: 'large',
                iconCls: 'actDatos',
                iconAlign: 'top',
				handler: function(){
					Ext.example.msg('Importante!','Esta funcionalidad aun no esta preparada!');
				}					
            }]
		}]
    });
	
	var accordion = {
		id: 'accordion-panel',
		title: 'Cursos del Alumno',
		border: false,
		columnWidth: .4,
		layout: 'accordion',
		bodyBorder: false,
		bodyStyle: 'background-color:#DFE8F6',
		defaults: {bodyStyle: 'padding:15px'},
		items: [{
			title: '--> Matematica',
			cls: 'custom-accordion',
			tools: [{id:'gear'},{id:'refresh'}],
			html: '<p>Here is some accordion content.  Click on one of the other bars below for more.</p>'
		},{
			title: '--> Fisica',
			cls: 'custom-accordion',
			html: '<br /><p>More content.  Open the third panel for a customized look and feel example.</p>',
			items: {
				xtype: 'button',
				text: 'Show Next Panel',
				handler: function(){
					Ext.getCmp('acc-custom').expand(true);
				}
			}
		},{
			id: 'acc-custom',
			title: '--> Ciencias Naturales',
			cls: 'custom-accordion',
			html: '<p>Here is an example of how easy it is to completely customize the look and feel of an individual panel simply by adding a CSS class in the config.</p>'
		}]
	};
	
	var evtDate = new Array();    
	for(var x=0; x < 10; x++) {		
		evtDate[x] = new Date(2009, 7, 9).add('d',x*5);    
	}
	
	var jslang = "ES";
	
	cal = new Ext.ux.DatePickerPlus({
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

	// 
	cal.selectedDates = [new Date(2009,10,1),new Date(2009,9,5),new Date(2009,9,8)] 
	//cal.selectedDates.push(new Date(2009,9,8));
	
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
	
	time = new Ext.form.TimeField({
			fieldLabel: 'Horario',
			name: 'time',
			//style: { "margin-left": "0px", "margin-bottom": "10px" },
			minValue: '8:00am',
			maxValue: '6:00pm'
			
	});

	var simple = new Ext.FormPanel({
        labelWidth: 60, // Todas las etiquetas del formulario
        url:'save-form.php',
        frame:true,
        title: 'Formulario de Cita',
		bodyStyle:'padding:5px 5px 0',
        width: 200,
        defaults: { width: 210 , style: { "margin-bottom": "10px" } },
        defaultType: 'textfield',

        items: [{
                fieldLabel: 'Curso',
                name: 'first',
                allowBlank:false
            },{
                fieldLabel: 'Profesor',
                name: 'last'
            },{
                fieldLabel: 'Dia',
                id:'date',
                name: 'date'
            },
				time, cal,
			{
                fieldLabel: 'Email',
                name: 'email',
                vtype:'email'
            }]
    });

	var fit = {
		id: 'fit-panel',
		border: false,
		autoHeight : true,
		columnWidth: .6, 	
		layout: 'fit',
		items: [
			simple
		]
	};

	var contentPanel = {
		id: 'content-panel',
		region: 'center',
		layout: 'column',
		height: 400,  // Con esta altura llena el body
		defaults: {
			frame: false
		},
		items: [ accordion, fit ]
	};

    var treePanel = new Ext.tree.TreePanel({
    	id: 'tree-panel',
    	title: 'Relacion de hijos',
        region:'north',
        split: true,
        height: 300,
        minSize: 150,
        autoScroll: true,        
        rootVisible: false,
        lines: true,
        singleExpand: false,
        useArrows: true,
        loader: new Ext.tree.TreeLoader({
            //dataUrl:'../json/tree-data.json'	
            dataUrl:'../php/tree-data.php'				
        }),
        
        root: new Ext.tree.AsyncTreeNode()
    });
    
    treePanel.on('click', function(n){
    	var sn = this.selModel.selNode || {};
    	if(n.leaf && n.id != sn.id){
    		Ext.getCmp('content-panel').layout.setActiveItem(n.id + '-panel');
    		if(!detailEl){
    			var bd = Ext.getCmp('details-panel').body;
    			bd.update('').setStyle('background','#000');
    			detailEl = bd.createChild();
    		}
    		detailEl.hide().update(Ext.getDom(n.id+'-details').innerHTML).slideIn('l', {stopFx:true,duration:.2});
    	}
    });
		    
	var detailsPanel = {
		id: 'details-panel',
        title: 'Informacion Adicional',
        region: 'center',
        bodyStyle: 'padding-bottom:15px;background:#eee;',
		autoScroll: true,
		html: '<p class="details-info">When you select a layout from the tree, additional details will display here.</p>'
    };

    new Ext.Viewport({
		layout: 'border',
		title: 'Ext Layout Browser',
		items: [{
			xtype: 'box',
			region: 'north',
			applyTo: 'toolbar',
			height: 155
		},{
			layout: 'border',
	    	id: 'layout-browser',
	        region:'west',
	        border: false,
	        split:true,
			margins: '2 0 5 5',
	        width: 275,
	        minSize: 100,
	        maxSize: 500,
			items: [treePanel, detailsPanel]
		},
			contentPanel
		],
        renderTo: Ext.getBody()
    });	
});


