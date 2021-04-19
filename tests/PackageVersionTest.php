<?php

declare(strict_types=1);

namespace MZNX\ComposerPackageVersion\Tests;

use InvalidArgumentException;
use MZNX\ComposerPackageVersion\PackageVersion;
use PHPUnit\Framework\TestCase;

use function MZNX\ComposerPackageVersion\Version;

class PackageVersionTest extends TestCase
{
    public function test_get_version(): void
    {
        $sut = PackageVersion::init(__DIR__ . '/fixtures/with_version.json');

        self::assertEquals('1.2.3', $sut->getVersion());
    }

    public function test_helper_function(): void
    {
        static::assertEquals('1.2.3', Version(__DIR__ . '/fixtures/with_version.json'));
    }

    public function test_get_default_version(): void
    {
        $sut = PackageVersion::init(__DIR__ . '/fixtures/without_version.json');

        self::assertEquals('dev-master', $sut->getVersion());
    }

    public function test_get_version_with_invalid_file_path(): void
    {
        $sut = PackageVersion::init(__DIR__ . '/non-existing/composer/json/path');

        $this->expectException(InvalidArgumentException::class);
        $sut->getVersion();
    }

    public function test_get_version_with_broken_json_file(): void
    {
        $sut = PackageVersion::init(__DIR__ . '/fixtures/broken_json_file.json');

        $this->expectException(InvalidArgumentException::class);
        $sut->getVersion();
    }
}
