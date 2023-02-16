<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ResourcesBlkioWeightDeviceItem extends \ArrayObject
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
    protected $path;
    /**
     * @var int|null
     */
    protected $weight;

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->initialized['weight'] = true;
        $this->weight = $weight;

        return $this;
    }
}
