<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class MountTmpfsOptions implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * The size for the tmpfs mount in bytes.
     *
     * @var int|null
     */
    protected $sizeBytes;
    /**
     * The permission mode for the tmpfs mount in an integer.
     * The value must not be in octal format (e.g. 755) but rather
     * the decimal representation of the octal value (e.g. 493).
     *
     * @var int|null
     */
    protected $mode;

    /**
     * The size for the tmpfs mount in bytes.
     */
    public function getSizeBytes(): ?int
    {
        return $this->sizeBytes;
    }

    /**
     * The size for the tmpfs mount in bytes.
     */
    public function setSizeBytes(?int $sizeBytes): self
    {
        $this->initialized['sizeBytes'] = true;
        $this->sizeBytes = $sizeBytes;

        return $this;
    }

    /**
     * The permission mode for the tmpfs mount in an integer.
     * The value must not be in octal format (e.g. 755) but rather
     * the decimal representation of the octal value (e.g. 493).
     */
    public function getMode(): ?int
    {
        return $this->mode;
    }

    /**
     * The permission mode for the tmpfs mount in an integer.
     * The value must not be in octal format (e.g. 755) but rather
     * the decimal representation of the octal value (e.g. 493).
     */
    public function setMode(?int $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['sizeBytes' => ['SizeBytes', 'getSizeBytes', 'setSizeBytes'], 'mode' => ['Mode', 'getMode', 'setMode']];
    }
}
