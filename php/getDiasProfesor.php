<?php session_start();

include('../siteConfig.php');
include('../class/dbConector.php');

$_SESSION['codigoProfesor'] = $_POST['codigoProfesor'];

$objDB = new dbConector($siteConfig);
$data = $objDB->sp_exec($siteConfig, "CALL spObtenerDiasAgenda(".$siteConfig['aplicacion:ano'].", ".$siteConfig['aplicacion:periodo'].", '".$_SESSION['codigoProfesor']."');");	  

/* metadata info */
$metaData['idProperty'] = 'id';
$metaData['root'] = 'results';
$metaData['totalProperty'] = 'rows';
$metaData['successProperty'] = 'status';
/* fields info */
for ($col = 0; $col < $data['&cols']; $col++){
	$metaData['fields'][] = array('name' => $data['&fieldname'][$col], 'mapping' => $data['&fieldname'][$col]);
}
$metaData['fields'][] = array('name' => 'dia', 'mapping' => 'dia');
/* ----------- */
// used by store to set its sortInfo
//$metaData['sortInfo'] = array('field' => 'fecha', 'direction' => 'ASC');
// paging data (if applicable)
//$metaData['start'] = 0;
//$metaData['limit'] = 2;
// custom property
//$metaData['foo'] = 'bar';
/* ============= */

$jsonData['metaData'] = $metaData;
// configured successProperty
$jsonData['status'] = ($data['&status'] == 1);
// configured totalProperty
$jsonData['rows'] = $data['&rows'];
// configured root
for ($row = 0; $row < $data['&rows']; $row++){
	$jsonData['results'][] = array('fecha'=>$data['fecha'][$row], 'dia'=>substr($data['fecha'][$row], 8, 2).'/'.substr($data['fecha'][$row], 5, 2).'/'.substr($data['fecha'][$row], 0, 4));
}

echo json_encode($jsonData);
?>