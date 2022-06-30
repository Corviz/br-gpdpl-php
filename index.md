# br-gpdpl-php

This lib provides a series of data anonymizer classes, compliant with brazilian General Personal Data Protection Law (aka LGPD, in pt-br)

[![StyleCI](https://github.styleci.io/repos/348778629/shield?branch=main)](https://github.styleci.io/repos/348778629?branch=main)
[![Build Status](https://travis-ci.org/Corviz/br-gpdpl-php.svg?branch=main)](https://travis-ci.org/Corviz/br-gpdpl-php)
[![PHP Composer](https://github.com/Corviz/br-gpdpl-php/actions/workflows/php.yml/badge.svg)](https://github.com/Corviz/br-gpdpl-php/actions/workflows/php.yml)

## What is GPDPL (or LGPD)?

According to Wikipedia,

The General Personal Data Protection Law (Brazil) 13709/2018 (Portuguese: Lei Geral de Proteção de Dados Pessoais, or LGPD), is a statutory law on data protection and privacy in the Federative Republic of Brazil. The law's primary aim is to unify 40 different Brazilian laws that regulate the processing of personal data. The LGPD contains provisions and requirements related to the processing of personal data of individuals, where the data is of individuals located in Brazil, where the data is collected or processed in Brazil, or where the data is used to offer goods or services to individuals in Brazil.

The LGPD became law on September 18, 2020 but its enforceability was backdated August 16, 2020. Sanctions under the regulation will only be applied from August 1, 2021.

The national data protection authority responsible for enforcement of the LGPD is the Autoridade Nacional de Proteção de Dados, or ANPD.

Further information can be found at: https://en.wikipedia.org/wiki/General_Personal_Data_Protection_Law

## Installation

Installing via composer CLI:
```
composer require corviz/br-gpdpl
```

Or add the following to your composer.json

```
{
  "require": {
    "corviz/br-gpdpl": "1.*"
  }
}
```

## Usage examples


### Generic

Hide any character:
```php
use Corviz\BrGpdpl\Anonymizer\GenericAnonymizer;

$text = 'my content';
$anonymizer = new GenericAnonymizer($text);

echo $anonymizer->anonymized(); //**********
```

To keep starting or ending characters untouched, just inform how many of them you'd like to do so. For example:
```php
use Corviz\BrGpdpl\Anonymizer\GenericAnonymizer;

$text = 'my content';
$keepStart = 2;
$keepEnd = 3;
$anonymizer = new GenericAnonymizer($text);

echo $anonymizer->anonymized(); //my*****ent
```

### Documents - CPF

This will work with or without separators:

- 999.999.999-99
- 99999999999

```php
use Corviz\BrGpdpl\Anonymizer\CpfAnonymizer;

$document = '999.999.999-99';
$anonymizer = new CpfAnonymizer($document);

echo $anonymizer->anonymized(); //'999.***.***-**'
```

### Documents - CNPJ

This will work with or without separators:

- 11.111.111/1111-11
- 11111111111111

```php
use Corviz\BrGpdpl\Anonymizer\CnpjAnonymizer;

$cardNumber = '11.111.111/1111-11';
$anonymizer = new CnpjAnonymizer($cardNumber);

echo $anonymizer->anonymized(); //'11.1**.***/1111-**'
```

### Documents - RG

This will work with or without separators:

- 12.345.678-0
- 12345678X

```php
use Corviz\BrGpdpl\Anonymizer\RgAnonymizer;

$cardNumber = '12.345.678-X';
$anonymizer = new RgAnonymizer($cardNumber);

echo $anonymizer->anonymized(); //12.345.***-*
```

### Credit card numbers

This will work with most common separators or no separators at all:

- Spaces: 1234 5678 9012 3456
- Hiphens: 1234-5678-9012-3456
- No separators: 1234567890123456

```php
use Corviz\BrGpdpl\Anonymizer\CreditCardNumberAnonymizer;

$cardNumber = '1234 5678 9012 3456';
$anonymizer = new CreditCardNumberAnonymizer($cardNumber);

echo $anonymizer->anonymized(); //1234 56** **** 3456
```

### Email

```php
use Corviz\BrGpdpl\Anonymizer\EmailAnonymizer;

$cardNumber = 'user@domain.com';
$anonymizer = new EmailAnonymizer($cardNumber);

echo $anonymizer->anonymized(); //u****@domain.com
```

### Names

```php
use Corviz\BrGpdpl\Anonymizer\NameAnonymizer;

$cardNumber = 'João da Silva';
$anonymizer = new NameAnonymizer($cardNumber);

echo $anonymizer->anonymized(); //João********a
```

### Phone numbers (Including international)

Accepted formats:

- Local: 3000-1234
- Local celphone: 90000-1234
- DDD: (11) 3000-1234 or (11) 90000-1234
- DDI: +55 11 91234-5678
- International: +1 (415) 555-2671
- All above, without masks: +5511912345678

```php
use Corviz\BrGpdpl\Anonymizer\PhoneAnonymizer;

$cardNumber = '+55 11 91234-5678';
$anonymizer = new PhoneAnonymizer($cardNumber);

echo $anonymizer->anonymized(); //+55 ** *****-5678
```
