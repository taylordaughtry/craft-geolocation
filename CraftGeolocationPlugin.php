<?php

namespace Craft;

class CraftGeolocationPlugin extends BasePlugin
{
	private $name = 'Craft Geolocation';
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
}