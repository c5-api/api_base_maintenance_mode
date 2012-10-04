<?php defined('C5_EXECUTE') or die('Access Denied');

class MaintenanceModeApiRouteController extends ApiRouteController {

	public function run() {
		switch (API_REQUEST_METHOD) {
			case 'POST':
				if($_POST['enabled']) {
					Config::save('SITE_MAINTENANCE_MODE', true);
					$this->setCode(201);
					$this->respond();
				} else if($_POST['enabled'] == 0) {
					Config::save('SITE_MAINTENANCE_MODE', false);
					$this->setCode(201);
					$this->respond();
				}

			
			default: //METHOD NOT ALLOWED
				$this->setCode(405);
				$this->respond(array('error' => 'Method Not Allowed'));
		}
	}
}