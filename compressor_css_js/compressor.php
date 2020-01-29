<?php

	class Minifycss{
		public function __construct(){}
		//reference from: https://cssminifier.com/php
		public function compress($urlIn, $filenameIn){

			echo '<br/>entra en el metodo de compresion';
			echo '<br/>Url: ';
			echo $urlIn;
			echo '<br/>Archivo:';
			echo $filenameIn;

			//$url = $urlIn;
			$url = 'https://cssminifier.com/raw';
		    $css = "";//file_get_contents($url.$filenameIn);

			//https://www.itam.mx/sites/all/themes/coursat/js/custom.js
		    //if ($stream = fopen($url.$filenameIn, 'r')) {
		    if ($stream = fopen('https://www.itam.mx/sites/all/themes/coursat/css/style.css', 'r')) {
			    // imprimir toda la página empezando por el índice 10
			    $css =  stream_get_contents($stream, -1, 1);

			    fclose($stream);
			}

			echo '<br/><b>Css file: </b><br/>';
			//echo $css;
			echo '<br/><b>FIN Css file: </b><br/>';

		    // init the request, set various options, and send it
		    $ch = curl_init();
		    curl_setopt_array($ch, [
		        CURLOPT_URL => $url,
		        CURLOPT_RETURNTRANSFER => true,
		        CURLOPT_POST => true,
		        CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
		        CURLOPT_POSTFIELDS => http_build_query([ "input" => $css ])
		    ]);
		    

		    $minified = curl_exec($ch);

		    // finally, close the request
		    curl_close($ch);

		    //var_dump($minified);
		    // output the $minified css
		    echo '<br>resultado del minify:<br/>';
		    //echo $minified;
		    echo '<br><b>FIN</b>resultado del minify:<br/>';

		}

	}
?>