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
$js = "
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
";
echo $js;
?>