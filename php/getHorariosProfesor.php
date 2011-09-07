<?php session_start();

include('../siteConfig.php');
include('../class/dbConector.php');

$_SESSION['fecha'] = $_POST['fecha'];

$objDB = new dbConector($siteConfig);
$data = $objDB->sp_exec($siteConfig, "CALL spObtenerHorariosAgenda(".$siteConfig['aplicacion:ano'].", ".$siteConfig['aplicacion:periodo'].", '".$_SESSION['codigoProfesor']."', '".$_SESSION['fecha']."');");	  

$metaData['idProperty'] = 'horario';
$metaData['root'] = 'results';
$metaData['totalProperty'] = 'rows';
$metaData['successProperty'] = 'status';
/* fields info */
for ($col = 0; $col < $data['&cols']; $col++){
	$metaData['fields'][] = array('name' => $data['&fieldname'][$col], 'mapping' => $data['&fieldname'][$col]);
}
$metaData['fields'][] = array('name' => 'horario', 'mapping' => 'horario');

$jsonData['metaData'] = $metaData;
// configured successProperty
$jsonData['status'] = ($data['&status'] == 1);
// configured totalProperty
$jsonData['rows'] = $data['&rows'];
// configured root
for ($row = 0; $row < $data['&rows']; $row++){
	$jsonData['results'][] = array('horario'=>$data['horaInicio'][$row]." - ".$data['horaFin'][$row]);
}

//var_dump($jsonData);

echo json_encode($jsonData);

?>