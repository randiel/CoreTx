<?php


$cad="";
$cad2="";
$cad.= "Ext.onReady(function(){";
$cad.= "Ext.QuickTips.init();";
$cad.= "	var detailEl;";
echo $cad;
include('panelMenu.php');	
$cad2.= "	});";
echo $cad2;
?>
