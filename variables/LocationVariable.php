<?php

namespace Craft;

class LocationVariable
{
	public function location()
	{
		return craft()->location_lookup->locateIp();
	}
}