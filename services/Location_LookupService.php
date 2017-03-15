<?php

namespace Craft;

use \Guzzle\Http\Client as Client;

class Location_LookupService extends BaseApplicationComponent
{
	private $settings;
	private $address;
	private $client;

	public function __construct()
	{
		$this->settings = craft()->plugins->getPlugin('location')->getSettings();
		$this->address = craft()->request->getIpAddress();
		$this->client = new Client();
	}

	public function locateIp()
	{
		if ($this->isLocalRequest()) {
			return $this->settings->defaultLocation;
		}

		$response = $this->client->get('https://freegeoip.net/json/' . $this->address)
			->send()
			->json();

		foreach ($response as $key => $value) {
			$result[StringHelper::toCamelCase($key)] = $value;
		}

		return $result;
	}

	private function isLocalRequest()
	{
		return in_array($this->address, ['127.0.0.1', '::1']);
	}
}