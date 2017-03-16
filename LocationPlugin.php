<?php

namespace Craft;

class LocationPlugin extends BasePlugin
{
	private $name = 'Location';
	private $developer = 'Taylor Daughtry';
	private $developerUrl = 'https://taylordaughtry.com';
	private $version = '1.0.0';
	private $schemaVersion = '1.0.0';
	private $description = 'Simple IP Geolocation with multiple redundant APIs.';

	public function getName()
	{
		return $this->name;
	}

	public function getDeveloper()
	{
		return $this->developer;
	}

	public function getDeveloperUrl()
	{
		return $this->developerUrl;
	}

	public function getVersion()
	{
		return $this->version;
	}

	public function getSchemaVersion()
	{
		return $this->schemaVersion;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function defineSettings()
	{
		return [
			'provider' => [
				AttributeType::String,
				'default' => 'freeGeoIp'
			],
			'defaultLocation' => [
				AttributeType::Mixed,
				'default' => [
					'ip' => '23.114.164.42',
					'country_code' => 'US',
					'country_name' => 'United States',
					'region_code' => 'TN',
					'region_name' => 'Tennessee',
					'city' => 'Franklin',
					'zip_code' => '37064',
					'time_zone' => 'America/Chicago',
					'latitude' => '35.9024',
					'longitude' => '-86.9595',
					'metro_code' => 659
				]
			]
		];
	}

	public function init()
	{
		require_once(CRAFT_PLUGINS_PATH . 'location/interfaces/Location_Provider.php');
	}
}