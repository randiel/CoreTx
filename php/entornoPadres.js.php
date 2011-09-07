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
Ext.onReady(function(){
	
	Ext.QuickTips.init();
	var detailEl;
";

include ('panelMenu.php');
include ('ViewPort.php');
include ('contentPanel.php');

$js .= "});";

echo $js;
?>