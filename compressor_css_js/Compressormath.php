<?php
/*
https://ourcodeworld.com/articles/read/350/how-to-minify-javascript-and-css-using-php
https://github.com/matthiasmullie/minify
https://github.com/matthiasmullie/path-converter
@matthiasmullie
*/
require_once 'minify/src/Minify.php';
require_once 'minify/src/CSS.php';
require_once 'minify/src/JS.php';
require_once 'minify/src/Exception.php';
require_once 'minify/src/Exceptions/BasicException.php';
require_once 'minify/src/Exceptions/FileImportException.php';
require_once 'minify/src/Exceptions/IOException.php';
require_once 'path-converter/src/ConverterInterface.php';
require_once 'path-converter/src/Converter.php';

use MatthiasMullie\Minify;

class Minifymulliecss{
	private $minifier;

	public function __construct(){
		$this->minifier = new Minify\CSS();
	}

	public function addFile($file){
		$this->minifier->add($file);
	}

	public function minify(){
		return $this->minifier->minify();
	}
}

class Minifymulliejs{
	private $minifier;

	public function __construct(){
		$this->minifier = new Minify\JS();
	}

	public function addFile($file){
		$this->minifier->add($file);
	}

	public function minify(){
		return $this->minifier->minify();
	}
}

?>