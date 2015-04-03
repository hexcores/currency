# Hexcores Currency Package

Currency package is easy to use multiple currency value (format) at your application. (eg: E-Commerce)

[![Build Status](https://img.shields.io/travis/hexcores/currency.svg?style=flat-square)](https://travis-ci.org/hexcores/currency)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://raw.githubusercontent.com/hexcores/currency/master/LICENSE)

## Package Dependencies

* "php": ">=5.3.0"

### Exchange Services

- (CentralBankMyanmarExchange) [Excahange rate from Cental Bank of Myanmar API](http://forex.cbm.gov.mm/index.php/api).

### Formatter Services

- BaseFormatter

## Supported Currency Types

- AUD (Australian dollar)
- CNY (Chinese renminbi)
- EUR (European Euro)
- GBP (Pound Sterling)
- JPY (Japanese yen)
- MMK (Myanmar Kyats)
- SGD (Singapore Dollar)
- THB (Thai Baht)
- USD (US Dollar)

## Install

You can install currency package from [composer](https://packagist.org/packages/hexcores/currency)

``` json
{
    "require": {
        "hexcores/currency": "dev-master"
    }
}
```

## Usage

```php
	use Hexcores\Currency\Type;
	use Hexcores\Currency\Converter;
	use Hexcores\Currency\Http\Client;
	use Hexcores\Currency\Formatter\BaseFormatter;
	use Hexcores\Currency\Exchange\CentralBankMyanmarExchange;

	$ex = new CentralBankMyanmarExchange(new Client());
	$f = new BaseFormatter();
	$converter = new Converter($ex, $f);

	echo "Convert : ". $converter->convert(2500, Type::USD, Type::MMK);
	echo "<br>Convert AUD: ". $converter->convert(2500, Type::USD, Type::AUD);
```

#### Use central bank exchange with factory

```php
	use Hexcores\Currency\Type;
	use Hexcores\Currency\Factory;

	$converter = Factory::centralBank();

	echo "Convert : ". $converter->convert(2500, Type::USD, Type::MMK);
	echo "<br>Convert AUD: ". $converter->convert(2500, Type::USD, Type::AUD);

```

## Example

You can run example.php file from example folder.

## Testing

``` bash
$ phpunit
```

## Contributing

TODO