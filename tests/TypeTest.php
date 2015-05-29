<?php

use Hexcores\Currency\Type;

class TypeTest extends \PHPUnit_Framework_TestCase
{

	public function testTypeIsSupported() 
	{
		$this->assertTrue(Type::isSupported(Type::USD));
	}

	public function testTypeIsNotSupported() 
	{
		$this->assertFalse(Type::isSupported('ABC'));
	}

	public function testGetTypeDataForValidType() 
	{
		$type = Type::getTypeData(Type::USD);

		// Test for $type is array
		$this->assertInternalType('array', $type);

		// Test for $type's key
		//$this->assertContains('format', $type);
		//$this->assertContains('decimal_mark', $type);
		//$this->assertContains('thousand_marker', $type);

		// Test for $type count
		$this->assertEquals(4, count($type));
	}

	/**
     * @expectedException \Hexcores\Currency\Exceptions\NotSupportedTypeException
     */
    public function testNotSupportedTypeException()
    {
    	Type::getTypeData("RUH");
    }
}