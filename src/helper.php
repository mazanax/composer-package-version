<?php

declare(strict_types=1);

namespace MZNX\ComposerPackageVersion;

function Version(string $pathToComposerJson): string
{
    return PackageVersion::init($pathToComposerJson)
        ->getVersion();
}
