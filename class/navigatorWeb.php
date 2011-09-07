<?php

/*** 
**** @archivo	: navigatorWeb.php
**** @desc 		: Clase de navegacion del usuario
**** @project	: CitasWeb 
**** @version	: 0.1; 
**** @author	: R&R; 
**** @date		: Sabado, 10 de agosto 2009; 
**** @license	: Copyright BlackPrince Enterprise. Todos los derechos reservados; 
***/ 

class navigatorWeb {
	
	public $nodoActual;
	public $nodoSiguiente;
	public $nodoAnterior;
	
	public $brNombre;
	public $brResult;
		
	public function __construct(){

	}
	
	public function ruteador($arbol, $result){
		$this->nodoAnterior = $this->nodoActual;
		$this->nodoActual = $arbol['login'][$result];
		//$rutaVal["success"]=true;
		//return $rutaVal["success"];
	}
}
	