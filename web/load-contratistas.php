
<!--div id="results"></div-->
<script>

function getContratistas() {
            const baseURL = "https://webserver.prolinesoftware.cl/pizza/api/contratistas/?Origin=vinculaciones&idNivel=<?php echo $_GET["idNivel"];?>"
            
            var html; // this variable will hold the HTML with the project list
            //document.getElementById("results").innerHTML = "Cargando datos..."
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var jsonData = JSON.parse(xhttp.responseText); // Converts the response in a JSON object
									
									html="";
									console.log(jsonData);
                    if (jsonData["items"].length == 0) { document.getElementById("results").innerHTML = "No se encontraron registros" }
                    else {
											
											// creating table
											let results = document.getElementById('results');
											results.innerHTML="";
                        	//let table = document.createElement('table');
													//let thead = document.createElement('thead');
													//let tbody = document.createElement('tbody');

													/*/ Creating and adding data to first row of the table
														let row_1 = document.createElement('tr');
														let heading_1 = document.createElement('th');
														heading_1.innerHTML = "Sr. No.";
														let heading_2 = document.createElement('th');
														heading_2.innerHTML = "Name";
														let heading_3 = document.createElement('th');
														heading_3.innerHTML = "Company";

														row_1.appendChild(heading_1);
														row_1.appendChild(heading_2);
														row_1.appendChild(heading_3);
														thead.appendChild(row_1);
														*/
                        for (p = 0; p < jsonData["items"].length; p++) {
													var countTrabajadores = jsonData["items"][p].countTrabajadores;
													var Auditores = jsonData["items"][p].Auditores;
													var Estado = jsonData["items"][p].Estado;
													var Verificacion = jsonData["items"][p].Verificacion;
													
														// Creating and adding data to second row of the table
														let row_2 = document.createElement('tr');
														let row_2_data_1 = document.createElement('td');
														row_2_data_1.innerHTML = jsonData["items"][p].Razon+'<br><span>'+jsonData["items"][p].Rut+'</span>';
																									
														let row_2_data_2 = document.createElement('td');
														row_2_data_2.innerHTML = countTrabajadores;
																											
														let row_2_data_4 = document.createElement('td');
														let row_2_data_3 = document.createElement('td');
														let row_2_data_5 = document.createElement('td');
													var ThisAsignacion=0;
													var ThisPausa=2;
													var ThisEstado=7;
													if(jsonData["items"][p].Asignacion!=null){
															///// ESTADO from asignaciones  //////
															
															
															
															for(as=0;as<jsonData["items"][p].Asignacion.length;as++){
																ThisPausa=jsonData["items"][p].Asignacion[as].Pausa;
																ThisAsignacion=jsonData["items"][p].Asignacion[as].idAsignacion;
																switch(true){
																	case(as==0&&jsonData["items"][p].Asignacion[as].Estado==1):
																	 // auditor actual
																		ThisEstado=1;	
																		
																		
																		row_2_data_5.innerHTML = "Asignado a <br><h4>"+jsonData["items"][p].Asignacion[as].Auditor+"</h4>";
																		let row_2_data_4_0 = document.createElement('span');
																		row_2_data_4_0.innerHTML='<br><input type="button" value="Desasignar" onclick="DesAsignarPvcAuditor('+jsonData["items"][p].Asignacion[as].idAsignacion +');"/>';
																		row_2_data_4.appendChild(row_2_data_4_0);
																		
																	break;
																	case(as==0&&jsonData["items"][p].Asignacion[as].Estado==0):
																	// sin auditor 
																		
																		ThisEstado=0;
																	
																	break;
																}
																let row_2_data_3_0 = document.createElement('span');
																		row_2_data_3_0.innerHTML=jsonData["items"][p].Asignacion[as].Auditor + '<br>';
																		row_2_data_3.appendChild(row_2_data_3_0);
															}


															/////////////////////////////////////
																// asignaciones
																let row_2_data_4_0;
																if(ThisEstado==0){
																
																	row_2_data_4_0 = document.createElement('select');
																	row_2_data_4_0.id='auditores'+jsonData["items"][p].idVinculacion;
																	//for lista auditores
																	for (a = 0; a < jsonData["meta"]["auditores"].length; a++) {
																		let row_2_data_4_0_0 = document.createElement('option');
																		row_2_data_4_0_0.value=jsonData["meta"]["auditores"][a].idAuditor;
																		row_2_data_4_0_0.innerHTML = jsonData["meta"]["auditores"][a].Nombre;
																		row_2_data_4_0.appendChild(row_2_data_4_0_0);
																	}
																	let row_2_data_4_1 = document.createElement('span');
																		row_2_data_4_1.innerHTML='<br><input type="button" value="Asignar" onclick="AsignarPvcAuditor('+jsonData["items"][p].idVinculacion+');"/>';
																	row_2_data_4.appendChild(row_2_data_4_0);
																	row_2_data_4.appendChild(row_2_data_4_1);	
																	
																	
																	row_2_data_5.innerHTML = "Sin Asignar";
																}
																
															/// fin asignacion
														//////////////////////////////////7
														//row_2_data_5.innerHTML='Sin Asignar';
													
													}
													else{
														
														row_2_data_4_0 = document.createElement('select');
														row_2_data_4_0.id='auditores'+jsonData["items"][p].idVinculacion;
														//for lista auditores
														for (a = 0; a < jsonData["meta"]["auditores"].length; a++) {
															let row_2_data_4_0_0 = document.createElement('option');
															row_2_data_4_0_0.value=jsonData["meta"]["auditores"][a].idAuditor;
															row_2_data_4_0_0.innerHTML = jsonData["meta"]["auditores"][a].Nombre;
															row_2_data_4_0.appendChild(row_2_data_4_0_0);
														}
														let row_2_data_4_1 = document.createElement('span');
															row_2_data_4_1.innerHTML='<br><input type="button" value="Asignar" onclick="AsignarPvcAuditor('+jsonData["items"][p].idVinculacion+');"/>';
														row_2_data_4.appendChild(row_2_data_4_0);
														row_2_data_4.appendChild(row_2_data_4_1);	
														row_2_data_3.innerHTML='Nunca Auditado';
														row_2_data_5.innerHTML='Sin Asignar';
													}
													
													
														let row_2_data_6 = document.createElement('td');
														let desactivado;
														if(jsonData["items"][p]["Dotacion"].length==0){desactivado="disabled";}else{desactivado="";}
														row_2_data_6.innerHTML='<input class="'+desactivado+'" type="button" value="Ver Dotacion" onclick="verDotacion(\''+ jsonData["items"][p].idContratista+'\');" '+desactivado+'/>';
													
														//================================================================//
														// VERIFICACION ACTIVA / PAUSADA
														let row_2_data_7;
														row_2_data_7 = document.createElement('td');
													
														//<span class="verif-pausada">Verificacion<br>Pausada</span>
														switch(ThisPausa){
																case("0"):
																	row_2_data_7.innerHTML='En Curso ...<br><input title="pausar asignacion '+ThisAsignacion+'" onclick="PausarVerificacion('+ThisAsignacion+');" type="button" value="Pausar"/>'
																break;
																
																case("1"):
																	row_2_data_7.innerHTML='PAUSADA<br><input title="Reactivar verificacion '+ThisAsignacion+'" onclick="ReactivarVerificacion('+ThisAsignacion+');" type="button" value="Reactivar">';
																break;
																case(2):
																	row_2_data_7.innerHTML='Pendiente';
																break;
																default :
																row_2_data_7.innerHTML='#'+ThisPausa+'#';
																break;
														}
														
													
													row_2.appendChild(row_2_data_1);
													row_2.appendChild(row_2_data_2);
													row_2.appendChild(row_2_data_3);
													row_2.appendChild(row_2_data_4);
													row_2.appendChild(row_2_data_5);
													row_2.appendChild(row_2_data_6);
													
													row_2.appendChild(row_2_data_7);
													
													let row_3 =document.createElement('div');
														row_3.id='dotacion'+jsonData["items"][p].idContratista;
														row_3.className="dotacion";

															
															
															let row_3_0_1 =document.createElement('table');
																	row_3_0_1.style.width="100%";
																let row_3_0_1_0 =document.createElement('thead');
													
																let title_tr =document.createElement('tr');
																let title_td =document.createElement('td');
																title_td.colSpan=2;
																let title_h =document.createElement('h2');
																title_h.innerHTML='Dotacion de Trabajadores '+ jsonData["items"][p].Razon;
																title_td.appendChild(title_h);
																title_tr.appendChild(title_td);
																row_3_0_1_0.appendChild(title_tr);
													
																	let row_3_0_1_0_0 =document.createElement('tr');
																		let row_3_0_1_0_0_0 =document.createElement('th');
																		row_3_0_1_0_0_0.innerHTML='Trabajador';
																		let row_3_0_1_0_0_1 =document.createElement('th');
																		row_3_0_1_0_0_1.innerHTML='Rut';
													
																		row_3_0_1_0_0.appendChild(row_3_0_1_0_0_0);
																		row_3_0_1_0_0.appendChild(row_3_0_1_0_0_1);
																	row_3_0_1_0.appendChild(row_3_0_1_0_0);
													
																let row_3_0_1_1 =document.createElement('tbody');
													for (d = 0; d < jsonData["items"][p]["Dotacion"].length; d++) {
																	let row_3_0_1_1_0 =document.createElement('tr');
													
																		let row_3_0_1_1_0_0 =document.createElement('td');
																		row_3_0_1_1_0_0.innerHTML=jsonData["items"][p]["Dotacion"][d].Nombre+" "+jsonData["items"][p]["Dotacion"][d].Apellido+" "+jsonData["items"][p]["Dotacion"][d].ApellidoMat;
																		let row_3_0_1_1_0_1 =document.createElement('td');
																		row_3_0_1_1_0_1.innerHTML=jsonData["items"][p]["Dotacion"][d].Rut;
													
																		row_3_0_1_1_0.appendChild(row_3_0_1_1_0_0);
																		row_3_0_1_1_0.appendChild(row_3_0_1_1_0_1);
													
																	row_3_0_1_1.appendChild(row_3_0_1_1_0);
													}
																		
													
															row_3_0_1.appendChild(row_3_0_1_0);
															row_3_0_1.appendChild(row_3_0_1_1);	
															row_3.appendChild(row_3_0_1);
													
													
													let row_3_1 =document.createElement('div');
													row_3_1.innerHTML='<input value="Cerrar" type="button" onclick="cerrarDotacion(\''+ jsonData["items"][p].idContratista+'\');">';
													
													row_3.appendChild(row_3_1);
	
						

														results.appendChild(row_2);
														results.appendChild(row_3);

												
                        }

                        
                    }
                }
                else if (this.readyState == 4 && this.status != 200) {
                    document.getElementById("results").innerHTML = "Sorry, couldn't get your projects :/ "
                    
                }
            };
            /*xhttp.open("GET", baseURL + environment + encodeURI('/projects/' + parametros), true);*/
            xhttp.open("GET", baseURL, true);
						/*console.log("Token: " + token);
            xhttp.setRequestHeader("Token", token);
            */
						console.log("ps");
						console.log(xhttp);
            xhttp.send();
        }
	
	
	function AsignarPvcAuditor(idVinculacion) {
            const url = "https://webserver.prolinesoftware.cl/pizza/api/asignaciones/";
						var data = new FormData();
						var idAuditor = document.getElementById("auditores"+idVinculacion).value;
						data.append('idAuditor', idAuditor);
						data.append('idVinculacion', idVinculacion);
						var xhr = new XMLHttpRequest();
						xhr.open('POST', url, true);
						xhr.onload = function () {
								// do something to response
								console.log(this.responseText);
						};
						xhr.send(data);
						getContratistas();
	}
	function DesAsignarPvcAuditor(idAsignacion){
            const url = "https://webserver.prolinesoftware.cl/pizza/api/asignaciones/";
						var data = new FormData();
						data.append('idAsignacion', idAsignacion);
						var xhr = new XMLHttpRequest();
						xhr.open('POST', url, true);
						xhr.onload = function () {
								// do something to response
								console.log(this.responseText);
						};
						xhr.send(data);
						getContratistas();
	}
	function PausarVerificacion(idAsignacion){
            const url = "https://webserver.prolinesoftware.cl/pizza/api/asignaciones/";
						var data = new FormData();
						data.append('idAsignacion', idAsignacion);
						data.append('Pausa', "1");
						var xhr = new XMLHttpRequest();
						xhr.open('POST', url, true);
						xhr.onload = function () {
								// do something to response
								console.log(this.responseText);
						};
						xhr.send(data);
						getContratistas();
	}
		function ReactivarVerificacion(idAsignacion){
            const url = "https://webserver.prolinesoftware.cl/pizza/api/asignaciones/";
						var data = new FormData();
						data.append('idAsignacion', idAsignacion);
						data.append('Pausa', "0");
						var xhr = new XMLHttpRequest();
						xhr.open('POST', url, true);
						xhr.onload = function () {
								// do something to response
								console.log(this.responseText);
						};
						xhr.send(data);
						getContratistas();
	}
	
	getContratistas();
</script>