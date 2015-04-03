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

use Hexcores\Currency\Type;
use Hexcores\Currency\Contract\ExchangeContract;
use Hexcores\Currency\Exceptions\NotSupportedTypeException;

/**
 * Base currency exchange class.
 *
 * @package Hexcores\Currency
 * @author Nyan Lynn Htut <nyanlynnhtut@hexcores.com> 
 **/

abstract class AbstractExchange implements ExchangeContract
{

	/**
	 * {@inheritdoc}
	 *
	 **/
	abstract public function make($value, $from, $to);

	/**
	 * Check Currency types is supported or not.
	 *
	 * @param string $from
	 * @param string $to
	 * @return boolean
	 * @throws \Hexcores\Currency\Exceptions\NotSupportedTypeException If currency type is not support.
	 **/
	protected function checkCurrenyType($from, $to)
	{
		if ( ! Type::isSupported($from) ) {
			throw new NotSupportedTypeException($from);
		}

		if ( ! Type::isSupported($to) ) {
			throw new NotSupportedTypeException($to);
		}

		return true;
	}
}