<?php 
/*** 
**** @archivo	: arbolServicio.php
**** @desc 		: Arbol de Servicio <eventsInvoker>
**** @project	: CitasWeb 
**** @version	: 0.1; 
**** @author	: R&R; 
**** @date		: Viernes, 07 de agosto 2009; 
**** @license	: Copyright BlackPrince Enterprise. Todos los derechos reservados; 
***/ 
$arbol     = array();
$siteEvent = array();

// arbolServicio
$arbol['index']['auto'] 				= 'login.html';
$arbol['login']['110'] 					= 'entornoPadres.php';
$arbol['login']['101'] 					= 'entornoPersonal.php';
$arbol['login']['000']					= 'salir.php';
$arbol['entornoPadres'] 				= array('index');
$arbol['entornoPadres'] 				= array('enviarCorreo');
$arbol['entornoPadres'] 				= array('salir');
$arbol['entornoPadres'] 				= array('registrarCita');
$arbol['entornoPadres'] 				= array('citasPendientes');
$arbol['entornoPadres'] 				= array('cancelarCita');
$arbol['entornoPadres'] 				= array('enviarSolicitud');
$arbol['entornoPadres'] 				= array('actualizarDatos');

//index
$siteEvent['index']['auto']				= array('html','login');

// Siempre el segundo elemento del array 
// para a ser el primer indice del array
// para el nodo de navegacion siguiente

// login
$siteEvent['login']['btnIniciar']		= 'rules_btnIniciar';
$siteEvent['login']['btnIniciar']		= 'rules_btnIniciar';
// La funcion que llama a este evento debe llevar este string + array de la signatura.
$siteEvent['login']['btnCancelar']		= array('php','salir');
// La funcion que llama a este evento debe llevar este string + array del POST.
$siteEvent['login']['noServer']			= array('js','msgbox', $siteConfig['msg:noServer'] );
$siteEvent['login']['userInvalid']		= array('js','msgbox', $siteConfig['msg:userInvalid'] );

// entornoPadres
$siteEvent['entornoPadres']['btnRegistrarCita']		= array('php','registrarCita');

?> 