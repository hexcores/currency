<?php

/*
 * This file is part of the Hexcores\Currency package.
 *
 * @package Hexcores\Currency
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hexcores\Currency\Formatter;

use Hexcores\Currency\Type;
use Hexcores\Currency\Contract\FormatterContract;
use Hexcores\Currency\Exceptions\NotSupportedTypeException;

/**
 * Base currency formatter class.
 *
 * @package Hexcores\Currency
 * @author Nyan Lynn Htut <nyanlynnhtut@hexcores.com> 
 **/

class BaseFormatter implements FormatterContract
{
	private $value;

	/**
	 * {@inheritdoc}
	 *
	 **/
	public function make($value, $type, $decimals = 2)
	{
		$type = strtoupper($type);

		$typedata = Type::getTypeData($type);

		$dec_point = $typedata['decimal_mark'];
		$thousands_sep = $typedata['thousand_marker'];

		$format = number_format($value, $decimals, $dec_point, $thousands_sep);

		$this->value = str_replace('{value}', $format, $typedata['format']);

		return $this->value;
	}

	/**
	 * PHP magic method for printing
	 *
	 * @return string
	 **/
	public function __toString()
	{
		return $this->value;
	}
}