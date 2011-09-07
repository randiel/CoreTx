<?php

/*** 
**** @archivo	: eventListener.php
**** @desc 		: Clase de gestion de eventos
**** @project	: CitasWeb 
**** @version	: 0.1; 
**** @author	: R&R; 
**** @date		: Sabado, 09 de agosto 2009; 
**** @license	: Copyright BlackPrince Enterprise. Todos los derechos reservados; 
***/ 

class eventListener {

	public function __construct(){

	}
	
	public function rulesExec($siteConfig, $objDb, $funcion, $getArray)
	{
		if ($funcion=='rules_btnIniciar'){
			$rs = '';
			$valido = '';

			$rs = $objDb->sp_exec($siteConfig, "CALL spValidarUsuario('".$getArray['loginusername']."','".$getArray['loginpassword']."');"); 

			$codigoUsuario = $rs["codigoUsuario"][0];
			$tipoUsuario   = $rs["tipoUsuario"][0];		

			$result['codigousuario']  = $codigoUsuario;			
			$result['tipousuario']  = $tipoUsuario;	
		
			if ($codigoUsuario != NULL){
				$result["success"] = true;
			}
			else
			{
				$result["success"] = false;
				$result["errors"]["reason"] = "Error al iniciar sesión. Intente de nuevo.";
			}			
			return $result;
		}
	}	
}

?>