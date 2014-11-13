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
 * Contract for Formatter.
 *
 * @package Hexcores\Currency
 * @author Nyan Lynn Htut <nyanlynnhtut@hexcores.com>
 **/
interface FormatterContract
{

	/**
	 * Make format for given param.
	 *
	 * @param integer $value
	 * @param string $type Currency type (eg: USD, EUR)
	 * @param int $decimals The number of decimal points.
	 * @return string
	 **/
	public function make($value, $type, $decimals);

} // END interface FormatterContract