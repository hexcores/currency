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

use Hexcores\Currency\Contract\ExchangeContract;
use Hexcores\Currency\Contract\FormatterContract;

/**
 * Currency Converter Class
 *
 * @package Hexcores\Currency
 * @author Nyan Lynn Htut <nyanlynnhtut@hexcores.com> 
 **/
class Converter
{

	/**
	 * Exchange Service class instance
	 *
	 * @var \Hexcores\Currency\Contract\ExchangeContract
	 **/
	protected $exchange;

	/**
	 * Money Formatter class instance
	 *
	 * @var \Hexcores\Currency\Contract\FormatterContract
	 **/
	protected $formatter;

	/**
	 * Original currency value.
	 *
	 * @var float
	 **/
	protected $original_value = 0;

	/**
	 * Converted currency value.
	 *
	 * @var float
	 **/
	protected $converted_value = 0;

	/**
	 * Import original currency type (eg: Type::USD, Type::MMK)
	 *
	 * @var string
	 **/
	protected $from;

	/**
	 * Export converted currency type (eg: Type::EUR)
	 *
	 * @var string
	 **/
	protected $to;

	/**
	 * Make new converter instance.
	 * 
	 * @param \Hexcores\Currency\Contract\ExchangeContract  $exchange
	 * @param \Hexcores\Currency\Contract\FormatterContract $formatter
	 */
	public function __construct(ExchangeContract $exchange, 
								FormatterContract $formatter)
	{
		$this->exchange = $exchange;
		$this->formatter = $formatter;
	}

	/**
	 * Exchange setter method.
	 * 
	 * @param \Hexcores\Currency\Contract\ExchangeContract $exchange
	 * @return void
	 */
	public function setExchange(ExchangeContract $exchange)
	{
		$this->exchange = $exchange;
	}

	/**
	 * Exchange getter method.
	 * @return \Hexcores\Currency\Contract\ExchangeContract
	 */
	public function getExchange()
	{
		return $this->exchange;
	}

	/**
	 * Formatter setter method.
	 * 
	 * @param \Hexcores\Currency\Contract\FormatterContract $formatter
	 * @return void
	 */
	public function setFormatter(FormatterContract $formatter)
	{
		$this->formatter = $formatter;
	}

	/**
	 * Formatter getter method.
	 * @return \Hexcores\Currency\Contract\FormatterContract
	 */
	public function getFormatter()
	{
		return $this->formatter;
	}

	/**
	 * Set original currency type ($from)
	 * 
	 * @param  string $from
	 * @return \Hexcores\Currency\Cconverter
	 */
	public function from($from)
	{
		$this->from = $from;

		return $this;
	}

	/**
	 * Set currency type to convert ($to)
	 * 
	 * @param  string $to
	 * @return \Hexcores\Currency\Cconverter
	 */
	public function to($to)
	{
		$this->to = $to;

		return $this;
	}

	/**
	 * Get original currency value.
	 * 
	 * @return float
	 */
	public function getOriginalValue()
	{
		return $this->original_value;
	}

	/**
	 * Convert the currency value.
	 * 
	 * @param  float|integer $value Currency value
	 * @param  string $from  This parameter is optional
	 * @param  string $to    This parameter is optional
	 * @return [type]        [description]
	 */
	public function convert($value, $from = null, $to = null)
	{
		// Save Original Value
		$this->original_value = $value;

		if ( ! is_null($from) ) {
			$this->from($from);
		}

		if ( ! is_null($to) ) {
			$this->to($to);
		}

		return $this->makeConvertAndFormatting($value);
	}

	/**
	 * Make convert the original currency type for request type
	 * and change currency format with request type.
	 *
	 * @param float $value
	 * @return float
	 **/
	protected function makeConvertAndFormatting($value)
	{
		$converted = $this->makeConvert($value);

		$this->converted_value = $this->makeFormatting($converted);

		return $this->converted_value;
	}

	protected function makeConvert($value)
	{
		return $this->exchange->make($value, $this->from, $this->to);
	}

	protected function makeFormatting($value)
	{
		return $this->formatter->make($value, $this->to);
	}

} // END class Converter