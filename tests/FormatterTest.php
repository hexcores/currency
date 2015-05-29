<?php

use Hexcores\Currency\Type;
use Hexcores\Currency\Formatter\BaseFormatter;
use Hexcores\Currency\Contract\FormatterContract;

class FormatterTest extends \PHPUnit_Framework_TestCase
{
	 /**
     * @var BaseFormatter
     */
    private $formatter;

	public function setUp()
	{
		$this->formatter = new BaseFormatter();
	}

	public function tearDown()
    {
        $this->formatter = null;
    }

    public function testImplementOnFormatterContract()
    {
    	$this->assertTrue($this->formatter instanceof FormatterContract);
    }

    public function testFormatMaking()
    {
        $AUD = $this->formatter->make(10000, Type::AUD);
        $this->assertSame('A$10,000.00', $AUD);

        $CNY = $this->formatter->make(10000, Type::CNY);
        $this->assertSame('&yen;10,000.00', $CNY);

        $EUR = $this->formatter->make(10000, Type::EUR);
        $this->assertSame('&euro;10,000.00', $EUR);

        $GBP = $this->formatter->make(10000, Type::GBP);
        $this->assertSame('&pound;10,000.00', $GBP);

        $JPY = $this->formatter->make(10000, Type::JPY);
        $this->assertSame('&yen;10,000.00', $JPY);

        $MMK = $this->formatter->make(10000, Type::MMK);
        $this->assertSame('10,000.00Ks', $MMK);

        $SGD = $this->formatter->make(10000, Type::SGD);
        $this->assertSame('S$10,000.00', $SGD);

        $THB = $this->formatter->make(10000, Type::THB);
        $this->assertSame('฿10,000.00', $THB);

        $USD = $this->formatter->make(10000, Type::USD);
        $this->assertSame('$10,000.00', $USD);
    }

    public function testFormatMakingWithCustomDecimalPoint()
    {
        $AUD = $this->formatter->make(10000, Type::AUD, 3);
        $this->assertSame('A$10,000.000', $AUD);

        $CNY = $this->formatter->make(10000, Type::CNY, 1);
        $this->assertSame('&yen;10,000.0', $CNY);

        $EUR = $this->formatter->make(10000, Type::EUR, 4);
        $this->assertSame('&euro;10,000.0000', $EUR);

        $MMK = $this->formatter->make(10000, Type::MMK, 0);
        $this->assertSame('10,000Ks', $MMK);
    }

    public function testFormatMakingWithoutSymbol()
    {
        $AUD = $this->formatter->make(10000, Type::AUD, 2, false);
        $this->assertSame('10,000.00', $AUD);

        $CNY = $this->formatter->make(10000, Type::CNY, 2, false);
        $this->assertSame('10,000.00', $CNY);

        $EUR = $this->formatter->make(10000, Type::EUR, 2, false);
        $this->assertSame('10,000.00', $EUR);

        $GBP = $this->formatter->make(10000, Type::GBP, 2, false);
        $this->assertSame('10,000.00', $GBP);

        $JPY = $this->formatter->make(10000, Type::JPY, 2, false);
        $this->assertSame('10,000.00', $JPY);

        $MMK = $this->formatter->make(10000, Type::MMK, 2, false);
        $this->assertSame('10,000.00', $MMK);

        $SGD = $this->formatter->make(10000, Type::SGD, 2, false);
        $this->assertSame('10,000.00', $SGD);

        $THB = $this->formatter->make(10000, Type::THB, 2, false);
        $this->assertSame('10,000.00', $THB);

        $USD = $this->formatter->make(10000, Type::USD, 2, false);
        $this->assertSame('10,000.00', $USD);
    }

}