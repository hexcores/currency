<?php

/*
 * This file is part of the Hexcores\Currency package.
 *
 * @package Hexcores\Currency
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hexcores\Currency\Exchange;

use Hexcores\Currency\Http\Client;

/**
 * Central Bank of Myanmar Exchange Rate.
 *
 * @package Hexcores\Currency
 * @author Nyan Lynn Htut <nyanlynnhtut@hexcores.com> 
 **/

class CentralBankMyanmarExchange extends AbstractExchange
{
	private $client;

	private $api_url = "http://forex.cbm.gov.mm/api/latest";

	private $cache = array();

	public function __construct(Client $client) 
	{
		$this->client = $client;
	}

	/**
	 * {@inheritdoc}
	 */
	public function make($value, $from, $to)
	{
		$from = strtoupper($from);
		$to = strtoupper($to);

		$this->checkCurrenyType($from, $to);

		if ( empty($this->cache) ) {
			$this->initRequestFromApi();
		}

		if ("MMK" == $from) {
			$new_val = $value / $this->cleanFloatValue($to);
		} else {
			// First need to change mmk value
			$mmk = $value * $this->cleanFloatValue($from);

			// Check require($to) value is MMK or not
			// If $to is MMK, return $mmk value
			if ("MMK" == $to) return $mmk;
			// Second need to change for require($to) value
			$new_val = $mmk / $this->cleanFloatValue($to);
		}

		return $new_val;
	}

	/**
	 * Clean the float currency value. 
	 * Remove comma from value string and convert float data type.
	 * 
	 * @param  string $type
	 * @return float
	 */
	private function cleanFloatValue($type)
	{
		return (float) str_replace(",", "", $this->cache[$type]);
	}

	/**
	 * Make request from CB Bank exchange API
	 * and save response data in cache on variable.
	 * 
	 * @return void
	 */
	private function initRequestFromApi() {
		$response = $this->client->get($this->api_url);

		if ( ! is_null($response))
		{
			$this->cache = (array) $response->rates;
		}
	}
}