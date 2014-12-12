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
}