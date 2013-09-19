<?php
/**
 * Access from index.php:
 */


class Twitter_Controller extends ZP_Controller {
	
	public function __construct() {
		$this->app("default");
		
		$this->Templates   = $this->core("Templates");
		$this->Twitter_Api = $this->library("twitter", "Twitter", array(CONSUMER_KEY, CONSUMER_SECRET, "108651236-pRYdU6bDQTYanuZxJr6YOu1y2GsBNLZnzQrYpk2Y", "2ozXG5nIQ3cNqrak2K7TpGxiSO2ati7vSJj6GaDhjc"));
	}
	
	public function redirect() {		
		$request_token = $this->Twitter_Api->getRequestToken(OAUTH_CALLBACK);
		
		$_SESSION['oauth_token'] 		= $token = $request_token['oauth_token'];
		$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

		switch($this->Twitter_Api->http_code) {
			case 200:
				/* Build authorize URL and redirect user to Twitter. */
				$url = $this->Twitter_Api->getAuthorizeURL($token);
				header('Location: ' . $url); 
			break;
			default:
				/* Show notification if something went wrong. */
				echo 'Could not connect to Twitter. Refresh the page or try again later.';
				header('Location:' . get("webURL"));
		}
	}
	
	public function getToken() {
		if(isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
			$_SESSION['oauth_status'] = 'oldtoken';
			header('Location:' . get("webURL") . "/auth/twitter");
		}
		
		$access_token = $this->Twitter_Api->getAccessToken($_REQUEST['oauth_verifier']);

		/* Save the access tokens. Normally these would be saved in a database for future use. */
		$_SESSION['access_token'] = $access_token;
		
		/* Remove no longer needed request tokens */
		unset($_SESSION['oauth_token']);
		unset($_SESSION['oauth_token_secret']);

		/* If HTTP response is 200 continue otherwise send to connect page to retry */
		if(200 == $this->Twitter_Api->http_code) {
			/* The user has been verified and the access tokens can be saved for future use */
			$_SESSION['status'] = 'verified';
			return true;
		} else {
			session_destroy();
			/* Save HTTP status for error dialog on connnect page.*/
			header('Location:' . get("webURL") . "/auth/twitter");
		}
	}
	
	public function getUser() {
		/* If method is set change API call made. Test is called by default. */
		$content = $this->Twitter_Api->get('account/verify_credentials');
		
		if($content & isset($content->name)) {
			$user["email"]     = "";
			$user["name"]      = $content->name;
			$user["type"]      = "twitter";
			$user["image_url"] = str_replace("normal", "bigger", $content->profile_image_url);
			$user["url"]       = "http://twitter.com/" .  $content->screen_name;
			$user["id_user"]   = $content->id;
			
			return $user;
		}
		
		return false;
	}
	
	public function get($query = "#manuel") {
		$parameters = array('q' => '#manuel pic.twitter.com', 'geocode' => '23.28171917560003,-108.45703125,100mi');
		$danger     = $this->Twitter_Api->get('search/tweets', $parameters);
		
		$parameters = array('q' => '#manuel pic.twitter.com', 'geocode' => '25.79309078253729,-108.99261474609375,100mi');
		$mochis     = $this->Twitter_Api->get('search/tweets', $parameters);
		
		$parameters = array('q' => '#manuel pic.twitter.com', 'geocode' => '24.802318262910543,-107.39479064941406,100mi');
		$culiacan   = $this->Twitter_Api->get('search/tweets', $parameters);
		
		$parameters = array('q' => '#manuel pic.twitter.com', 'geocode' => '24.141740980504334,-110.31166076660156,100mi');
		$lapaz      = $this->Twitter_Api->get('search/tweets', $parameters);
		
		
		foreach($danger->statuses as $status) {
			$parameters = array('id' => $status->id_str);
			$tweet	    = $this->Twitter_Api->get('statuses/show', $parameters);
			
			$data["danger"][] = array(
				"text"  => $tweet->text,
				"name"  => $tweet->user->name,
				"image" => $tweet->entities->media[0]->media_url
			);
		}
		
		foreach($mochis->statuses as $status) {
			$parameters = array('id' => $status->id_str);
			$tweet	    = $this->Twitter_Api->get('statuses/show', $parameters);
			
			$data["mochis"][] = array(
				"text"  => $tweet->text,
				"name"  => $tweet->user->name,
				"image" => $tweet->entities->media[0]->media_url
			);
		}
		
		foreach($culiacan->statuses as $status) {
			$parameters = array('id' => $status->id_str);
			$tweet	    = $this->Twitter_Api->get('statuses/show', $parameters);
			
			$data["culiacan"][] = array(
				"text"  => $tweet->text,
				"name"  => $tweet->user->name,
				"image" => $tweet->entities->media[0]->media_url
			);
		}
		
		foreach($lapaz->statuses as $status) {
			$parameters = array('id' => $status->id_str);
			$tweet	    = $this->Twitter_Api->get('statuses/show', $parameters);
			
			$data["lapaz"][] = array(
				"text"  => $tweet->text,
				"name"  => $tweet->user->name,
				"image" => $tweet->entities->media[0]->media_url
			);
		}
		
		
		return $data;
	}
}
