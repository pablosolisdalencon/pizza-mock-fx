<style>
	#menu{
		width:200px;
		height:100%;
		background-color:#fff;
		border-right:1px solid #ccc;
		position:fixed;
		left:0;
		top:0;
		padding-top:150px;
		color:white;
		
	}
	#menu nav ul{
		padding:0;
		margin:0;
	}
	#menu nav ul li{
		cursor:pointer;
		margin:2px;		
		padding:10px;
		background-color:#fff;
		color:#555;
		font-family:helvetica;
		
		list-style:none;
	}
	#menu nav ul li:hover{background-color:#e5e7eb;border-radius:4px;}
	#menu nav ul li svg{
		width:20px !important;
		height:20px !important;
	}
</style>
<div id="menu">
	<nav>
		<ul>
			<li onclick="location.href='./?inc=listado_principales.php';">
				<svg class=" text-gray-500  mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3"></path>
            </svg>
				Asignaciones
			</li>
			<!--li>
				Usuarios / Roles
			</li-->
			<li>
			<svg class=" text-gray-400 group-hover:text-gray-500  mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
            </svg>
				Auditorias
			</li>
			<li onclick="location.href='./?inc=pactados.php';">
			<svg class=" text-gray-400 group-hover:text-gray-500  mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12"></path>
            </svg>
				Pactados
			</li>
		</ul>
	</nav>
</div>