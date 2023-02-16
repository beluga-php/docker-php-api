<?php

declare(strict_types=1);

namespace Docker\API\Model;

class MountPoint extends \ArrayObject
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
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $source;
    /**
     * @var string|null
     */
    protected $destination;
    /**
     * @var string|null
     */
    protected $driver;
    /**
     * @var string|null
     */
    protected $mode;
    /**
     * @var bool|null
     */
    protected $rW;
    /**
     * @var string|null
     */
    protected $propagation;

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

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(?string $destination): self
    {
        $this->initialized['destination'] = true;
        $this->destination = $destination;

        return $this;
    }

    public function getDriver(): ?string
    {
        return $this->driver;
    }

    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(?string $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;

        return $this;
    }

    public function getRW(): ?bool
    {
        return $this->rW;
    }

    public function setRW(?bool $rW): self
    {
        $this->initialized['rW'] = true;
        $this->rW = $rW;

        return $this;
    }

    public function getPropagation(): ?string
    {
        return $this->propagation;
    }

    public function setPropagation(?string $propagation): self
    {
        $this->initialized['propagation'] = true;
        $this->propagation = $propagation;

        return $this;
    }
}
