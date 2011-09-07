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
include ('formPanel.php');

$js .= "
	var fit = {
		id: 'fit-panel',
		border: false,
		autoHeight : true,
		columnWidth: .6, 	
		layout: 'fit',
		items: [ formPanel ]
	};
";
?>