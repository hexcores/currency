<?php

use \Mockery as M;
use Hexcores\Currency\Converter;

class ConverterTest extends \PHPUnit_Framework_TestCase
{
	public function tearDown()
    {
    	M::close();
    }

    public function testConvertMethod()
    {
    	$exchange = M::mock('Hexcores\Currency\Contract\ExchangeContract');
    	$exchange->shouldReceive('make')->once()->andReturn(1000);

    	$formatter = M::mock('Hexcores\Currency\Contract\FormatterContract');
		$formatter->shouldReceive('make')->once()->andReturn('1,000.00Ks');

    	$converter = new Converter($exchange, $formatter);

    	$result = $converter->convert(1, 'USD', 'MMK');

    	$this->assertSame('1,000.00Ks', $result);

    	// Test for original value
    	$this->assertEquals(1, $converter->getOriginalValue());
    }

    public function testConvertWithPhpMagicMethod()
    {
    	$exchange = M::mock('Hexcores\Currency\Contract\ExchangeContract');
    	$exchange->shouldReceive('make')->twice()->andReturn(1000);

    	$formatter = M::mock('Hexcores\Currency\Contract\FormatterContract');
		$formatter->shouldReceive('make')->twice()->andReturn('1,000.00Ks');

    	$converter = new Converter($exchange, $formatter);

    	$result1 = $converter->convert(1, 'USD', 'MMK');

    	// Covert with original value
    	$result2 = $converter->convertToMMK();

        $this->assertSame($result1, $result2);
    }

    public function testConvertForNewValueWithPhpMagicMethod()
    {
        $exchange = M::mock('Hexcores\Currency\Contract\ExchangeContract');
        $exchange->shouldReceive('make')->once()->andReturn(2000);

        $formatter = M::mock('Hexcores\Currency\Contract\FormatterContract');
        $formatter->shouldReceive('make')->once()->andReturn('2,000.00Ks');

        $converter = new Converter($exchange, $formatter);

        // Convert with new value
        $result = $converter->convertToMMK(2);

        $this->assertSame('2,000.00Ks', $result);
    }

    /**
     * @expectedException \Hexcores\Currency\Exceptions\NotSupportedTypeException
     */
    public function testNotSupportedTypeException()
    {
    	$exchange = M::mock('Hexcores\Currency\Contract\ExchangeContract');

    	$formatter = M::mock('Hexcores\Currency\Contract\FormatterContract');

    	$converter = new Converter($exchange, $formatter);

    	// Covert with not supported type currency
    	$converter->convertToRUH();
    }

    public function testSetterAndGetterMethods()
    {
    	$exContract = "Hexcores\Currency\Contract\ExchangeContract";
    	$fContract = "Hexcores\Currency\Contract\FormatterContract";
    	$exchange = M::mock($exContract);
    	$formatter = M::mock($fContract);

    	$converter = new Converter($exchange, $formatter);

    	// Getter for Exchange
    	$this->assertInstanceOf($exContract, $converter->getExchange());

    	// Getter for Formatter
    	$this->assertInstanceOf($fContract, $converter->getFormatter());


    	// Setter for setDecimal
    	$this->assertInstanceOf('Hexcores\Currency\Converter', $converter->setDecimal(3));

    	// setDeciaml is work
    	$this->assertEquals(3, $converter->getDecimal());

    }
}