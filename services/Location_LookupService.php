<?php

namespace Craft;

use \Guzzle\Http\Client as Client;

class Location_LookupService extends BaseApplicationComponent
{
	private $settings;
	private $address;

	public function __construct()
	{
		$this->settings = craft()->plugins->getPlugin('location')->getSettings();
		$this->address = craft()->request->getIpAddress();
	}

	public function locateIp()
	{
		if ($this->isLocalRequest()) {
			return $this->settings->defaultLocation;
		}

		$provider = $this->getProvider();

		foreach ($provider->getLocation($this->address) as $key => $value) {
			$result[StringHelper::toCamelCase($key)] = $value;
		}

		return $result;
	}

	private function isLocalRequest()
	{
		return in_array($this->address, ['127.0.0.1', '::1']);
	}

	private function getProvider()
	{
		require_once(CRAFT_PLUGINS_PATH . 'location/providers/' . $this->settings->provider . 'Provider.php');

		$provider = '\Craft\\' . $this->settings->provider . 'Provider';

		return new $provider();
	}
}