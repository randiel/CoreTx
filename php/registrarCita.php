<?php session_start();

include('../siteConfig.php');
include('../class/dbConector.php');

$codigoProfesor = $_SESSION['codigoProfesor'];
$fecha          = $_SESSION['fecha'];
$horaIni        = substr($_GET['horaCita'],0,5);
$horaFin        = substr($_GET['horaCita'],11,5);
$codigoFamilia  = $_SESSION['codigousuario'];
$codigoPadre    = '';
$codigoAlumno   = $_SESSION['codigoAlumno'];
$idSolicitud    = '0';
$codigoUsuario  = $_SESSION['codigousuario'];

$objDB = new dbConector($siteConfig);
$data = $objDB->sp_exec($siteConfig, "CALL spRegistrarCita('".$codigoProfesor."', '".$fecha."', '".$horaIni."', '".$horaFin."', '".$codigoFamilia."', '".$codigoPadre."', '".$codigoAlumno."', ".$idSolicitud.", '".$codigoUsuario."');");

/* En este caso solo nos interesa saber si se ejecuto exitosamente el INSERT*/
$metaData['idProperty'] = 'id';
$metaData['root'] = 'results';
$metaData['totalProperty'] = 'rows';
$metaData['successProperty'] = 'status';

$jsonData['metaData'] = $metaData;
$jsonData['status'] = ($data['&status'] == 1);

echo json_encode($jsonData);
?>