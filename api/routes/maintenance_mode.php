<?php defined('C5_EXECUTE') or die('Access Denied');

class MaintenanceModeApiRouteController extends ApiRouteController {

	public function run() {
		switch (API_REQUEST_METHOD) {
			case 'GET':
				return Config::get('SITE_MAINTENANCE_MODE');
			
			default: //BAD REQUEST
				$this->setCode(405);
				$this->respond(array('error' => 'Method Not Allowed'));
		}
	}
}