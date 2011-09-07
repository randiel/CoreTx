<?php

/*** 
**** @archivo	: templateLoader.php
**** @desc 		: Clase de gestion de pantallas
**** @project	: CitasWeb 
**** @version	: 0.1; 
**** @author	: R&R; 
**** @date		: Viernes, 08 de agosto 2009; 
**** @license	: Copyright BlackPrince Enterprise. Todos los derechos reservados; 
***/ 

class templateLoader {
	
	public $templateName = '';
	
	public function __construct(){
		
	}
	
	public function getTemplate($siteEvent, $objNavegador)//, $raiz, $accion)
	{
		//$fileName = $siteEvent[$raiz][$accion][0].'/'.$siteEvent[$raiz][$accion][1].'.'.$siteEvent[$raiz][$accion][0];
		$fileName = 'html/'.$objNavegador->nodoActual;
		$result = fopen($fileName, 'r') or exit("No se encontró el archivo!");	
		return $result;
	}	
}

?>