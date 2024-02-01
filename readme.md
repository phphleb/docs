# Documentation of the PHP Framework HLEB2

[![HLEB2](https://img.shields.io/badge/HLEB-2-darkcyan)](https://github.com/phphleb/hleb) ![PHP](https://img.shields.io/badge/PHP-^8.2-blue) [![License: MIT](https://img.shields.io/badge/License-MIT%20(Free)-brightgreen.svg)](https://github.com/phphleb/hleb/blob/master/LICENSE)

An open repository with documentation for the [HLEB2 framework](https://github.com/phphleb/hleb).
Documentation can be installed locally.

Web version: [hleb2framework.ru](http://hleb2framework.ru)

Installation
-----------------------------------

```bash
$ composer create-project phphleb/hleb hleb-docs
```
```bash
$ cd hleb-docs
```
```bash
$ composer require phphleb/docs
```
```bash
$ php console phphleb/docs add
```
```bash
$ composer dumpautoload
```

Remove the route for the main page in the file /routes/map.php

Run the project locally:
```bash
$ APP_DEBUG=false php -S localhost:8000 -t public
```

Update
-----------------------------------

```bash
$ composer update phphleb/docs
```

```bash
$ php console phphleb/docs add
```

```bash
$ php console --clear-cache
```

```bash
$ php console --clear-routes-cache
```

```bash
$ composer dumpautoload
```

