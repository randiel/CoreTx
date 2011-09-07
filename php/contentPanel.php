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
include ('accordion.php');
include ('fit.php');

$js .= "
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
";
?>