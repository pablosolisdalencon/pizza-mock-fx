<?php
include_once 'api/principales/apiPrincipales.php';
include_once 'api/contratistas/apiContratistas.php';
$principales = new ApiPrincipales();
$contratistas = new ApiContratistas();
$principales->getAll();
$contratistas->getAll();

?>