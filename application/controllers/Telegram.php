<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Telegram extends REST_Controller {	

	public function send(){
		
		$this->get('https://api.telegram.org/bot348103823:AAHFZlpeEOXhAwZvnMJl-kHxZTr4umokb-s/getUpdates');

	}

}