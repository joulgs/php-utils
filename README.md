# php-utils

---

## Installation

- Using Composer

```bash
composer require joulgs/php-utils
```

---

## Class List

- [FiscalDocuments](#FiscalDocuments)

## Using the Functions

### FiscalDocuments

Allows you to validate a tax number and obtain its type (CPF, CNPJ, 9 or 10 digit NIS)

#### FiscalDocuments Functions

- getType 
- isValid
- isInvalid

Use
``` php
<?php
use JGS\Utils\FiscalDocuments;

$doc_number = new FiscalDocuments('274763478');

echo $doc_number->getType()."\n"; // NIF_PORT

if($doc_number->isValid())
    echo "Valid Doc Number\n";

```

