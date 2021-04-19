<?php

declare(strict_types=1);

namespace MZNX\ComposerPackageVersion;

use InvalidArgumentException;
use JsonException;

class PackageVersion
{
    private string $pathToComposerJson;
    private ?string $version = null;

    private static ?PackageVersion $instance = null;

    private function __construct(string $pathToComposerJson)
    {
        $this->pathToComposerJson = $pathToComposerJson;
    }

    private function __clone()
    {
    }

    public static function init(string $pathToComposerJson): self
    {
        if (self::$instance === null || self::$instance->pathToComposerJson !== $pathToComposerJson) {
            self::$instance = new self($pathToComposerJson);
        }

        return self::$instance;
    }

    public function getVersion(): string
    {
        if (null === $this->version) {
            $this->version = $this->parseVersion();
        }

        return $this->version;
    }

    private function parseVersion(): string
    {
        if (!file_exists($this->pathToComposerJson)) {
            throw new InvalidArgumentException(
                sprintf('Cannot parse %s: file does not exist', $this->pathToComposerJson)
            );
        }

        try {
            $json = json_decode(file_get_contents($this->pathToComposerJson), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new InvalidArgumentException(
                sprintf('Cannot parse %s: %s', $this->pathToComposerJson, $e->getMessage()), 0, $e
            );
        }

        return trim($json['version'] ?? 'dev-master');
    }
}
