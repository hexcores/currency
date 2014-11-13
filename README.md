# Hexcores Currency Package

Currency package is easy to use multiple currency value (format) at your application. (eg: E-Commerce)

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