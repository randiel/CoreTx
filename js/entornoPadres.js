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
	var codProfesor;
	var win = Ext.getCmp('winmsg');
	
	var panelMenu = Ext.extend(Ext.Panel, {
		height:100,
        style: 'margin-top:0px; margin-bottom:0px;',
        bodyStyle: 'padding:10px; border: 0px; background: transparent; ',
        renderTo: 'toolbar',        
        autoScroll: false
    });
	
	if(!win){	
	var win = new Ext.Window({
		id:'winmsg', 
		contentEl:'mensajes', 		
		layout:'fit',
		closable: false,
		resizable: false,
		width:500,
		height:300,
		plain: true,		
		modal:true,
		items: new Ext.Panel({
					labelWidth:100,
					frame:true,
					width:300,
					collapsible:true,
					//defaultType:'textfield',
					/*items:[{
						fieldLabel:'num',
						name:'txt_stock_in',
						allowBlank:true
					}]*/
					html: '<div id="divPantalla">Ticket de Cita</i></div>'
				}),

		buttons: [{
			text:'Confirmar',
			id:'confirmar',
			disabled:false,
			handler: function(){					
				Ext.getCmp('imprimir').enable();
				Ext.getCmp('cerrar').enable();
				Ext.getCmp('confirmar').disable();
			}
		},{
			text:'Imprimir',
			id: 'imprimir',
			disabled:true,
			handler: function(){					
				document.getElementById('divReporte').innerHTML = 'Ticket de Cita';								
				window.print();				
			}
		},{
			text: 'Cerrar',
			id: 'cerrar',
			disabled:true,
			handler: function(){
				Ext.getCmp('cerrar').disable();
				Ext.getCmp('imprimir').disable();
				Ext.getCmp('confirmar').enable();
				win.hide(this);
			}
		}]
		});
	}
	
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
					//Ext.example.msg('Importante!','Primero debe seleccionar uno de sus hijos!');
					Ext.Ajax.request({
						url: 'registrarCita.php?horaCita=' +Ext.get('cmbHorarios').dom.value,
						success: function(response) {
							var features=Ext.util.JSON.decode(response.responseText);
							//alert("La cita ha sido registrada, por favor imprima el Reporte de Cita.");							
							win.show(this);
						}
					});
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
	
	var strDia = new Ext.data.JsonStore({
		autoDestroy: true, 
		url:'getDiasProfesor.php',
		storeId: 'strDia',
		listeners: 
		{	
			load: function(str, regx, par){  
				Ext.getCmp('cmbDias').setValue(regx[0].get(Ext.getCmp('cmbDias').displayField));				
			}		
		}
	});
	
	var strHorario = new Ext.data.JsonStore({
		autoDestroy: true, 
		url:'getHorariosProfesor.php',
		storeId: 'strHorario',
		listeners: 
		{	
			load: function(str, regx, par){  
				Ext.getCmp('cmbHorarios').setValue(regx[0].get(Ext.getCmp('cmbHorarios').displayField));				
			}		
		}
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
        items:[{
                fieldLabel: 'Curso',
                id: 'txtCurso',
				name: 'txtCurso',
                allowBlank:false
            },{
                fieldLabel: 'Profesor',
                id: 'txtProfesor',
				name: 'txtProfesor'
            },
				new Ext.form.ComboBox({
					id: 'cmbDias',
					name:'cmbDiaCita',
					lazyInit: false,
					fieldLabel:'Dia',
					editable: false,
					allowBlank: false,
					emptyText: 'Por favor ingrese el dia de la cita..',
					valueField: 'fecha',
					displayField: 'dia',
					store: strDia,
					mode:'remote',
					triggerAction: 'all', 
					lastQuery: '',
					listeners   : {   
						beforequery: function(cmb){   
							cmb.lastQuery = '';
						}, 
						select: function(cmb){							
							Ext.getCmp('cmbHorarios').store.load({params: {fecha: cmb.getValue()}});
							Ext.getCmp('cmbHorarios').setValue('');
						}
					}   
				})
            ,
				new Ext.form.ComboBox({
					id: 'cmbHorarios',
					name:'cmbHorarioCita',
					lazyInit: false,
					fieldLabel: 'Horario',
					editable: false,
					allowBlank: false,
					emptyText: 'Por favor elija el horario...',
					valueField: 'horario',
					displayField: 'horario',
					store: strHorario,
					mode: 'remote',
					triggerAction: 'all',
					lastQuery: '',
					listeners: {   
						beforequery: function(cmb){   
							cmb.lastQuery = '';
						}, 
						select: function(cmb){
							/*Ext.Ajax.request({
								url: 'form-data.php?codigoProfesor='+id,
								success: function(response) {
									var features=Ext.util.JSON.decode(response.responseText);
									alert(features);
									//simple.removeAll();
									//simple.add(features);
									//simple.doLayout();
								}
							});		*/					
						}
					}   
				}), // cal,
			{
                fieldLabel: 'Email',
                name: 'txtEmail',
                vtype:'email'
            }] 
    });
	
	var simpleFeaturesLoad=function(id) {
		Ext.Ajax.request({
			url: 'form-data.php?codigoProfesor='+id,
			success: function(response) {
				var features=Ext.util.JSON.decode(response.responseText);				
				//simple.removeAll();
				//simple.add(features);
				//simple.doLayout();
			}
		});
	}
	
	var accordion = new Ext.Panel({
		id: 'accordion-panel',
		title: 'Cursos del Alumno',
		border: false,
		columnWidth: .4,		
		layout: 'accordion',
		bodyBorder: false,
		bodyStyle: 'background-color:#DFE8F6',
		defaults: {
			bodyStyle: 'padding:15px'
		},
		layoutConfig: {
			animate: false
		}
	});

	var accordionFeaturesLoad=function(id) {
		Ext.Ajax.request({
			url: 'accordion-data.php?codigoAlumno='+id,
			success: function(response) {
				var features=Ext.util.JSON.decode(response.responseText);
				accordion.removeAll();
				accordion.add(features);
				accordion.doLayout();
			}
		});
	}

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
		autoScroll: false,		
		height: 400,  // Con esta altura llena el body		
		bodyStyle: 'overflow-x:hidden;overflow-y:auto;',
		defaults: {
			frame: true
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
            dataUrl:'../php/tree-data.php'
        }),
		
        root: new Ext.tree.AsyncTreeNode()
    });
		
    treePanel.on('click', function(n){
		if(n.leaf){
			accordionFeaturesLoad(n.id);			
		}
    });
/*		    
	var detailsPanel = {
		id: 'details-panel',
        title: 'Informacion Adicional',
        region: 'center',
        bodyStyle: 'padding-bottom:15px;background:#eee;',
		autoScroll: true,
		html: '<p class="details-info">When you select a layout from the tree, additional details will display here.</p>'
    };
*/
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
//			items: [treePanel, detailsPanel]
			items: [treePanel]
		},
			contentPanel
		],
        renderTo: Ext.getBody()
    });	
});


