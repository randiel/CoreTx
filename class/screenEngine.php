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
class screenEngine
{
	public $buffer = '';
	public $handle = '';
	public $varOn  = '';
	public $varTag = '';
	
	private $tagini = 0;
	private $tagfin = 0;
	private $restoLine = '';
	
	public function __construct(){
		
	}
	
	public function renderScreen($siteConfig, $handle)
	{		
		if ($handle) {
			while (!feof($handle)) {	
				$buffer = fgets($handle, 4096);
				$tagini = strrpos($buffer,'<<');
				if ($tagini>0){
					$restoLine = substr($buffer, $tagini+2);
					$tagfin = strrpos($restoLine,'>>');
					$varTag = substr($buffer, $tagini, $tagfin+4);
					$varOn  = substr($buffer, $tagini +2 , $tagfin);
					$buffer = str_replace($varTag, $siteConfig[$varOn], $buffer);	
				}
				echo $buffer;
			}
			fclose($handle);
		}
	}
}