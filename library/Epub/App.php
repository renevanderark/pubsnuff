<?php
require_once 'Epub/API.php';

class Epub_App extends Epub_API {

	public function Epub_App($route, $getParams = array(), $pubdir = ".") {
		$this->_pubdir = $pubdir;
		$this->_params = $getParams;
		$this->_initPaths($route);
	}

	public function startAction() {
		$handle = opendir($this->_pubdir);
		while (false !== ($entry = readdir($handle))) {
			if($entry === '.' || $entry === '..') { continue; }
			echo "<a href=\"/show/$entry\">$entry</a><br>";
		}
	}

	public function showAction() {
		$this->_initReader();
		$toc = $this->tocAction();
		$epub = $this->_epubFile;
		require_once("views/show.phtml");
		die();
	}
}
