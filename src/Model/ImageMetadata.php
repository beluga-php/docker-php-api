<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ImageMetadata extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * @var string|null
     */
    protected $lastTagTime;

    public function getLastTagTime(): ?string
    {
        return $this->lastTagTime;
    }

    public function setLastTagTime(?string $lastTagTime): self
    {
        $this->initialized['lastTagTime'] = true;
        $this->lastTagTime = $lastTagTime;

        return $this;
    }
}
