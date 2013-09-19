<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Default_Controller extends ZP_Controller {
	
	public function __construct() {
		$this->app("default");
		
		$this->Templates     	  = $this->core("Templates");
		$this->Twitter_Controller = $this->controller("Twitter_Controller");
		
		$this->Templates->theme();
	}
	
	public function index2() {
		$vars["view"]   = $this->view("home", true);
		$this->render("content", $vars);
	}
	
	public function index() {
		$tweets = $this->Twitter_Controller->get();
		
		echo "var geoJson = [";
			foreach($tweets as $key => $value) {
				echo "{";
					echo "type: 'Feature',";
					echo '"geometry": { "type": "Point", "coordinates": [' . $value["point"]["lon"] . ', '. $value["point"]["lat"] . ']},';
					echo '"properties": {';
						echo "'title': '" . $value["point"]["name"] . "',";
						echo "'images': [";
							foreach($value["tweets"] as $tweet) {
								echo "['" . $tweet["image"] . "','" . preg_replace(array("(\r\n)", "(\n\r)", "(\n)", "(\r)"), "", utf8_decode($tweet["text"])) . "','" . $tweet["id"]. "'],";
							}
						echo "]";
					echo "}";
				echo "},";
			}
		echo "];";
	}
}
