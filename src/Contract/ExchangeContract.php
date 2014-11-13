<?php

/*
 * This file is part of the Hexcores\Currency package.
 *
 * @package Hexcores\Currency
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hexcores\Currency\Contract;

/**
 * Contract for Exchange.
 *
 * @package Hexcores\Currency
 * @author Nyan Lynn Htut <nyanlynnhtut@hexcores.com>
 **/
interface ExchangeContract
{

	/**
	 * Make given currency value to request currency rate.
	 *
	 * @param integer $value Currency value
	 * @param string $from 
	 * @param string $to
	 * @return integer
	 **/
	public function make($value, $from, $to);

} // END interface ExchangeContract