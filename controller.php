<?php defined('C5_EXECUTE') or die("Access Denied.");

class ApiBaseMaintenanceModePackage extends Package {

	protected $pkgHandle = 'api_base_maintenance_mode';
	protected $appVersionRequired = '5.6.0';
	protected $pkgVersion = '0.9';

	public function getPackageName() {
		return t("Api:Base:Maintenance Mode");
	}

	public function getPackageDescription() {
		return t("Manage Maintenance Mode.");
	}

	public function install() {
		$installed = Package::getByHandle('api');
		if(!is_object($installed)) {
			throw new Exception(t('Please install the "API" package before installing %s', $this->getPackageName()));
		}

		parent::install();

		$pkg = Package::getByHandle($this->pkgHandle);
		ApiRoute::add('maintenance_mode', t('Get the maintenance mode status.'), $pkg);
		ApiRoute::add('maintenance_mode/update', t('Enable or disable maintenance mode.'), $pkg);

	}
	
	public function uninstall() {
		ApiRouteList::removeByPackage($this->pkgHandle);//remove all the apis
		parent::uninstall();
	}

}