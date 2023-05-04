
<!--div id="results"></div-->
<script>

function getPrincipales() {
            const baseURL = "https://webserver.prolinesoftware.cl/pizza/api/principales/?Origin=vinculaciones"
            
            var html; // this variable will hold the HTML with the project list
            document.getElementById("results").innerHTML = "Cargando datos..."
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var jsonData = JSON.parse(xhttp.responseText); // Converts the response in a JSON object
									
									
									console.log(jsonData);
                    if (jsonData["items"].length == 0) { document.getElementById("results").innerHTML = "No se encontraron registros" }
                    else {
                        html = "";
                        for (p = 0; p < jsonData["items"].length; p++) {	
													
														html = html + '<tr><td><span class="razon">'+ jsonData["items"][p].Razon +'</span><br>'+ jsonData["items"][p].Principal +'<br>'+ jsonData["items"][p].Rut +'</td><td>'+jsonData["items"][p].countContratistas+'</td><td>'+jsonData["items"][p].countTrabajadores+'</td><td>'+jsonData["items"][p].countContratistasAsignados+'/'+jsonData["items"][p].countContratistasNoAsignados+'</td><td><input title="'+ jsonData["items"][p].idNivel +'" type="button" value="IR" onclick="location.href=\'./?inc=listado_contratistas.php&idNivel='+ jsonData["items"][p].idNivel+'\';"/></td></tr>';

                        }

                        document.getElementById("results").innerHTML =html;
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
	getPrincipales() 
</script>