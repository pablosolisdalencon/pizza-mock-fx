<?php
// Tipo SWAGGER ( Api Expose )
include_once 'ApiService.php';
?>
<html>
<head>
	<style>
@import url('https://fonts.googleapis.com/css?family=Source+Code+Pro');
		body{font-family:helvetica;font-size:1.2vmin}
		.Servicio{
			width:50%;margin-left:auto;margin-right:auto;
			border:1px solid greenyellow;
			margin:20px;
			background-color:darkgreen;
			color:white;
			border-radius:10px;
		}
		.Servicio h2{padding-left:20px;}
		.endpoint{
			border-radius:10px;
			border:1px solid blue;
			margin:20px;
			color:darkblue;
			background-color:yellowgreen;
		}
		.endpoint h3{padding-left:20px;}
		.endpoint .container{display:none;}
		
.json {
	
	padding:3%;
	border:1px solid #333;
	border-radius:5px;
	background-color:lightgoldenrodyellow;
	margin-left:5%;
	margin-right:15%;
	
	
    font-family: 'Source Code Pro', monospace;
    font-size: 16px;
    
    & > {
        .json__item {
            display: block;
        }
    }
}
		.json input{width:100%;}

.json__item {
/*    display: none; */
    margin-top: 10px;
    padding-left: 20px;
    user-select: none;
}

.json__item--collapsible {
    cursor: pointer;
    overflow: hidden;
    position: relative;
    
    &::before {
        content: '+';
        position: absolute;
        left: 5px;
    }
    
    &::after {
        background-color: lightgrey;
        content: '';
        height: 100%;
        left: 9px;
        position: absolute;
        top: 26px;
        width: 1px;
    }
    
    &:hover {
        & > .json__key,
        & > .json__value {
            text-decoration: underline;
        }
    }
}

.json__toggle {
 /*   display: none; */
    
    &:checked ~ .json__item {
        display: block;
    }
}

.json__key {
    color: darkblue;
    display: inline;
    
    &::after {
        content: ': ';
    }
}

.json__value {
    display: inline;
}

.json__value--string {
    color: green;
}

.json__value--number {
    color: blue;
}

.json__value--boolean {
    color: red;
}
	</style>
	<script>
	function viewSrc(id){
		document.getElementById(id).style.display="block";
	}	
	function hiddeSrc(id){
		document.getElementById(id).style.display="none";
	}	
	</script>
</head>
<body>
<h1>API Pizza</h1>
	
<?php
$method='GET';
$data='';


