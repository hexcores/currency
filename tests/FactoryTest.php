<?php

use Hexcores\Currency\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase
{

	public function testCentralBankCreator()
	{
		$converter = Factory::centralBank();

		$this->assertTrue($converter instanceof \Hexcores\Currency\Converter);

		$cache = Factory::centralBank();

		$this->assertTrue($cache == $converter);		
	}
}