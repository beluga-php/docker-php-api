<?php

declare(strict_types=1);

namespace Docker\API\Model;

class PluginDevice extends \ArrayObject
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
    protected $path;

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
}
