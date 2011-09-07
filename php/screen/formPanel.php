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
include ('calendar.php');
include ('timeField.php');

$js .= "
	var formPanel = new Ext.FormPanel({
        labelWidth: 60, // Todas las etiquetas del formulario
        url:'save-form.php',
        frame:true,
        title: 'Formulario de Cita',
		bodyStyle:'padding:5px 5px 0',
        width: 200,
        defaults: { width: 210 , style: { \"margin-bottom\": \"10px\" } },
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
				calendar,
				timeField, 
			{
                fieldLabel: 'Email',
                name: 'email',
                vtype:'email'
            }]
    });
";
?>