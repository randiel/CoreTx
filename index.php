<?php session_start();
/*** 
**** @archivo	: index.php
**** @desc 		: Archivo de carga del Site y <dispatcher> de las demas clases
**** @project	: CitasWeb 
**** @version	: 0.1; 
**** @author	: R&R; 
**** @date		: Viernes, 08 de agosto 2009; 
**** @license	: Copyright BlackPrince Enterprise. Todos los derechos reservados; 
***/ 

/* <!---Includes--- */
	require_once('siteConfig.php');
	require_once('arbolServicio.php');

	require_once('class/dbConector.php');
	require_once('class/templateLoader.php');
	require_once('class/screenEngine.php');
	require_once('class/eventListener.php');
	require_once('class/navigatorWeb.php');
/* ---Includes---> */

	$objNavegador   = new navigatorWeb;
	$objDb          = new dbConector($siteConfig);	
	$objTemplate    = new templateLoader();
	$objScreen      = new screenEngine();
	$objListener    = new eventListener();	
	
	$objNavegador->nodoActual = $arbol['index']['auto'];
	
	if ($_POST) {
		$getArray = array();
		$resultBR[] = array();
		
		foreach ($_POST as $key => $value)
			$getArray[$key] = $value;

		$resultBR = $objListener->rulesExec($siteConfig, $objDb,'rules_btnIniciar', $getArray);
		
		$_SESSION['codigousuario']  = $resultBR['codigousuario'];
		$_SESSION['tipousuario']  = $resultBR['tipousuario'];
				
		if($resultBR["success"]) {
			$resultBR["xy"] = $resultBR["xy"]."1";
		if($resultBR["tipousuario"] =='F' )
			$resultBR["xy"] = $resultBR["xy"]."10";
		if((($resultBR["tipousuario"] =='P') || ($resultBR["tipousuario"] =='D')) || ($resultBR["tipousuario"] =='A'))
			$resultBR["xy"] = $resultBR["xy"]."01";
		}
		else {
			$resultBR['xy'] = '';
			$resultBR['xy'] = $resultBR['xy']."000";
		}
		
		$objNavegador->ruteador($arbol, $resultBR['xy']);
		echo json_encode($resultBR);		
	}
	else {
		$hTemplate = $objTemplate->getTemplate($siteEvent, $objNavegador);
		$objScreen->renderScreen($siteConfig,$hTemplate);
	}
?> 