<?php session_start();

include('../siteConfig.php');
include('../class/dbConector.php');

$userData = array();
$aHijos = array();
$objDB = new dbConector($siteConfig);
	
$userData = $objDB->sp_exec($siteConfig, "CALL spConsultarFamilia('".$_SESSION['codigousuario']."');");
$aHijos = $objDB->sp_exec($siteConfig, "CALL spObtenerHijos('".$_SESSION['codigousuario']."');");

$cad = "";
$cad = $cad. "[{";
$cad = $cad. "text:'FAMILIA: ".$userData['paterno'][0]." ".$userData['materno'][0]."',";
$cad = $cad. "	icon:'/images/padres.png',";
$cad = $cad. "    expanded: true,	";
$cad = $cad. "    children:[{";
for($i=0;$i<$aHijos['&rows'];$i++){
	$cad = $cad. "        text:'".$aHijos['nombres'][$i].", ".$aHijos['paterno'][$i]." ".$aHijos['materno'][$i]."',";
	$cad = $cad. "        id:'".$aHijos['codigo'][$i]."',";
	$cad = $cad. "		  icon:'/images/alumnos.png',		";
	$cad = $cad. "        leaf:true";	
	if ($i!=$aHijos['&rows']-1){		
		$cad = $cad. "    },{";
	}
	else{
		$cad = $cad. "    }]";
		$cad = $cad. "}]";
	}
}

echo $cad;

?>