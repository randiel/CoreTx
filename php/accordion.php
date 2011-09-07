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
";
?>