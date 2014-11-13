<?php

/*
 * This file is part of the Hexcores\Currency package.
 *
 * @package Hexcores\Currency
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hexcores\Currency\Exceptions;

/**
 * Not Supported Currency Type Exception Class
 *
 * @package Hexcores\Currency
 * @author Nyan Lynn Htut <nyanlynnhtut@hexcores.com> 
 **/
class NotSupportedTypeException extends \Exception
{

	public function __construct($type, $code = 1) 
	{
		$type = strtoupper($type);

		$msg = sprintf("Currnecy Type [ %s ] is not supported", $type);

		parent::__construct($msg, $code);
	}

} // END class NotSupportedTypeExceptions extends \Exception