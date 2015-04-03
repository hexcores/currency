<?php

/*
 * This file is part of the Hexcores\Currency package.
 *
 * @package Hexcores\Currency
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hexcores\Currency;

use Hexcores\Currency\Converter;
use Hexcores\Currency\Http\Client;
use Hexcores\Currency\Formatter\BaseFormatter;
use Hexcores\Currency\Exchange\CentralBankMyanmarExchange;

/**
 * Currency Converter Factory Class
 *
 * @package Hexcores\Currency
 * @author Nyan Lynn Htut <nyanlynnhtut@hexcores.com> 
 **/
class Factory
{
	/**
	 * Instance cache
	 *
	 * @var array
	 */
	protected static $instance = array();

	/**
	 * Create central bank myanmar converter.
	 *
	 * @return \Hexcores\Currency\Converter
	 */
	public static function centralBank()
	{
		if ( isset(static::$instance['centralBank']))
		{
			return static::$instance['centralBank'];
		}

		$ex = new CentralBankMyanmarExchange(new Client());
    	
    	$f = new BaseFormatter();

    	$converter = new Converter($ex, $f);

    	static::$instance['centralBank'] = $converter;

    	return $converter;
	}
}