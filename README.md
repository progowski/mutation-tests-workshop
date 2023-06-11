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

Next install infection phar file:

```bash
wget https://github.com/infection/infection/releases/download/0.27.0/infection.phar  
```

and

```bash
wget https://github.com/infection/infection/releases/download/0.27.0/infection.phar.asc  
```

Give execution permissions to infection.phar file:

```bash
chmod +x infection.phar
```

## Troubleshooting

### Lack of wget inside docker container

Run inside docker container:

```bash
 apt-get update
```

```bash
apt-get install wget
```
