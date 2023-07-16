# Mutation tests workshop

The Mutation Testing Workshop Repository is created for workshops focusing on mutation testing.
It provides a comprehensive collection of code examples and practical exercises tailored to
enhance participants' understanding and proficiency in mutation testing techniques. The workshop offers guides,
tutorials, and documentation to establish a strong theoretical foundation, along with real-world code examples.By
utilizing this repository, attendees can develop practical skills in mutation testing and elevate their software
testing practices to ensure higher quality and reliability.

## Installation

First install required dependencies using composer:

```bash
composer install
```

Next run infection:

```bash
vendor/bin/infection
```

To run PHPUnit test run: 

```bash
vendor/bin/phpunit
```


## Troubleshooting


### PHP Warning:  Failed loading Zend extension 'xdebug.so'

Install xdebug via pecl

```bash
pecl install xdebug
```
