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

/**
 * Describes currenty types.
 *
 * @package Hexcores\Currency
 * @author Nyan Lynn Htut <nyanlynnhtut@hexcores.com> 
 **/
class Type
{
	/**
	 * AUD - Australian dollar
	 */
    const AUD = 'AUD';

    /**
	 * CNY - Chinese renminbi
	 */
    const CNY = 'CNY';

    /**
	 * EUR - European Euro
	 */
    const EUR = 'EUR';

    /**
	 * GBP - British pound
	 */
    const GBP = 'GBP';

    /**
	 * JPY - Japanese yen
	 */
    const JPY = 'JPY';
    
    /**
	 * MMK - Myanmar kyat
	 */
    const MMK = 'MMK';

    /**
	 * SGD - Singapore dollar
	 */
    const SGD = 'SGD';

    /**
	 * THB - Thai baht
	 */
    const THB = 'THB';

    /**
	 * USD - United States dollar
	 */
	const USD = 'USD';

	/**
	 * Supported type cache list;
	 * 
	 * @var  array|null
	 */
	protected static $supported_types;

	/**
	 * Check given type is supported type or not.
	 * Example usgae :
	 * <code>
	 * 		Type::isSupported(Type::USD);
	 *   	// or
	 *    	Type::isSupported('USD');
	 * </code>
	 * 
	 * @param string $type
	 * @return boolean
	 */
	public static function isSupported($type)
	{
		if ( is_null(static::$supported_types))
		{
			$reflection = new \ReflectionClass('\Hexcores\Currency\Type');
			$types = $reflection->getConstants();
			static::$supported_types = $types;
		}
		
		return isset(static::$supported_types[$type]);
	}

} // END class Type