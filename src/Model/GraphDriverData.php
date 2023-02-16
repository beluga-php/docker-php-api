<?php

declare(strict_types=1);

namespace Docker\API\Model;

class GraphDriverData extends \ArrayObject
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
    protected $name;
    /**
     * @var string[]|null
     */
    protected $data;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getData(): ?iterable
    {
        return $this->data;
    }

    /**
     * @param string[]|null $data
     */
    public function setData(?iterable $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