// RELACIONES CONTRACTUALES	
echo('
<div class="Servicio">
<h2>
	Relaciones Contractuales
</h2>
');
// RELACIONES CONTRACTUALES	LISTADO GENERAL
$urlRelacionesContractuales='https://webserver.prolinesoftware.cl/pizza/api/relaciones-contractuales/';	
$relacionesContractuales=callAPI($method, $urlRelacionesContractuales, $data);
echo('	
	<div class="endpoint">
		<h3 onclick="viewSrc(\'codeviewerRelacionesContractuales\')">
			GET api/relaciones-contractuales/
		</h3>
		<div class="container" id="codeviewerRelacionesContractuales">
		</div>
	</div>
');

// RELACIONES CONTRACTUALES	POR RUT DEL PRINCIPAL	
$urlRelacionesContractualesByRutPrincipal='https://webserver.prolinesoftware.cl/pizza/api/relaciones-contractuales/?RutPrincipal=21.111.111-k';
$relacionesContractualesByRutPrincipal=callAPI($method, $urlRelacionesContractualesByRutPrincipal, $data);
echo('
	<div class="endpoint">
		<h3 onclick="viewSrc(\'codeviewerRelacionesContractualesByRutPrincipal\')">
			GET api/relaciones-contractuales/{RutPrincipal} <span style="color:grey;"> // api/relaciones-contractuales/?RutPrincipal=21.111.111-k</span>
		</h3>
		<div class="container" id="codeviewerRelacionesContractualesByRutPrincipal">
		</div>
	</div>
</div>
');
	
	//PRINCIPALES Origin Vinculaciones
$urlPrincipalesFromVinculaciones='https://webserver.prolinesoftware.cl/pizza/api/principales/?Origin=vinculaciones';	
$principalesFromVinculaciones=callAPI($method, $urlPrincipalesFromVinculaciones, $data);	
echo('
<div class="Servicio">
	<h2>
		Principales - Origin:vinculaciones
	</h2>
	<div class="endpoint">
		<h3 onclick="viewSrc(\'codeviewerPrincipalesFromVinculaciones\')">
			GET api/principales/{Origin} <span style="color:grey;">// api/principales/?Origin=vinculaciones</span>
		</h3>
		<div class="container" id="codeviewerPrincipalesFromVinculaciones">
		</div>
	</div>
');
	
//PRINCIPALES Origin relaciones-contractuales
$urlPrincipalesFromRelaciones='https://webserver.prolinesoftware.cl/pizza/api/principales/?Origin=relaciones-contractuales';	
$principalesFromRelaciones=callAPI($method, $urlPrincipalesFromRelaciones, $data);	
echo('

	<h2>
		Principales - Origin:relaciones-contractuales
	</h2>
	<div class="endpoint">
		<h3 onclick="viewSrc(\'codeviewerPrincipalesFromRelaciones\')">
			GET api/principales/{Origin} <span style="color:grey;">// api/principales/?Origin=relaciones-contractuales</span>
		</h3>
		<div class="container" id="codeviewerPrincipalesFromRelaciones">
		</div>
	</div>
');
	
//PRINCIPALES Origin Principales
$urlPrincipales='https://webserver.prolinesoftware.cl/pizza/api/principales/';	
$principales=callAPI($method, $urlPrincipales, $data);	
echo('
	<h2>
		Principales
	</h2>
	<div class="endpoint">
		<h3 onclick="viewSrc(\'codeviewerPrincipales\')">
			GET api/principales
		</h3>
		<div class="container" id="codeviewerPrincipales">
		</div>
	</div>
</div>
');
	
//CONTARTISTAS
	//Origin relaciones-contractuales By RutPrincipal
$urlContratistasFromRelacionesByRutPrincipal='https://webserver.prolinesoftware.cl/pizza/api/contratistas/?Origin=relaciones-contractuales&RutPrincipal=11.111.111-k';	
$contratistasFromRelacionesByRutPrincipal=callAPI($method, $urlContratistasFromRelacionesByRutPrincipal, $data);	
echo('
<div class="Servicio">
	<h2>
		Contratistas - Origin:relaciones-contractuales
	</h2>
	<div class="endpoint">
		<h3 onclick="viewSrc(\'codeviewerContratistasFromRelacionesByRutPrincipal\')">
			GET api/contratistas/{Origin}/{RutPrincipal} <span style="color:grey;">// api/contratistas/?Origin=relaciones-contractuales&RutPrincipal=11.111.111-k</span>
		</h3>
		<div class="container" id="codeviewerContratistasFromRelacionesByRutPrincipal">
		</div>
	</div>
');
//CONTRATISTAS	
$urlContratistas='https://webserver.prolinesoftware.cl/pizza/api/contratistas/';	
$contratistas=callAPI($method, $urlContratistas, $data);
echo('
	<h2>
		Contratistas
	</h2>
	<div class="endpoint">
	<h3 onclick="viewSrc(\'codeviewerContratistas\')">
		GET api/contratistas
	</h3>
		<div class="container" id="codeviewerContratistas">
		</div>
	</div>
</div>
');

//TRABAJADORES
$urlTrabajadores='https://webserver.prolinesoftware.cl/pizza/api/trabajadores/';	
$trabajadores=callAPI($method, $urlTrabajadores, $data);
echo('
<div class="Servicio">
	<h2>
		Trabajadores
	</h2>
	<div class="endpoint">
		<h3 onclick="viewSrc(\'codeviewerTrabajadores\')">
			GET api/trabajadores
		</h3>
		<div class="container" id="codeviewerTrabajadores">
		</div>
	</div>
');

	
//TRABAJADORES
	//Origin relaciones-contractuales By RutPrincipal
$urlTrabajadoresFromRelacionesContractualesByRutPrincipal='https://webserver.prolinesoftware.cl/pizza/api/trabajadores/?Origin=relaciones-contractuales&RutPrincipal=11.111.111-k';	
$trabajadoresFromRelacionesContractualesByRutPrincipal=callAPI($method, $urlTrabajadoresFromRelacionesContractualesByRutPrincipal, $data);
echo('
	<h2>
		Trabajadores - Origin: RelacionesContractuales
	</h2>
	<div class="endpoint">
		<h3 onclick="viewSrc(\'codeviewerTrabajadoresFromRelacionesContractualesByRutPrincipal\')">
			GET api/trabajadores/{RutPrincipal} <span style="color:grey;">// api/trabajadores/?Origin=relaciones-contractuales&RutPrincipal=11.111.111-k</span>
		</h3>
		<div class="container" id="codeviewerTrabajadoresFromRelacionesContractualesByRutPrincipal">
		</div>
	</div>
');	
	
		//Origin relaciones-contractuales By Relacion
$urlTrabajadoresFromRelacionesContractualesByRelacion='https://webserver.prolinesoftware.cl/pizza/api/trabajadores/?Origin=relaciones-contractuales&RutPrincipal=11.111.111-k&RutContratista=21.111.111-k';	
$trabajadoresFromRelacionesContractualesByRelacion=callAPI($method, $urlTrabajadoresFromRelacionesContractualesByRelacion, $data);
echo('
	<div class="endpoint">
		<h3 onclick="viewSrc(\'codeviewerTrabajadoresFromRelacionesContractualesByRelacion\')">
			GET api/trabajadores/{RutPrincipal}/{RutContratista} <br>
			<span style="color:grey;">// api/trabajadores/?Origin=relaciones-contractuales&RutPrincipal=11.111.111-k&RutContratista=21.111.111-k</span>
		</h3>
		<div class="container" id="codeviewerTrabajadoresFromRelacionesContractualesByRelacion">
		</div>
	</div>
</div>
');	
	
	
	
	
?>
	<script>
	
	function jsonViewer(json, collapsible=false, container) {
    var TEMPLATES = {
        item: '<div class="json__item"><div class="json__key"> > %KEY% </div><div class="json__value json__value--%TYPE%"> %VALUE%</div></div>',
        itemCollapsible: '<label class="json__item json__item--collapsible"><input type="checkbox" class="json__toggle"/><div class="json__key">Z %KEY% </div><div class="json__value json__value--type-%TYPE%"> %VALUE% </div> %CHILDREN% </label>',
        itemCollapsibleOpen: '<br><hr><br><label class="json__item json__item--collapsible"><input type="checkbox" checked class="json__toggle"/><div class="json__key">Y %KEY% </div><div class="json__value json__value--type-%TYPE%">Yv %VALUE% </div>Yc %CHILDREN% </label>'
    };

    function createItem(key, value, type){
        var element = TEMPLATES.item.replace('%KEY%', key);

        if(type == 'string') {
            element = element.replace('%VALUE%', '"' + value + '"');
        } else {
            element = element.replace('%VALUE%', value);
        }

        element = element.replace('%TYPE%', type);

        return element;
    }

    function createCollapsibleItem(key, value, type, children){
        var tpl = 'itemCollapsible';
        
        if(collapsible) {
            tpl = 'itemCollapsibleOpen';
        }
        
        var element = TEMPLATES[tpl].replace('%KEY%', key);

        element = element.replace('%VALUE%', type);
        element = element.replace('%TYPE%', type);
        element = element.replace('%CHILDREN%', children);

        return element;
    }

    function handleChildren(key, value, type) {
        var html = '';

        for(var item in value) { 
            var _key = item,
                _val = value[item];

            html += handleItem(_key, _val);
        }

        return createCollapsibleItem(key, value, type, html);
    }

    function handleItem(key, value) {
        var type = typeof value;

        if(typeof value === 'object') {        
            return handleChildren(key, value, type);
        }

        return createItem(key, value, type);
    }

    function parseObject(obj) {
        _result = '<div class="json"><input type=button value=cerrar onclick="hiddeSrc(\''+container+'\')"/>';

        for(var item in obj) { 
            var key = item,
                value = obj[item];

            _result += handleItem(key, value);
        }

        _result += '<input type=button value=cerrar onclick="hiddeSrc(\''+container+'\')"/></div>';

        return _result;
    }
    
    return parseObject(json);
};


var jsonRelacionesContractuales = <?php echo $relacionesContractuales; ?>;
var jsonRelacionesContractualesByRutPrincipal = <?php echo $relacionesContractualesByRutPrincipal; ?>;
var jsonPrincipalesFromVinculaciones = <?php echo $principalesFromVinculaciones; ?>;
var jsonPrincipalesFromRelaciones = <?php echo $principalesFromRelaciones; ?>;
var jsonPrincipales = <?php echo $principales; ?>;
var jsonContratistasFromRelacionesByRutPrincipal = <?php echo $contratistasFromRelacionesByRutPrincipal; ?>;
var jsonContratistas = <?php echo $contratistas; ?>;
var jsonTrabajadores = <?php echo $trabajadores; ?>;
var jsonTrabajadoresFromRelacionesContractualesByRutPrincipal = <?php echo $trabajadoresFromRelacionesContractualesByRutPrincipal; ?>;
var jsonTrabajadoresFromRelacionesContractualesByRelacion = <?php echo $trabajadoresFromRelacionesContractualesByRelacion; ?>;

var dataRelacionesContractualesByRutPrincipal = document.getElementById('codeviewerRelacionesContractualesByRutPrincipal');
dataRelacionesContractualesByRutPrincipal.innerHTML = jsonViewer(jsonRelacionesContractualesByRutPrincipal, true,'codeviewerRelacionesContractualesByRutPrincipal');

var dataRelacionesContractuales = document.getElementById('codeviewerRelacionesContractuales');
dataRelacionesContractuales.innerHTML = jsonViewer(jsonRelacionesContractuales, true, 'codeviewerRelacionesContractuales');
		
var dataPrincipalesFromVinculaciones = document.getElementById('codeviewerPrincipalesFromVinculaciones');
dataPrincipalesFromVinculaciones.innerHTML = jsonViewer(jsonPrincipalesFromVinculaciones, true, 'codeviewerPrincipalesFromVinculaciones');
		
var dataPrincipalFromRelaciones = document.getElementById('codeviewerPrincipalesFromRelaciones');
dataPrincipalFromRelaciones.innerHTML = jsonViewer(jsonPrincipalesFromRelaciones, true, 'codeviewerPrincipalesFromRelaciones');
		
var dataPrincipal = document.getElementById('codeviewerPrincipales');
dataPrincipal.innerHTML = jsonViewer(jsonPrincipales, true, 'codeviewerPrincipales');

var dataContratistaFromRelacionesByRutPrincipal = document.getElementById('codeviewerContratistasFromRelacionesByRutPrincipal');
dataContratistaFromRelacionesByRutPrincipal.innerHTML = jsonViewer(jsonContratistasFromRelacionesByRutPrincipal, true, 'codeviewerContratistasFromRelacionesByRutPrincipal');
		
var dataContratista = document.getElementById('codeviewerContratistas');
dataContratista.innerHTML = jsonViewer(jsonContratistas, true,'codeviewerContratistas');
	
var dataTrabajador = document.getElementById('codeviewerTrabajadores');
dataTrabajador.innerHTML = jsonViewer(jsonTrabajadores, true,'codeviewerTrabajadores');

var dataTrabajadorFromRelacionesContractualesByRutPrincipal	 = document.getElementById('codeviewerTrabajadoresFromRelacionesContractualesByRutPrincipal');
dataTrabajadorFromRelacionesContractualesByRutPrincipal	.innerHTML = jsonViewer(jsonTrabajadoresFromRelacionesContractualesByRutPrincipal	, true,'codeviewerTrabajadoresFromRelacionesContractualesByRutPrincipal');
		
		
var dataTrabajadorFromRelacionesContractualesByRelacion	 = document.getElementById('codeviewerTrabajadoresFromRelacionesContractualesByRelacion');
dataTrabajadorFromRelacionesContractualesByRelacion	.innerHTML = jsonViewer(jsonTrabajadoresFromRelacionesContractualesByRelacion	, true,'codeviewerTrabajadoresFromRelacionesContractualesByRelacion');		
		
		</script>