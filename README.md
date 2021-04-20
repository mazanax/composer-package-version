[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg?style=flat-square)](https://php.net/)
[![Latest Stable Version](https://poser.pugx.org/mazanax/composer-project-version/v/stable)](https://packagist.org/packages/mazanax/composer-project-version)
[![Build Status](https://travis-ci.com/mazanax/composer-package-version.svg?branch=master&status=started)](https://travis-ci.com/github/mazanax/composer-package-version)
[![codecov](https://codecov.io/gh/mazanax/composer-package-version/branch/master/graph/badge.svg?token=dZRpIiX3kg)](https://codecov.io/gh/mazanax/composer-package-version)

# Composer Package Version
Helper function to get a current version from `composer.json` file in your project

If you want to get separate values of major/minor/patch version, you can try [mazanax/composer-version-semver](https://packagist.org/packages/mazanax/composer-version-semver)

## Installation
`composer require mazanax/composer-project-version`

## Usage

### &bull; PackageVersion class
```php
<?php

$packageVersion = \MZNX\ComposerPackageVersion\PackageVersion::init(__DIR__ . '/path/to/composer.json');
$version = $packageVersion->getVersion();
```

### &bull; Version function
```php

$packageVersion = \MZNX\ComposerPackageVersion\Version(__DIR__ . '/path/to/composer.json');
```

## License

MIT