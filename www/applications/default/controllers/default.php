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
	
	public function index22() {
		$tweets = $this->Twitter_Controller->get();
		
		$vars["tweets"] = $tweets;
		$vars["view"]   = $this->view("home_backdoor", true);
		$this->render("content", $vars);
	}
}
