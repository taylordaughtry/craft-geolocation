<?php

namespace Locations;

interface Location_Provider
{
	/**
	 * Get the name of this provider.
	 *
	 * @return {string}
	 */
	public function getName();

	/**
	 * Fetch the geolocation information for a given IP address.
	 *
	 * @param {string} $address The IP address of the current visitor.
	 *
	 * @return object {
	 *   ip 			{string}
	 *   countryCode 	{string}
	 *   countryName 	{string}
	 *   regionCode 	{string}
	 *   regionName 	{string}
	 *   city 			{string}
	 *   zipCode 		{string}
	 *   timeZone 		{string}
	 *   latitude 		{string}
	 *   longitude 		{string}
	 *   metroCode 		{int}
	 * }
	 */
	public function getLocation($address);
}