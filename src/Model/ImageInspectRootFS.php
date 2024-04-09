<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ImageInspectRootFS extends \ArrayObject
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
    protected $type;
    /**
     * @var list<string>|null
     */
    protected $layers;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * @return list<string>|null
     */
    public function getLayers(): ?array
    {
        return $this->layers;
    }

    /**
     * @param list<string>|null $layers
     */
    public function setLayers(?array $layers): self
    {
        $this->initialized['layers'] = true;
        $this->layers = $layers;

        return $this;
    }
}
