<?php 
/*** 
**** @archivo	: siteConfig.php
**** @desc 		: Archivo de configuración del <dispatcher>
**** @project	: CitasWeb 
**** @version	: 0.1; 
**** @author	: R&R; 
**** @date		: Viernes, 07 de agosto 2009; 
**** @license	: Copyright BlackPrince Enterprise. Todos los derechos reservados; 
***/ 
$siteConfig = array();

/* <!---Datos del proyecto--- */
$siteConfig['nombre']				= 'Sistema de Citas por Internet'; // Nombre del Proyecto
$siteConfig['aplicacion:nombre']	= 'CitasWeb';
$siteConfig['aplicacion:version']	= 'v 0.1';
$siteConfig['copy']					= 'Copyright © 2009 BlackPrince S.A. Todos los derechos reservados.';

$siteConfig['server']				= "localhost";
$siteConfig['user']					= 'siscitas';
$siteConfig['pass']					= 'citas==$$';
$siteConfig['db']					= 'citas_db';
/* ---Datos del proyecto---> */


/* <!---Parametros de la aplicacion--- */
$siteConfig['aplicacion:ano']	= '2009';
$siteConfig['aplicacion:periodo']	= '3';
/* ---Parametros de la aplicacion---> */

/* <!---Datos del login.php--- */
$siteConfig['login:charset']		= 'iso-8859-1';
$siteConfig['login:css']			= 'css/login.css';
$siteConfig['login:ext:css']		= 'js/ext/resources/css/ext-all.css';
$siteConfig['login:ext:js:1']		= 'js/ext/adapter/ext/ext-base.js';
$siteConfig['login:ext:js:2']		= 'js/ext/ext-all.js';
$siteConfig['login:js']				= 'js/login.js';
$siteConfig['login:titulo']			= 'Sistema de Citas por Internet'; 
$siteConfig['login:subtitulo']		= 'Colegio Champagnat Hermanos Maristas'; 
$siteConfig['login:logo']			= 'images/LogoColegio.png';
$siteConfig['login:btnIniciar']		= 'Iniciar';
$siteConfig['login:btnCancelar']	= 'Cancelar'; 
/* ---Datos del index.php---> */


$siteConfig['tituloMenuPadres']		= 'Menu Padres';
$siteConfig['tituloMenuPersonal']	= 'Menu Personal';

/* <!---Mensajes del sistema--- */
$siteConfig['msg:noUsername']			= 'Debe ingresar un nombre de usuario.'; 
$siteConfig['msg:noPassword']			= 'Debe ingresar una contraseña.'; 
$siteConfig['msg:noServer']				= 'El servidor del colegio no esta disponible.'; 
$siteConfig['msg:userInvalid']			= 'No se ha podido iniciar sesión. Vuelva a intentarlo.'; 
/* ---Mensajes del sistema---> */
?> 