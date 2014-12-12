<?php

// Display Errors On
ini_set('display_errors', 'On');

$autoload = __DIR__.'/../vendor/autoload.php';

if ( ! file_exists($autoload))
{
	exit("Need to run \"composer install\" for example");
}

require __DIR__.'/../vendor/autoload.php';


use Hexcores\Currency\Type;
use Hexcores\Currency\Converter;
use Hexcores\Currency\Http\Client;
use Hexcores\Currency\Formatter\BaseFormatter;
use Hexcores\Currency\Exchange\CentralBankMyanmarExchange;

$ex = new CentralBankMyanmarExchange(new Client());
$f = new BaseFormatter();
$converter = new Converter($ex, $f);
var_dump($f->make(10000, Type::CNY)); exit;
echo "Current USD is 2500<br>";
echo "========================";

echo "<br>Convert USD to MMK: ". $converter->convert(2500, Type::USD, Type::MMK);
echo "<br> <code style='color:#0086b3;'>\$converter->convert(2500, Type::USD, Type::MMK)</code>";
echo "<br>------------------------------------------";

echo "<br>Convert USD to AUD: ". $converter->convert(2500, Type::USD, Type::AUD);
echo "<br> <code style='color:#0086b3;'>\$converter->convert(2500, Type::USD, Type::AUD)</code>";
echo "<br>------------------------------------------";

echo "<br>Convert USD to JPY with magic method: ". $converter->convertToJPY();
echo "<br> <code style='color:#0086b3;'>\$converter->convertToJPY()</code>";
echo "<br>------------------------------------------";

echo "<br>Convert USD to JPY 1200 with magic method: ". $converter->convertToJPY(1200);
echo "<br> <code style='color:#0086b3;'>\$converter->convertToJPY(1200)</code>";
