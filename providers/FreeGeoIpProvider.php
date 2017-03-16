<?php

namespace Craft;

use \Guzzle\Http\Client as Client;
use \Locations\Location_Provider as Provider;

class FreeGeoIpProvider implements Provider;
{
	private $client;

	public function getName()
	{
		return 'Free Geo IP';
	}

	public function getLocation($address)
	{
		$this->client = new Client();

		$response = $this->client->get('http://freegeoip.net/json/' . $address)
			->send()
			->json();

		return $response;
	}
}