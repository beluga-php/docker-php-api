<?php

declare(strict_types=1);

namespace Docker\API\Model;

class PluginConfigArgs extends \ArrayObject
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
     * @var string[]|null
     */
    protected $value;

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

    /**
     * @return string[]|null
     */
    public function getValue(): ?array
    {
        return $this->value;
    }

    /**
     * @param string[]|null $value
     */
    public function setValue(?array $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
