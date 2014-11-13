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

use Hexcores\Currency\Exceptions\NotSupportedTypeException;

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
	 * Supported currency type list;
	 * 
	 * @var  array
	 */
	private static $supported_types = array(
			'AUD' => array(
				'format'			=> 'A${value}',
				'decimal_mark'   	=> '.',
	            'thousand_marker'  	=> ','
			),
			'CNY' => array(
				'format'			=> '&yen;{value}',
				'decimal_mark'   	=> '.',
	            'thousand_marker'  	=> ','
			),
			'EUR' => array(
	            'format'     		=> '&euro;{value}',
	            'decimal_mark'    	=> '.',
	            'thousand_marker'   => ','
	        ),
			'GBP' => array(
	            'format'      		=> '&pound;{value}',
	            'decimal_mark'     	=> '.',
	            'thousand_marker'   => ','
	        ),
	        'JPY' => array(
				'format'			=> '&yen;{value}',
				'decimal_mark'   	=> '.',
	            'thousand_marker'  	=> ','
			),
			'MMK' => array(
				'format'			=> '{value}Ks',
				'decimal_mark'   	=> '.',
	            'thousand_marker'  	=> ','
			),
			'SGD' => array(
	            'format'      		=> 'S${value}',
	            'decimal_mark'     	=> '.',
	            'thousand_marker'   => ','
	        ),
	        'THB' => array(
	            'format'      		=> '฿{value}',
	            'decimal_mark'     	=> '.',
	            'thousand_marker'   => ','
	        ),
			'USD' => array(
	            'format'      		=> '${value}',
	            'decimal_mark'     	=> '.',
	            'thousand_marker'   => ','
	        )
		);

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
		return isset(static::$supported_types[$type]);
	}

	/**
	 * Get currenct type data.
	 * @param  string $type
	 * @return array
	 * @throws \Hexcores\Currency\Exceptions\NotSupportedTypeException
	 */
	public static function getTypeData($type)
	{
		if ( ! static::isSupported($type))
		{
			throw new NotSupportedTypeException($type);
		}

		return static::$supported_types[$type];
	}

} // END class Type