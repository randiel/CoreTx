<?php

$loginUsername = isset($_POST["loginUsername"]) ? $_POST["loginUsername"] : "invitado";
$loginPassword = isset($_POST["loginPassword"]) ? $_POST["loginPassword"] : "anonimo";
$rs = '';
$valido = '';

$rs = $objDb->sp_exec($siteConfig, "CALL spValidarUsuario('".$loginUsername."','".$loginPassword."');"); 
$valido = $rs["vOK"][0];

if ($valido){
    $result["success"] = true;
}
else
{
    $result["success"] = false;
    $result["errors"]["reason"] = "Error al iniciar sesión. Intente de nuevo.";
}

echo json_encode($result);
?>