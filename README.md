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
composer require corviz/br-gpdpl-php
```

Or add the following to your composer.json

```
{
  "require": {
    "corviz/br-gpdpl-php": "1.*"
  }
}
```

## Usage examples

```php
use Corviz\BrGpdpl\Anonymizer\GenericAnonymizer;

$text = 'my content';
$anonymizer = new GenericAnonymizer($text);

echo $anonymizer->anonymized(); //**********
```

```php
use Corviz\BrGpdpl\Anonymizer\CreditCardNumberAnonymizer;

$cardNumber = '1234 5678 9012 3456';
$anonymizer = new CreditCardNumberAnonymizer($cardNumber);

echo $anonymizer->anonymized(); //1234 56** **** 3456
```

[See complete list of examples...](https://github.com/Corviz/br-gpdpl-php/wiki)
