[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg?style=flat-square)](https://php.net/)
[![Latest Stable Version](https://poser.pugx.org/mazanax/composer-project-version/v/stable)](https://packagist.org/packages/mazanax/composer-project-versionpaginator)
[![Build Status](https://travis-ci.org/mazanax/paginator.svg?branch=master)](https://travis-ci.org/mazanax/composer-project-version)
[![codecov](https://codecov.io/gh/mazanax/composer-project-version/branch/master/graph/badge.svg)](https://codecov.io/gh/mazanax/composer-project-version)

# Composer Package Version
Helper function to get a current version from `composer.json` file in your project

## Installation
`composer require mazanax/composer-project-version`

## Usage

### &bull; PackageVersion class
```php
<?php

$packageVersion = \MZNX\ComposerPackageVersion\PackageVersion::init(__DIR__ . '/path/to/composer.json')
$version = $packageVersion->getVersion();
```

### &bull; Version function
```php

$packageVersion = \MZNX\ComposerPackageVersion\Version(__DIR__ . '/path/to/composer.json');
```

## License

MIT