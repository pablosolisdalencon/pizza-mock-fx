<style>
	body{background-color:#fff;font-size:2vmin;}
	#main{
		font-family:helvetica;
		padding-top:100px;
		margin-left:210px;
		padding-bottom:100px;
	}
	#main table{
		width:100%;
		font-family:helvetica;
		text-align:center;
		color:#333;
		border:1px solid #dee2e6;
		font-size:1.7vmin;
		
		border-spacing: 0px;
    border-collapse: none;
	}
	#main h2{
		color:#777;
	}
	#main table thead{
		color:#333;
		background-color:white;
		
	}
	#main table thead tr th,#main table tbody tr td{
		margin:0
	}
	#main table thead th{padding:3px;}
	#main table tbody tr{
		background-color:#dee2e6;
	}
		#main table tbody tr:hover{
		background-color:whitesmoke;
	}
	#main table tbody tr td{padding:7px;}
	.razon{font-weight:bolder;}
	
	.boton, #main table tbody input[type=button]{
		    -webkit-text-size-adjust: 100%;
    font-feature-settings: normal;
    tab-size: 4;
    -webkit-font-smoothing: antialiased;
    --tw-space-y-reverse: 0;
    border-collapse: collapse;
    --tw-divide-y-reverse: 0;
    border: 0 solid #e5e7eb;
    box-sizing: border-box;
    --tw-border-spacing-x: 0;
    --tw-border-spacing-y: 0;
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    --tw-scale-x: 1;
    --tw-scale-y: 1;
    --tw-pan-x: ;
    --tw-pan-y: ;
    --tw-pinch-zoom: ;
    --tw-scroll-snap-strictness: proximity;
    --tw-ordinal: ;
    --tw-slashed-zero: ;
    --tw-numeric-figure: ;
    --tw-numeric-spacing: ;
    --tw-numeric-fraction: ;
    --tw-ring-inset: ;
    --tw-ring-offset-width: 0px;
    --tw-ring-offset-color: #fff;
    --tw-ring-color: rgba(59,130,246,.5);
    --tw-ring-offset-shadow: 0 0 #0000;
    --tw-ring-shadow: 0 0 #0000;
    --tw-shadow: 0 0 #0000;
    --tw-shadow-colored: 0 0 #0000;
    --tw-blur: ;
    --tw-brightness: ;
    --tw-contrast: ;
    --tw-grayscale: ;
    --tw-hue-rotate: ;
    --tw-invert: ;
    --tw-saturate: ;
    --tw-sepia: ;
    --tw-drop-shadow: ;
    --tw-backdrop-blur: ;
    --tw-backdrop-brightness: ;
    --tw-backdrop-contrast: ;
    --tw-backdrop-grayscale: ;
    --tw-backdrop-hue-rotate: ;
    --tw-backdrop-invert: ;
    --tw-backdrop-opacity: ;
    --tw-backdrop-saturate: ;
    --tw-backdrop-sepia: ;
    font-family: inherit;
    margin: 0;
    text-transform: none;
    cursor: pointer;
    -webkit-appearance: button;
    background-image: none;
    border-radius: .375rem;
    border-width: 1px;
    --tw-border-opacity: 1;
    border-color:#3490dc;
    padding-left: 1rem;
    padding-right: 1rem;
    padding-bottom: .5rem;
    padding-top: .5rem;
    font-size: .875rem;
    font-weight: 500;
    line-height: 1.25rem;
    --tw-text-opacity: 1;
    color: rgb(255 255 255/var(--tw-text-opacity));
    transition-property: color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;
    transition-duration: .15s;
    transition-timing-function: cubic-bezier(.4,0,.2,1);
    --tw-bg-opacity: 1;
    background-color: #3490dc;
	}
	
	#main table tbody select{
		    -webkit-text-size-adjust: 100%;
    font-feature-settings: normal;
    tab-size: 4;
    -webkit-font-smoothing: antialiased;
    --tw-bg-opacity: 1;
    --tw-space-x-reverse: 0;
    border: 0 solid #e5e7eb;
    box-sizing: border-box;
    --tw-border-spacing-x: 0;
    --tw-border-spacing-y: 0;
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    --tw-scale-x: 1;
    --tw-scale-y: 1;
    --tw-pan-x: ;
    --tw-pan-y: ;
    --tw-pinch-zoom: ;
    --tw-scroll-snap-strictness: proximity;
    --tw-ordinal: ;
    --tw-slashed-zero: ;
    --tw-numeric-figure: ;
    --tw-numeric-spacing: ;
    --tw-numeric-fraction: ;
    --tw-ring-inset: ;
    --tw-ring-offset-width: 0px;
    --tw-ring-offset-color: #fff;
    --tw-ring-color: rgba(59,130,246,.5);
    --tw-ring-offset-shadow: 0 0 #0000;
    --tw-ring-shadow: 0 0 #0000;
    --tw-shadow-colored: 0 0 #0000;
    --tw-blur: ;
    --tw-brightness: ;
    --tw-contrast: ;
    --tw-grayscale: ;
    --tw-hue-rotate: ;
    --tw-invert: ;
    --tw-saturate: ;
    --tw-sepia: ;
    --tw-drop-shadow: ;
    --tw-backdrop-blur: ;
    --tw-backdrop-brightness: ;
    --tw-backdrop-contrast: ;
    --tw-backdrop-grayscale: ;
    --tw-backdrop-hue-rotate: ;
    --tw-backdrop-invert: ;
    --tw-backdrop-opacity: ;
    --tw-backdrop-saturate: ;
    --tw-backdrop-sepia: ;
    color: inherit;
    font-family: inherit;
    font-weight: inherit;
    margin: 0;
    text-transform: none;
    --tw-shadow: 0 0 #0000;
    appearance: none;
    background-color: #fff;
    border-width: 1px;
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3E%3C/svg%3E");
    background-position: right .5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    -webkit-print-color-adjust: exact;
    display: block;
    width: 100%;
    border-radius: .375rem;
    --tw-border-opacity: 1;
    border-color: rgb(209 213 219/var(--tw-border-opacity));
    padding-bottom: .5rem;
    padding-top: .5rem;
    padding-left: .75rem;
    padding-right: 2.5rem;
    font-size: .875rem;
    line-height: 1.25rem;
	}
	
</style>


<div id="main">
	
<?php
include "asignaciones.php";
?>
	
</div>
