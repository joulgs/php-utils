# php-utils

## Installation

php-utils is available via composer. To install it, simply run the following command:

```bash
composer require joulgs/php-utils
```

## Available Classes

- [FiscalDocuments](#FiscalDocuments)
- [Tools](#Tools)

## FiscalDocuments

Allows you to validate a tax number and obtain its type (CPF, CNPJ or NIF).

### Methods

| Method    | Description                                           |
| --------- | ----------------------------------------------------- |
| getType   | Returns the type of the tax number (CPF, CNPJ or NIS) |
| isValid   | Returns true if the tax number is valid               |
| isInvalid | Returns true if the tax number is invalid             |
| getMasked | Returns the tax number with a mask                    |

### Example

```php
<?php
use JGS\Utils\FiscalDocuments;

$doc_number = new FiscalDocuments('12345678901');

echo $doc_number->getType(); // CPF

if($doc_number->isValid()) {
    echo "Valid Doc Number";
}

if($doc_number->isInvalid()) {
    echo "Invalid Doc Number";
}

echo $doc_number->getMasked(); // 123.456.789-01
```

## Tools

A set of tools to help you with your daily tasks.

### Methods

| Method      | Description                |
| ----------- | -------------------------- |
| formatPhone | Formats a phone number     |
| mask        | Applies a mask to a string |

\*Other methods will be added soon.

### Example

```php
<?php

use JGS\Utils\Tools;

$phone = Tools::formatPhone('1234567890');
echo $phone; // (12) 3456-7890

$phone = Tools::formatPhone('12345678901');
echo $phone; // (12) 34567-8901

$phone = Tools::formatPhone('551234567890');
echo $phone; // +55 (12) 3456-7890

$phone = Tools::formatPhone('5512345678901');
echo $phone; // +55 (12) 34567-8901

$masked = Tools::mask('12345678901', '###.###.###-##');
echo $masked; // 123.456.789-01

$masked = Tools::mask('1234567890', '##-##-##-##');
echo $masked; // 12-34-56-78
```
