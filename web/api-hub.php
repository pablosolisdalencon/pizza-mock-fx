<!-- 
** Basic example on using ITM Platform API methods.
** Used for illustrations purposes only. 
** TIP: If you need to test it from your local computer, you will get a CORS error
** to bypass it for *testing purposes only*, run Chrome disaling web security 
"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" --disable-web-security --user-data-dir=c:\folder-where-your-html-file-is
-->

<html>
<head>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color:#333">
    <div id="login" style="border-style: solid; border-color: #333; border-width: 2px; border-radius: 3px; padding: 10px; width:600px;">
        <p>Please enter your ITM Platform's credentials</p>
        Company's environment: <br/>
        <input type="text" id="environment" size="35" placeholder="after https://app.itmplatform.com/XXX" onkeyup="showURL(this.value)">
        <br> <span id="url" style="font-size: 0.8em"></span>
        <br/><br/> Your user name:<br/>
        <input type="text" id="email" size="35"placeholder="your email address">
        <br/> <br/>Password:<br/>
        <input type="password" id="password" size="35" placeholder="your email address">
        <br/>
        <input type="button" value="Go get my projects!" style="margin:20px" onclick="">
    </div>
    <div id="results"></div>
    <script>
        function CallApi(endpoint, params) {
            // Check for credentials
            if (endpoint == undefined || params == undefined ) {
                document.getElementById("results").innerHTML = "Please fill in all fields"
                throw ("Can't login without credentials")
            }
            // we start by loggin in
            document.getElementById("results").innerHTML = "Logging in..."
            const baseURL = "https://webserver.prolinesoftware.cl/pizza/api/"
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) { //If the responde is okay
                    var token = JSON.parse(xhttp.responseText);
                    //Now let's get the projects for the user
                    getPrincipales(token["Token"], endpoint,params);
                }
                else if (this.readyState == 4) { // if anything went wrong
                    document.getElementById("results").innerHTML = "Sorry, couldn't log in. Check your credentials :/ "
                }
            };
						var parametros="?"+params[0]["name"]+"="+params[0]["value"]+"&"+params[0]["name"]+"="+params[1]["value"];	
            xhttp.open("GET", baseURL + endpoint +'/'+parametros, true);
            try {
                xhttp.send();
            }
            catch (e) { throw e }
        }
        function getProjects(token, environment) {
            const baseURL = "https://webserver.prolinesoftware.cl/pizza/api/"
            const myProjects = '?URL=UserPages/MyProjects.aspx' // this is used to get "My Projects" (.../projects/?UserPages/MyProjects.aspx)
            var html; // this variable will hold the HTML with the project list
            document.getElementById("results").innerHTML = "Retrieving your projects..."
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var myProjects = JSON.parse(xhttp.responseText); // Converts the response in a JSON object
                    if (myProjects.length == 0) { document.getElementById("results").innerHTML = "You have no porjects assigned" }
                    else {
                        html = "These are the projects you are assigned to: <br><ul>";
                        for (p = 0; p < myProjects.length; p++) {
                            html = html + "<li>" + myProjects[p].ProjectName + "</li>"                            
                        }
                        html = html + "</ul>"
                        document.getElementById("results").innerHTML =html;
                    }
                }
                else if (this.readyState == 4 && this.status != 200) {
                    document.getElementById("results").innerHTML = "Sorry, couldn't get your projects :/ "
                    console.log(xhttp);
                }
            };
            xhttp.open("GET", baseURL + environment + encodeURI('/projects/' + myProjects), true);
            console.log("Token: " + token);
            xhttp.setRequestHeader("Token", token);
            console.log(xhttp);
            xhttp.send();
        }
        
        // This just shows the URL as the user types
        function showURL(value){
            document.getElementById("url").innerHTML="https://webserver.prolinesoftware.cl/pizza/api/" + value;
        }
			
			
			
			
			
			var principales = array();
			principales[0]["name"]="RurPrincipal";
			principales[0]["value"]="11.111.111-k";
			principales[1]["name"]="Origin";
			principales[1]["value"]="relaciones-contractuales";
				CallApi("principales", principales);
    </script>
</body>
</html>

<script>	
	
	
	
	
	/*var parametros="?"+params[0]["name"]+"="+params[0]["value"]+"&"+params[0]["name"]+"="+params[1]["value"];	
		var baseURL = "https://webserver.prolinesoftware.cl/pizza/api/";
	var endpoint = "principales";
	var parametros ="?Origin=relaciones-contractuales"
		public xhttp = new XMLHttpRequest();
		xhttp.open("GET", baseURL + endpoint + '/' + parametros true);
		xhttp.send();	
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) { //If the responde is okay
			
			var response = JSON.parse(xhttp.responseText);
			console.log(response)
		}
	};

	function CallApi(endpoint,params){
		
		params.forEach(element => console.log(element));
		var parametros="?"+params[0]["name"]+"="+params[0]["value"]+"&"+params[0]["name"]+"="+params[1]["value"];
		var baseURL = "https://webserver.prolinesoftware.cl/pizza/";
		public xhttp = new XMLHttpRequest();
		xhttp.open("GET", baseURL + endpoint + '/' + parametros true);
		xhttp.send();	
	}
	
	var principales = array();
	principales[0]["name"]="RurPrincipal";
	principales[0]["value"]="11.111.111-k";
	principales[1]["name"]="Origin";
	principales[1]["value"]="relaciones-contractuales";

	xhttp.onreadystatechange = function (endpoint,params) {
		if (this.readyState == 4 && this.status == 200) { //If the responde is okay
			
			var response = JSON.parse(xhttp.responseText);
			//Now let's get the projects for the user
			getProjects(token["Token"], environment);
		}
	};
	
	

CallApi("principales",principales());
	
	
function getPrincipales(endpoint, params) {
            const baseURL = "https://api.itmplatform.com/"
           	var parametros="?"+params[0]["name"]+"="+params[0]["value"]+"&"+params[0]["name"]+"="+params[1]["value"];
            var html; // this variable will hold the HTML with the project list
            document.getElementById("results").innerHTML = "Cargando Principales..."
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var myPrincipales = JSON.parse(xhttp.responseText); // Converts the response in a JSON object
                    if (myPrincipales.length == 0) { document.getElementById("results").innerHTML = "You have no principales to audit" }
                    else {
                        html = "These are the projects you are assigned to: <br><ul>";
                        for (p = 0; p < myPrincipales.length; p++) {
                            html = html + "<li>" + myPrincipales[p].ProjectName + "</li>"                            
                        }
                        html = html + "</ul>"
                        document.getElementById("results").innerHTML =html;
                    }
                }
                else if (this.readyState == 4 && this.status != 200) {
                    document.getElementById("results").innerHTML = "Sorry, couldn't get your projects :/ "
                    console.log(xhttp);
                }
            };
            xhttp.open("GET", baseURL + environment + encodeURI('/projects/' + myProjects), true);
            console.log("Token: " + token);
            xhttp.setRequestHeader("Token", token);
            console.log(xhttp);
            xhttp.send();
}	
	
	
	
	*/
</script>