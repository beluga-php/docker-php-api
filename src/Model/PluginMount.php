<?php

declare(strict_types=1);

namespace Docker\API\Model;

class PluginMount extends \ArrayObject
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
     * @var string|null
     */
    protected $description;
    /**
     * @var string[]|null
     */
    protected $settable;
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
    protected $type;
    /**
     * @var string[]|null
     */
    protected $options;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getSettable(): ?array
    {
        return $this->settable;
    }

    /**
     * @param string[]|null $settable
     */
    public function setSettable(?array $settable): self
    {
        $this->initialized['settable'] = true;
        $this->settable = $settable;

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
     * @return string[]|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param string[]|null $options
     */
    public function setOptions(?array $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }
}
